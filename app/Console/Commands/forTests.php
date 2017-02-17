<?php

namespace App\Console\Commands;

use App\Game;
use App\GameResult;
use App\GameResultHelper;
use Illuminate\Console\Command;

class forTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tests:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @param GameResultHelper $ghgameResultHelper
     * @return mixed
     */
    public function handle(GameResultHelper $ghgameResultHelper)
    {
        $gameResults = GameResult::all();
        foreach ($gameResults as $gameResult){
            $gameResult->result_rate = $ghgameResultHelper->calculateResultRate($gameResult);
        }
    }
}
