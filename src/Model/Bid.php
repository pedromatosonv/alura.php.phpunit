<?php

namespace Auction\Model;

class Bid
{
    private User $user;
    private float $value;

    public function __construct(User $user, float $value)
    {
        $this->user = $user;
        $this->value = $value;
    }

    public function get_user(): User
    {
        return $this->user;
    }

    public function get_value(): float
    {
        return $this->value;
    }
}
