<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Rules\Password;

class NewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'new:user {name} {email} {password} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user with role [admin, przedstawiciel]';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->validator($this->arguments())) {
            $newUser = User::create([
                'name'     => $this->argument('name'),
                'email'    => $this->argument('email'),
                'password' => Hash::make($this->argument('password')),
            ]);

            $newUser->assignRole($this->argument('role'));

            $this->info('Użytkownik został utworzony');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password],
            'role'     => ['required', Rule::in(['admin', 'przedstawiciel'])],
        ]);

        if ($validator->fails()) {
            $this->info('Użytkownik nie został utworzony. Zobacz błędy:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return 0;
        }

        return 1;
    }
}
