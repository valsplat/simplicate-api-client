<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class VatClass extends Entity
{
    use Actions\Getable;
    use Actions\Listable;

    protected $fillable = [
        'id',
        'code',
        'label',
        'percentage',
    ];

    protected $endpoint = 'invoices/vatclass/';
    // protected $namespace = '';

}
