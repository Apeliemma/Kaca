<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'truncate:tables';

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
        DB::table('spare_parts')->truncate();
        DB::table('stocks')->truncate();
        DB::table('lpos')->truncate();
        DB::table('record_of_vouchers')->truncate();
        DB::table('stock_record_sheets')->truncate();
        DB::table('store_parts')->truncate();
        return 0;
    }
}
