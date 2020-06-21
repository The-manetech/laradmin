<?php

namespace Laradmin\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DoctorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laradmin:doctor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This anaylyses the requirement and setup of laradmin';

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
     * 
     * @return mixed
     */
    public function handle()
    {
        if (!laradmin()->isInstalled()){

            $this->error('[X] Laradmin is not installed');

        }else{

            $this->info('[√] Laradmin is not installed');

        }

        $this->line('Scanning Apps...');

        if (!laradmin()->hasApp()){

            $this->error('[X] No app is running on laradmin');

        }else{

            $this->info('[√] Laradmin is running some apps');

        }

        $this->line( base_path(laradmin()->appsRoot) );
        foreach ( scandir( base_path(laradmin()->appsRoot)) as $value) {

            $this->line($value);
            
        }

    }
}