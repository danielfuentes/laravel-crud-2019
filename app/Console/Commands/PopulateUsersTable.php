<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PopulateUsersTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inicializar la tabla de usuarios';

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
        $users = require database_path('data/users.php');

        foreach ($users as $user) {
            \App\User::create($user);
        }

        $this->info('Success!');
    }
}
