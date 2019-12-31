<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Connection;
use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Payment extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;

    protected $fillable = [
        'invoice_id', //string
        'date', // string
        'amount', // float
        'description', //string
    ];

    protected $endpoint = 'invoices/payment/';
    // protected $namespace = '';
}
