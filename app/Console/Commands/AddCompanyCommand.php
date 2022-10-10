<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'contact:company {name} {phone=N/A}';
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new company.';

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
        $name = $this->ask('What is the company name?');
        $phone = $this->ask('What is the company\'s phone number?');

        if($this->confirm('Are you sure you want to add "' . $name . '"?')) {
            $company = Company::create([
                'name' => $name,
                'phone' => $phone
            ]);
            return $this->info('Added new company: ' . $name);
        }

        $this->warn('No company added.');

        // $company = Company::create([
        //     'name' => $this->argument('name'),
        //     'phone' => $this->argument('phone')
        // ]);

        // $this->info('Added new company: ' . $company->name);
        // $this->warn('I am a warning');
        // $this->error('I am an error');
    }
}
