<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Galadana;

class ExpiredGaladana extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check expired galadana';

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
        $expired = Galadana::where('batas_waktu',"<",now())->update(['status'=> '2'])->EveryMinute();
    }
}
