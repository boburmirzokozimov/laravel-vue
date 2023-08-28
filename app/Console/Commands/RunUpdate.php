<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running update command';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('metal:update');
        $this->call('crypto:update');
        $this->info('Running update finished successfully');
    }
}
