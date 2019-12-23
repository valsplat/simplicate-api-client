<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class HoursType extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    //use Actions\Deletable;

    protected $fillable = [
        'label',
        'tariff',
        'blocked',
        'color'
    ];

    protected $endpoint = 'hours/hourstype/';
    // protected $namespace = '';
}
