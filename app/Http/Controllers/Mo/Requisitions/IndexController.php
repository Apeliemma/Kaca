<?php

namespace App\Http\Controllers\Mo\Requisitions;

use App\Http\Controllers\Controller;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index($status =null){
        $status = \request('status');
        return view($this->folder.'index',compact('status'));
    }

    /**
     * return stock values
     */
    public function listPartsRequisition($status){
      switch ($status){
          case 'approved':
              $stocks = $this->approvedRequisitions();
              break;
          case 'awaiting-approval':
              $stocks = $this->awaitingMyApproval();
              break;
          case 'declined':
              $stocks = $this->declinedRequisitions();
              break;
          default:
              $stocks = $this->allRequisitions();
              break;

      }

        if(\request('all'))
            return $stocks->get();
        return SearchRepo::of($stocks)
            ->addColumn('issue_type',function($stock) {
                return $stock->issue_type == 'NML' ? 'Normal Issue' : 'Temporary Loan';
            })
            ->addColumn('action',function($stock) {
                $str = '';
                $json = json_encode($stock);
                $str.='<a href="'.url("mo/requisitions/".$stock->id).'" class="btn badgeButton btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>';
                if ($stock->issue_status === StatusRepository::getIssueStatus('processing')){
                    $str.='&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('mo/requisitions/approve').'\',\''.$stock->id.'\');" class="btn badgeButton btn-outline-success btn-sm"><i class="fa fa-check"></i> Approve</a>';
                    $str.='&nbsp;&nbsp;<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'declineReason\');" class="btn badgeButton btn-secondary btn-sm"><i class="fa fa-edit"></i>Decline</a>';

                }
               return $str;
            })
            ->addColumn('issue_status',function($stock) {
                return StatusRepository::getIssueStatus($stock->issue_status);
            })

            ->make();
    }


    // All non issued items
    private function awaitingMyApproval(){
        return Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
            ->join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->where([
                ['stocks.entry_type','IV'],
                ['stocks.issue_status',StatusRepository::getIssueStatus('processing')],
            ])->select('stocks.*','aircraft.tail_number as tail_number','spare_parts.part_number','spare_parts.description');

    }

    // All non issued items
    private function allRequisitions(){
        return Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
            ->join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->where([
                ['stocks.entry_type','IV'],
                ['stocks.issue_status','!=',StatusRepository::getIssueStatus('qm-issued')],
            ])->select('stocks.*','aircraft.tail_number as tail_number','spare_parts.part_number','spare_parts.description');

    }
    // Where OC has approved for user to be issued
    private function approvedRequisitions(){
        return  Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
            ->join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->where([
                ['stocks.entry_type','IV'],
                ['stocks.issue_status',StatusRepository::getIssueStatus('mo-approved')],
            ])->select('stocks.*','aircraft.tail_number as tail_number','spare_parts.part_number','spare_parts.description');
    }
    // Stocks that has been declined
    private function declinedRequisitions(){
        return  Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
            ->join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->whereIn('stocks.issue_status',StatusRepository::getIssueStatus(['mo-declined','qm-declined','declined']))
            ->where([
                ['stocks.entry_type','IV'],
            ])->select('stocks.*','aircraft.tail_number as tail_number','spare_parts.part_number','spare_parts.description');
    }

}
