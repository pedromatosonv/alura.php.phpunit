<?php

namespace Auction\Model;

class User
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function get_name(): string
    {
        return $this->name;
    }
}
