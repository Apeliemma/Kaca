<?php

namespace App\Http\Controllers\Store\Stocks;

use App\Http\Controllers\Controller;
use App\Models\Core\SparePart;
use App\Models\Core\StorePart;
use App\Repositories\SearchRepo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StorePartsController extends Controller
{
    protected $folder = 'store.stocks.'; // path to view files

    public function index()
    {
        return view($this->folder . 'store.parts');
    }

    public function viewPart(int $storePartID): View
    {
        return view($this->folder . 'store.part', [
            'storePart' => StorePart::findOrFail($storePartID),
        ]);
    }

    public function changeLocation(int $storePartID)
    {
        request()->validate(['location_id' => 'required|integer']);
        $storePart = StorePart::findOrFail($storePartID);
        $storePart->location_id = request('location_id');
        $storePart->save();

        return redirect()->back()->with('notice', [
            'type' => 'success',
            'message' => 'Spare Part location changed successfully',
        ]);
    }

    public function changeCategory(int $storePartID)
    {
        request()->validate(['category_id' => 'required|integer']);
        $storePart = StorePart::findOrFail($storePartID);

        if ($storePart->sparePart) {
            $storePart->sparePart->category_id = request('category_id');
            $storePart->sparePart->save();
        }

        return redirect()->back()->with('notice', [
            'type' => 'success',
            'message' => 'Spare Part category updated successfully',
        ]);
    }

    public function update(int $storePartID, Request $request)
    {
        $request->validate([
            'part_number' => 'required|string|max:255',
            'serial_number' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'svc_quantity' => 'required|integer|min:0',
            'unsvc_quantity' => 'required|integer|min:0',
        ]);

        $storePart = StorePart::findOrFail($storePartID);

        if ($storePart->sparePart) {
            $storePart->sparePart->part_number = $request->part_number;
            $storePart->sparePart->serial_number = $request->serial_number;
            $storePart->sparePart->save();
        }

        $storePart->quantity = $request->quantity;
        $storePart->svc_quantity = $request->svc_quantity;
        $storePart->unsvc_quantity = $request->unsvc_quantity;
        $storePart->save();

        return redirect()->back()->with('notice', [
            'type' => 'success',
            'message' => 'Spare Part details updated successfully',
        ]);
    }

    public function listStoreParts()
    {
        $storeParts = StorePart::join('spare_parts', 'spare_parts.id', '=', 'store_parts.spare_part_id')
            ->where('store_parts.store_id', auth()->user()->store_id)
            ->select('store_parts.*', 'spare_parts.part_number', 'spare_parts.unit_of_account');

        if (request('all')) {
            return $storeParts->get();
        }

        return SearchRepo::of($storeParts)
            ->addColumn('action', function ($storePart) {
                $json = json_encode($storePart);
                $str = '';

                $str .= '&nbsp;&nbsp;<a href="' . url("store/stocks/spareparts/store/part/" . $storePart->id) . '" class="btn badge btn-primary btn-sm load-page"><i class="fa fa-eye"></i> Manage</a>';

                if ($storePart->quantity > 0) {
                    $str .= '&nbsp;&nbsp;<a href="#" data-model="' . htmlentities($json, ENT_QUOTES, 'UTF-8') . '" onclick="prepareEdit(this,\'loanItem\');" class="btn badge btn-secondary btn-sm"><i class="fa fa-flash"></i> Loan Item</a>';
                } else {
                    $str .= '&nbsp;&nbsp;<a onclick="deleteItem(\'' . url('store/stocks/spareparts/delete') . '\',\'' . $storePart->id . '\');" class="btn badgeButton btn-outline-danger btn-sm load-page"><i class="fa fa-times"></i> Delete</a>';
                }

                return $str;
            })
            ->make();
    }
}
