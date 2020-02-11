<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Mileage extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    //use Actions\Deletable;

    protected $fillable = [
    ];

    protected $endpoint = 'mileage/mileage/';
    // protected $namespace = '';
}
