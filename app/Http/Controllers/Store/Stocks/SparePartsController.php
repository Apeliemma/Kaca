<?php

namespace App\Http\Controllers\Store\Stocks;

use App\Http\Controllers\Controller;
use App\Models\Core\SparePart;
use App\Models\Core\Stock;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use function request;

class SparePartsController extends Controller
{
    public function index()
    {

        return view($this->folder.'spareparts', [

        ]);
    }

    public function viewPart(int $partID)
    {
        return view($this->folder.'view_part', [
            'sparePart' => SparePart::findOrFail($partID)
        ]);
    }

    /**
     * return sparepart's create view
     */
    public function create()
    {
        return view($this->folder.'create', [

        ]);
    }
    public function editSparePart(int $partID)
{
    return view($this->folder.'edit', [
        'sparePart' => SparePart::findOrFail($partID)
    ]);
}

public function updateSparePart(Request $request, int $id)
{
    $sparePart = SparePart::findOrFail($id);
    $sparePart->update($request->all());

    return redirect()->route('spareparts.index')->with('notice', ['type' => 'success', 'message' => 'SparePart updated successfully']);
}


    /**
     * store sparepart
     */
    public function storeSparePart()
    {
        request()->merge(['form_model' => SparePart::class]);

        request()->validate($this->getValidationFields([
            "property_model_id", "part_number", "description", "unit_of_account", "category_id", "department_id",
            "control_level", "reorder_level"
        ]));
        $data = request()->all();
        if (request('id')) {
            //TODO validate edits for Spare Parts with stock
//            $sparePart = SparePart::findOrFail(\request('id'));
        }
        if (!isset($data['user_id'])) {
            if (Schema::hasColumn('spare_parts', 'user_id')) {
                $data['user_id'] = request()->user()->id;
            }
        }
        if (request()->id) {
            $action = "updated";
        } else {
            $action = "saved";
        }
        $data["warranty_date"] = request()->date('warranty_date') ?? null;
        $data["expiry_date"] = request()->date('expiry_date') ?? null;
        $this->autoSaveModel($data);

        return redirect()->back()->with('notice',
            ['type' => 'success', 'message' => 'SparePart '.$action.' successfully']);
    }

    /**
     * return sparepart values
     */
    public function listSpareParts()
    {
        $spareparts = SparePart::query();
        if (request('all')) {
            return $spareparts->get();
        }
        return SearchRepo::of($spareparts)
            ->addColumn('action', function ($sparepart) {
                $str = '';
                $json = json_encode($sparepart);
                //    $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/spareparts/delete').'\',\''.$sparepart->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                $str .= '&nbsp;&nbsp;<a href="'.url("store/stocks/spareparts/".$sparepart->id).'" class="btn badge btn-primary btn-sm load-page"><i class="fa fa-eye"></i> View</a>';
                $str .= '&nbsp;&nbsp;<a href="'.url("store/stocks/spareparts/".$sparepart->id."/edit").'" class="btn badge btn-warning btn-sm load-page"><i class="fa fa-edit"></i> Edit</a>';

                return $str;
            })->make();
    }

    /**
     * delete sparepart
     */
    public function destroySparePart($sparepart_id)
    {
        $sparepart = SparePart::findOrFail($sparepart_id);
        $stocks = Stock::where('spare_part_id', $sparepart_id)->get();
        if (!$stocks->isEmpty()) {
            return redirect()->back()->with('notice',
                ['type' => 'warning', 'message' => 'SparePart can not be deleted']);
        }

        $sparepart->delete();
        return redirect()->back()->with('notice', ['type' => 'success', 'message' => 'SparePart deleted successfully']);
    }

}
