<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Division;

class gorib extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gorib:ecommerce';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is show e-commerce data';

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
      $data= new Division;
      $data->d_name='Ctg';
      $data->d_priority='3';
      $data->save();

    }
}
