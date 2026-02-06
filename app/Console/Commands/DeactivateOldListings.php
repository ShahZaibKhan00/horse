<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeactivateOldListings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'listings:deactivate-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate listings older than 30 days in 3 tables';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Deactivate old listings cron ran at: ' . now());

        $date  = now()->subMonth();
        // 🔁 Products
        $products = DB::table('products')
            ->where('status', 1)
            ->where('pro_status', 'Published')
            ->where('created_at', '<=', $date)
            ->update(['status' => 0]);

        // 🔁 Realstates
        $realstates = DB::table('realstates')
            ->where('status', 1)
            ->where('re_status', 'Published')
            ->where('created_at', '<=', $date)
            ->update(['status' => 0]);

        // 🔁 Services
        $services = DB::table('services')
            ->where('status', 1)
            ->where('created_at', '<=', $date)
            ->update(['status' => 0]);



        Log::info('Listings deactivated', [
            'date'        => now()->toDateTimeString(),
            'products'    => $products,
            'realstates'  => $realstates,
            'services'    => $services,
            'total'       => $products + $realstates + $services,
        ]);
        $this->info('Old listings deactivated successfully');
    }
}
