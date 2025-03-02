<?php

namespace App\Console\Commands;

use App\Models\Core\Aircraft;
use App\Models\Core\Supplier;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportAircraft extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:aircraft';

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
        $parts = DB::connection('md530f')->table('aircraft')->get();
        foreach ($parts as $part) {
            $craft = new Aircraft();
            $craft->property_model_id = 1;
            $craft->user_id = 1;
            $craft->model = decryptProperty($part->Model);
            $craft->tail_number = decryptProperty($part->TailNumber);
            $craft->serial_number = decryptProperty($part->SerialNumber);
            $craft->engine_model = decryptProperty($part->EngineModel);
            $craft->status = decryptProperty($part->Status);
            $craft->save();
        }
    }
}
