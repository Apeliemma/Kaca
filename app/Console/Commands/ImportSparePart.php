<?php

namespace App\Console\Commands;

use App\Models\Core\Category;
use App\Models\Core\Department;
use App\Models\Core\SparePart;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportSparePart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:parts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports Spare Parts from the Old MD530f System';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $parts = DB::connection('md530f')->table('sparepartsqmtech')->get();
        foreach ($parts as $part){
            $partNumber = decryptProperty($part->PartNumber);
            $partExists = DB::table('spare_parts')->where('part_number',$partNumber)->count();
            $duplicateParts = [
                '23001827',     'MS24693C56',
                'MS27039C1-13', 'MHS4278-10-61',
                '3649050090',   '2-520184-2',
                '3529050570',   '3529050490',
                '3641506950',   '3649051023',
                'MS21042-5',    'P255-5019-1',
                '369D290027-4', '23079054'=>16,
                '369F5490-1',   '23037765',
                '369A2010',     '369D290027-2',
                '369D21723-13', 'MHS306-327H',
                'blee',    'MS3367-6-9',
                'NIV',          'NY400-1-2',
                '3521102019',   '3529050262'
            ];
            //Does not import spare parts that has duplicates
            if ($partExists == 0  && !in_array($partNumber,$duplicateParts)) {
                echo "##################user is ";
                $newPart = new SparePart();
                $newPart->part_number = $partNumber;
                $newPart->serial_number = decryptProperty($part->SerialNumber);
                $newPart->description = decryptProperty($part->Description);
                $newPart->unit_of_account = decryptProperty($part->UnitOfAccount);
                $newPart->department_id = $this->getDepartmentId($part->Department);
                $newPart->category_id = $this->getCategoryId($part->Department);
                $newPart->warranty_date = $part->WarrantyDate ? Carbon::parse(decryptProperty($part->WarrantyDate))->toDateTimeString() : null;
                $newPart->expiry_date = $part->ExpiryDate ? Carbon::parse($part->ExpiryDate)->toDateTimeString() : null;
                $newPart->reorder_level = $part->Rols;
                $newPart->remarks = decryptProperty($part->Remarks);
                $newPart->control_level = $part->ControlLevel == 6 ? 6 : 4;
                $newPart->property_model_id = 1;
                $newPart->user_id = $part->CreatedBy;
                $newPart->save();
            }
        }
        return 0;
    }

    private function getDepartmentId($department){
        $department = decryptProperty($department);
        $slug = Str::slug($department);
        $depart = Department::whereSlug($slug)->first();
        if (!$depart){
            $depart = new Department();
            $depart->_id = Str::uuid();
            $depart->name = $department;
            $depart->slug = $slug;
            $depart->user_id = 1;
            $depart->save();

        }
        return ($depart) ? $depart->id : null;
    }

    private function getCategoryId($category){
        $category = decryptProperty($category);
        $slug = Str::slug($category);
        $depart = Category::whereSlug($slug)->first();
        if (!$depart){
            $depart = new Category();
            $depart->_id = Str::uuid();
            $depart->name = $category;
            $depart->slug = $slug;
            $depart->user_id = 1;
            $depart->save();

        }
        return ($depart) ? $depart->id : null;    }
}
