<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ConvertUnusedTokensToCredits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'credits:convert-unuse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert unused tokens (remaining_token > 0) from expired subscriptions to user credits — WITHOUT changing subscription status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoffDate = now()->subDays(30);
        $expiredSubIds = DB::table('subscriptions')
            ->where('purchased_at', '<=', $cutoffDate)
            ->where('pacakge_status', 'Active')
            ->pluck('id');

        if ($expiredSubIds->isEmpty()) {
            return; // Nothing to do
        }

        DB::transaction(function () use ($expiredSubIds) {

            // Step 2: Expire subscriptions
            DB::table('subscriptions')
                ->whereIn('id', $expiredSubIds)
                ->update([
                    'pacakge_status' => 'Expired',
                    'updated_at' => now(),
                ]);

            $creditData = DB::table('subscribed as s')
                ->join('subscriptions as sub', 's.subscription_id', '=', 'sub.id')
                ->whereIn('s.subscription_id', $expiredSubIds)
                ->where('s.remaining_token', '>', 0)
                ->select('sub.useer_id as user_id', 's.remaining_token', 's.subscription_id')
                ->get();

            foreach ($creditData as $item) {
                DB::table('user_credits')->updateOrInsert(
                    ['user_id' => $item->user_id], // ✅ Now we have real user_id!
                    [
                        'credits_balance' => DB::raw('COALESCE(credits_balance, 0) + ' . (int)$item->remaining_token),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }

            if ($creditData->isNotEmpty()) {
                DB::table('subscribed')
                    ->whereIn('subscription_id', $creditData->pluck('subscription_id'))
                    ->update(['remaining_token' => 0]);
            }

        });


        // $creditSubs = DB::table('subscribed')
        //     ->whereIn('subscription_id', $expiredSubs)
        //     ->where('remaining_token', '>', 0)
        //     ->get();

        // foreach ($creditSubs as $sub) {
        //     DB::table('user_credits')->updateOrInsert(
        //         ['user_id' => $sub->user_id],
        //         [
        //             'credits_balance' => DB::raw('credits_balance + ' . (int) $sub->remaining_token),
        //             'updated_at' => now(),
        //         ]
        //     );
        // }

        // DB::table('subscribed')
        //     ->whereIn('subscription_id', $creditSubs->pluck('subscription_id'))
        //     ->update(['remaining_token' => 0]);

    }
}
