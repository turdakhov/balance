<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\text;
use function Laravel\Prompts\password;


class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

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
        $email = text(
            label: 'User Email',
            placeholder: 'user@example.com',
            validate: ['email' => 'required|email|unique:users']
        );

        $name = text(
            label: 'User Name',
            placeholder: 'Vasya Pupkin',
            validate: ['name' => 'required|string|between:3,100']
        );

        $password = password(
            label: 'Password',
            hint: 'Minimum 8 characters',
            validate: ['password' => 'required|string|between:8,20']
        );

        DB::transaction(function () use ($name, $email, $password) {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
        });
    }
}
