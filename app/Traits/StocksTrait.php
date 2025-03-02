<?php

namespace App\Traits;

use App\Models\Core\SparePart;
use App\Models\Core\Stock;
use App\Repositories\StatusRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait StocksTrait
{
   public function showStocks($status){
       if (auth()->user()->isAllowedTo('officer_commanding')){
           return $this->OC_ApprovalStocks($status);

       }elseif (auth()->user()->isAllowedTo('commanding_officer')){
           return $this->CO_ApprovalStocks($status);

       }else{
           return $this->quotaMasterStocks($status);
       }
   }

   private function quotaMasterStocks($status){
       return Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
           ->join('spare_parts','spare_parts.id','stocks.spare_part_id')
           ->leftjoin('users','users.id','stocks.user_id') //used to list technician in QM dashboard
           ->where([
               ['stocks.entry_type','IV'],
               ['stocks.store_id',auth()->user()->store_id],
               ['stocks.issue_status',StatusRepository::getIssueStatus($status)],
           ])->select('stocks.*','aircraft.tail_number as tail_number','spare_parts.part_number','spare_parts.description','users.full_name as requested_by');
   }
   //Officer Commanding
   private function OC_ApprovalStocks($status){
       return Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
           ->join('spare_parts','spare_parts.id','stocks.spare_part_id')
           ->leftjoin('users','users.id','stocks.user_id') //used to list technician in QM dashboard
           ->where('stocks.store_id',auth()->user()->store_id)
           ->where([
               ['stocks.entry_type','IV'],
               ['spare_parts.control_level',4],
               ['stocks.issue_status',StatusRepository::getIssueStatus($status)],
           ])->select('stocks.*','aircraft.tail_number as tail_number','spare_parts.part_number','spare_parts.description','users.full_name as requested_by');
   }
   // Commanding Officer Approvals
   private function CO_ApprovalStocks($status){
       return Stock::join('aircraft','aircraft.id','stocks.aircraft_id')
           ->join('spare_parts','spare_parts.id','stocks.spare_part_id')
           ->leftjoin('users','users.id','stocks.user_id') //used to list technician in QM dashboard
           ->where([
               ['stocks.entry_type','IV'],
               ['spare_parts.control_level',6],
               ['stocks.issue_status',StatusRepository::getIssueStatus($status)],
           ])->select('stocks.*','aircraft.tail_number as tail_number','spare_parts.part_number','spare_parts.description','users.full_name as requested_by');
   }

}
