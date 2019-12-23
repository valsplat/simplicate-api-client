<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class SalesService extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;

    protected $fillable = [
        'id',
        'invoice_date',
        'hour_types',
        'cost_types',
        'subscription_cycle',
        'track_cost',
        'created_at',
        'updated_at',
        'sales_id',
        'default_service_id',
        'name',
        'invoice_method', // ['Hours','Subscription','Fixed']
        'amount',
        'price',
        'track_hours'
    ];

    protected $endpoint = 'sales/service/';
    // protected $namespace = '';
}
