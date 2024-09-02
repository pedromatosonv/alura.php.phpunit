<?php

namespace Auction\Model;

class Auction
{
    /** @var Bid[] */
    private array $bids;
    private string $description;

    public function __construct(string $description)
    {
        $this->description = $description;
        $this->bids = [];
    }

    public function receive_bid(Bid $bid)
    {
        $this->bids[] = $bid;
    }

    /**
     * @return Bid[]
     */
    public function get_bids(): array
    {
        return $this->bids;
    }
}
