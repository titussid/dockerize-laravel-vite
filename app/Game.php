<?php

namespace App;

class Game
{
    /**
     * monetary numbers in cents 1€ = 100cents.
     * In your case is always 100
     */
    const BET_AMOUNT = 100;

    /**
     * @var int
     */
    protected $win = 0;

    /**
     * Game outcome
     * @var array
     */
    protected $outcome = [];

    /**
     * Pay out return to the player the following amount:
     * 3 symbols: 20% of the bet.
     * 4 symbols: 200% of the bet.
     * 5 symbols: 1000% of the bet.
     * @var array
     */
    protected $winingRates = [
        3 => 20,
        4 => 200,
        5 => 1000
    ];

    /**
     * Available paylines
     * @var array
     */
    const paylines = [
        [0, 3, 6, 9, 12],
        [1, 4, 7, 10, 13],
        [2, 5, 8, 11, 14],
        [0, 4, 8, 10, 12],
        [2, 4, 6, 10, 14]
    ];

    /**
     * @var Board
     */
    private $board;

    /**
     * Game constructor.
     * @param $board
     */
    public function __construct($board)
    {
        $this->board = $board;
        $this->check();
    }

    protected function check()
    {
        foreach (static::paylines as $payline) {
            $matchedSymbol = [];
            $counter = 0;
            foreach ($payline as $index) {
                $symbol = $this->board [$index];
                $length = sizeof($matchedSymbol);
                if ($length > 0 && $symbol !== $matchedSymbol[$length - 1]) {
                    break;//symbol is not equal to next symbol
                }
                $counter++;
                $matchedSymbol[] = $symbol;
            }
            if (in_array($counter, array_keys($this->winingRates))) {
                //total win sum
                $this->win += (static::BET_AMOUNT * $this->winingRates[$counter]) / 100;
                $this->outcome[] = [implode(' ', $payline) => $counter];
            }
        }
    }

    /**l
     * @return array
     */
    public function result(): array
    {
        return [
            'board' => $this->board,
            'paylines' => $this->outcome,
            'bet_amount' => static::BET_AMOUNT,
            'total_win' => $this->win
        ];
    }
}