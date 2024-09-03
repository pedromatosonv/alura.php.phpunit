<?php

namespace Auction\Service;

use Auction\Model\Auction;

class Evaluator
{
    public float $highest_value = -INF;
    public float $lowest_value = INF;

    public function evaluate(Auction $auction): void
    {
        foreach ($auction->get_bids() as $bid) {
            if ($bid->get_value() > $this->highest_value) {
                $this->highest_value = $bid->get_value();
            }

            if ($bid->get_value() < $this->lowest_value) {
                $this->lowest_value = $bid->get_value();
            }
        }
    }

    public function get_highest_value(): float
    {
        return $this->highest_value;
    }

    public function get_lowest_value(): float
    {
        return $this->lowest_value;
    }
}
