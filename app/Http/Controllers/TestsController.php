<?php

namespace App\Http\Controllers;

use App\Models\Core\Location;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TestsController extends Controller
{
    public function index($id = null): Redirector|Application|RedirectResponse
    {
        if ($id) {
            Auth::loginUsingId($id);
        } else {
            Auth::loginUsingId(6);
        }

        return redirect(\auth()->user()->role);
    }

    public function testCSVImport()
    {
        $users = [];
        if (($open = fopen(storage_path()."/app/system/locations_sheet.csv", "r")) !== false) {

            while (($location = fgetcsv($open, 1000, ",")) !== false) {
//                $users[] = $data;
                $location = $location[0];
                $location = str_replace("\r\n", "\n", $location);
                $pos = strpos($location, '/');
                if ($pos !== false) {
                    echo "hey";
                } else {
                    Location::updateOrInsert(
                        ['name' => $location],
                        [
                            '_id' => Str::uuid(),
                            'slug' => Str::slug($location),
                            'name' => $location,
                            'user_id' => 1
                        ]
                    );
                }
            }

            fclose($open);
        }
        dd('ehy');


    }
}
