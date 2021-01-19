<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use App\Models\Group;

class CreateGroup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'new:group {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user user group';

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
        if ($this->validator($this->arguments())) {
            Group::create(['name' => $this->argument('name')]);

            $this->info('Grupa została utworzona');
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
            'name'     => ['required', 'string', 'max:2'],
        ]);

        if ($validator->fails()) {
            $this->info('Grupa nie została utworzona. Zobacz błędy:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return 0;
        }

        return 1;
    }
}
