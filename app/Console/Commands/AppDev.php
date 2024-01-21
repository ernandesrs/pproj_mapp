<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AppDev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dev {--fresh} {--users}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start app with development data(super admin, admin, fake users, ...)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $essentialsSeeders = [
        ];

        if ($this->option('fresh')) {
            $this->call('migrate:fresh');
            $this->info('Database cleared!');
        }

        if ($this->option('users')) {
            $essentialsSeeders = [
                ...$essentialsSeeders,
                'UserSeeder'
            ];
        }

        // create super admin
        $this->createSuperAdmin([
            'email' => 'super@mail.com',
            'password' => 'password'
        ]);
        $this->info('Super admin created!');

        // run essentials seeders
        foreach ($essentialsSeeders as $essentialSeeder) {
            $this->call('db:seed', [
                '--class' => $essentialSeeder
            ]);
            $this->info('Seed ' . $essentialSeeder . ' runned!');
        }
    }

    /**
     * Create super user
     *
     * @param array $data
     * @return User
     */
    public function createSuperAdmin(array $data)
    {
        return $this->createUser([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'username' => 'superadmin',
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
            'gender' => 'n'
        ]);
    }

    /**
     * Create user
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
            'gender' => $data['gender'],
            'avatar' => 'https://ui-avatars.com/api/?name=' . $data['first_name'] . '+' . $data['last_name'] . '&bold=true',
            'email_verified_at' => now()
        ]);
    }
}
