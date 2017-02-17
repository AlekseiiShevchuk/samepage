<?php

namespace App\Console\Commands;

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
     * @param GameResultHelper $gameResultHelper
     * @return mixed
     */
    public function handle(GameResultHelper $gameResultHelper)
    {
        $gameResults = GameResult::where('background_width', '>', 0)->where('background_height', '>', 0)->get();
        foreach ($gameResults as $gameResult) {
            $gameResult->result_rate = $gameResultHelper->calculateResultRate($gameResult);
            $gameResult->save();
        }
    }
}
