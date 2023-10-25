<?php

namespace App;

class Board
{
    /**
     * Game columns number
     *
     * @var integer
     */
    protected $columns = 5;

    /**
     * Game rows number
     *
     * @var integer
     */
    protected $rows = 3;

    /**
     * The array of symbols
     *
     * @var array
     */
    const symbols = ['9', '10', 'J', 'Q', 'K', 'A', 'cat', 'dog', 'monkey', 'bird'];

    /**
     * @return int
     */
    protected function getBoardLength(): int
    {
        return $this->rows * $this->columns;
    }
    /**
     * Generate a random board
     * @return array
     */
    protected function shuffle(): array
    {
        $board = [];
        $shuffleArr = static::symbols;

        for ($i = 0; $i < $this->getBoardLength(); $i++) {
            array_push($board, $shuffleArr[array_rand(static::symbols)]);
        }
        return $board;
    }

    /**
     * @return array
     */
    public function generate(): array
    {
        return $this->shuffle();
    }
}