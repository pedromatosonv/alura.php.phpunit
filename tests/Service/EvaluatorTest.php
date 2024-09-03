<?php

namespace Alura\Leilao\Tests\Service;

use Auction\Model\Auction;
use Auction\Model\Bid;
use Auction\Model\User;
use Auction\Service\Evaluator;
use PHPUnit\Framework\TestCase;

class EvaluatorTest extends TestCase
{
    public function test_finds_highest_bid_in_ascending_order()
    {
        $auction = new Auction('Fiat 147 0km');
        $john = new User('John');
        $jane = new User('Jane');
        $auction->receive_bid(new Bid($john, 2000));
        $auction->receive_bid(new Bid($jane, 2500));
        $auctioneer = new Evaluator();
        $auctioneer->evaluate($auction);
        $this->assertEquals(2500, $auctioneer->get_highest_value());
    }

    public function test_finds_highest_bid_in_descending_order()
    {
        $auction = new Auction('Fiat 147 0km');
        $john = new User('John');
        $jane = new User('Jane');
        $auction->receive_bid(new Bid($john, 2500));
        $auction->receive_bid(new Bid($jane, 2000));
        $auctioneer = new Evaluator();
        $auctioneer->evaluate($auction);
        $this->assertEquals(2500, $auctioneer->get_highest_value());
    }

    public function test_finds_lowest_bid_in_ascending_order()
    {
        $auction = new Auction('Fiat 147 0km');
        $john = new User('John');
        $jane = new User('Jane');
        $auction->receive_bid(new Bid($jane, 2000));
        $auction->receive_bid(new Bid($john, 2500));
        $auctioneer = new Evaluator();
        $auctioneer->evaluate($auction);
        $this->assertEquals(2000, $auctioneer->get_lowest_value());
    }

    public function test_finds_lowest_bid_in_descending_order()
    {
        $auction = new Auction('Fiat 147 0km');
        $john = new User('John');
        $jane = new User('Jane');
        $auction->receive_bid(new Bid($john, 2500));
        $auction->receive_bid(new Bid($jane, 2000));
        $auctioneer = new Evaluator();
        $auctioneer->evaluate($auction);
        $this->assertEquals(2000, $auctioneer->get_lowest_value());
    }
}
