<?php

namespace App\Console\Commands;

use App\Models\ActivityRequest;
use Illuminate\Console\Command;

class ActivityRequestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-activity';

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
            ->where('date', '<', now()->subDays(2))
            ->update(['status' => 4]);
    }
}
