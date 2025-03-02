<?php

namespace App\Console\Commands;

use App\Models\Core\Supplier;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportSupplier extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:supplier';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import supplier';

    /**
     * Execute the console command.
     *
     * @return boolean
     */
    public function handle(): bool
    {
        $parts = DB::connection('md530f')->table('supplier')->get();
        foreach ($parts as $part) {
            $supplier = new Supplier();
            $supplier->_id = Str::orderedUuid();
            $supplier->name = decryptProperty($part->SupplierName);
            $supplier->email = decryptProperty($part->EmailAddress);
            $supplier->save();
        }
        return true;
    }


}
