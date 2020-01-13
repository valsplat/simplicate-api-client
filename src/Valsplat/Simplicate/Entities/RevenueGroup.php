<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class RevenueGroup extends Entity
{
    use Actions\Getable;
    use Actions\Listable;

    protected $fillable = [
        'id',
        'label',
    ];

    protected $endpoint = 'sales/revenuegroup/';
    // protected $namespace = '';

}
