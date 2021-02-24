<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Tests\Integration\Mail\TestMail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to specific address';

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
     * @return int
     */
    public function handle()
    {
        $address = $this->argument('address');

        $validator = Validator::make(['address' => $address], ['address' => 'email']);

        if (!$validator->fails()) {
            Mail::to($address)->send(new TestMail());
            $this->info("Email sent to $address. Please check your email");

            return 0;
        }

        $this->error("Not an email");

        return 0;
    }
}
