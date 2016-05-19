<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use PushNotification;

class Notification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (User::all() as $user) {
            var_dump($user->registration_id);
            PushNotification::app('appNameAndroid')
                ->to($user->registration_id)
                ->send('Hello World, i`m a push message');
        }
    }
}
