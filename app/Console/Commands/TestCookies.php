<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\Spam;
use App\Cookie;

class TestCookies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cookies:spam';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is going to spam your email :D';

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
        $cookies = Cookie::all();

        foreach ($cookies as $cookie){
            $cookie->notify(new Spam());
        }
    }
}
