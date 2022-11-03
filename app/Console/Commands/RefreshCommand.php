<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(app()->isProduction()){
            return Command::FAILURE;
        }
        Storage::deleteDirectory('app/public/files/audio');
        Storage::deleteDirectory('app/public/files/video');
        Storage::deleteDirectory('app/public/files/paper');
        Storage::deleteDirectory('app/public/images');
        $this->call('migrate:fresh',[
            '--seed' => true
        ]);
        
        return Command::SUCCESS;
    }
}
