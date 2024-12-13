<?php

namespace App\Console\Commands;

use App\Models\ActivityRequest;
use Illuminate\Console\Command;

class ActivityStatusCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:activity-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ActivityRequest::where('status', 1)
            ->whereNotNull('date')
            ->where('date', '>', now())
            ->update(['activity_status' => 2]);
    }
}
