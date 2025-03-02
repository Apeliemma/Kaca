<?php

namespace App\Http\Controllers\Store\Lpos;

use App\Http\Controllers\Controller;
use App\Models\Core\Lpo;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class LpoController extends Controller
{
    /**
     * return lpo's index view
     */
    public function index($lpoID){

        return view($this->folder.'lpo',[
            "lpo" => Lpo::findOrFail($lpoID)
        ]);
    }

    public function listStocks($lpoID){
        $stocks = Stock::join('spare_parts','spare_parts.id','stocks.spare_part_id')
            ->where('stocks.lpo_id',$lpoID)
          ->select('stocks.*','spare_parts.part_number','spare_parts.description');

        return SearchRepo::of($stocks)
               ->make();
    }
}
