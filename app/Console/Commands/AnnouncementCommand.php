<?php

namespace App\Console\Commands;

use App\Models\Announcement;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class AnnouncementCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-announcements';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send announcements to users via SMS based on scheduled times.';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // Find the announcement to be sent
        $announcement = Announcement::whereDate('announce_in', Carbon::today())
            ->where('is_texted', false)
            ->first();

        $users = User::where('status', 1)->role('organization')->get();

        if ($announcement) {
            $sid = env("TWILIO_SID");
            $token = env("TWILIO_TOKEN");
            $senderNumber = env("TWILIO_PHONE");

            $twilio = new Client($sid, $token);

            foreach ($users as $user) {
                // Replace the first character with +63
                $phoneNumber = '+63' . substr($user->phone, 1);

                $twilio->messages->create($phoneNumber, options: [
                    "body" => 'New Announcement!' . "\n" . 'Title: ' . $announcement->title . "\n" . 'Description: ' . $announcement->description,
                    "from" => $senderNumber
                ]);
            }

            // Mark the announcement as texted
            $announcement->update(['is_texted' => true]);
        }
    }
}
