<?php

namespace App\Console\Commands;

use Validator;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user for access to dashboard';

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
        $this->info($this->description);

        $email = $this->ask('Write your email: ');
        $password = $this->ask('Write your password: ');
        $password_confirmation = $this->ask('Write Confirmation your password: ');

        $validator = Validator::make(
            [
                'email' => $email, 
                'password' => 'password'
            ], 
            [
                'email' => 'required|email|unique:users', 
                'password' => 'required|confirmed|between:8,20'
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->messages();

            return $this->line($messages);
        }
        
        // User::create([
        //     'email'    => $email,
        //     'password' => $password,
        // ]);

        return TRUE;
    }
}
