<?php

namespace App\Console\Commands;

use App\Models\Core\Location;
use App\Models\Core\SparePart;
use App\Models\Core\Stock;
use App\Models\Core\StorePart;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportStocks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:stocks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // TODO import Stock
        $stocks = DB::connection('md530f')->table('sparepartsqmtech')->where('Quantity','>',0)->get();
        foreach ($stocks as $stock){
//            dd($stock->Quantity);
            $parkNumber = decryptProperty($stock->PartNumber);
            $part = SparePart::where('part_number',$parkNumber)->first();
            if ($part && $stock->Quantity) {
//                dd($stock->Quantity);
                    $location =Location::where('name',$stock->Location)->first();
                    $stockPart = new StorePart();
                    $stockPart->spare_part_id = $part->id;
                    $stockPart->store_id = 1;
                    $stockPart->quantity = $stock->Quantity;
                    $stockPart->svc_quantity = $stock->Quantity;
                    $stockPart->location_id = $location->id ?? null;
                    $stockPart->user_id = 1;
                    $stockPart->save();


                    //TODO save stock associated with the store parts
                    $stock = new Stock();
                    $stock->spare_part_id = $part->id;
                    $stock->quantity = (int)$stock->Quantity;
                    $stock->entry_type = 'IV';
                    $stock->reference = 'Migration';
                    $stock->reason = 'Migration';
                    $stock->receive_status = 4;
                    $stock->issue_type = 'NML';
                    $stock->account_issued = 'store';
                    $stock->issued_by = 1;
                    $stock->user_id = 1;
                    $stock->state = 'serviceable';
                    $stock->lpo_id = 1;
                    $stock->store_id = 1;
                    $stock->supplier_id = 1;
                    $stock->save();

                    //TODO generate record of voucher


//                echo "##################user is ";

            }
        }
        return Command::SUCCESS;
    }

    public function createStoreStock(){

    }
}
