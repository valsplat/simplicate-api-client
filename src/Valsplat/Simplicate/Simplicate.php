<?php

namespace Valsplat\Simplicate;

use Valsplat\Simplicate\Entities;

class Simplicate
{
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function project($attributes = [])
    {
        return new Entities\Project($this->connection, $attributes);
    }
}
