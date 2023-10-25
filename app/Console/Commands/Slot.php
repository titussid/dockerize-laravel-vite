<?php

namespace App\Console\Commands;

use App\Board;
use Illuminate\Console\Command;
use App\Game;

/**
 * Class Slot
 * @package App\Console\Commands
 */
class Slot extends Command
{

    protected $signature = 'spin:slot';

    protected $description = 'Simulated slot machine';

    public function handle()
    {
        $board = new Board();
        $game = new Game($board->generate());
        $this->info('#');
        $this->info(json_encode($game->result()));
        $this->info('#');
    }

}