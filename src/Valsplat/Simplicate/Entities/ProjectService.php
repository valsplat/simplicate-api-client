<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class ProjectService extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;

    protected $fillable = [
        'project_id',
        'service_number',
        'related_service_id',
        'expected_invoice_date',
        'invoice_date',
        'status',
        'hour_types',
        'cost_types',
        'vat_class',
        'revenue_group',
        'invoice_in_installments',
        'installments',
        'created_at',
        'updated_at',
        'budget_financial_hours',
        'write_hours_start_date',
        'write_hours_end_date',
        'start_date',
        'end_date',
        'subscription_cycle',
        'budget',
        'default_service_id',
        'name',
        'invoice_method', // ['Hours','Subscription','Fixed']
        'amount',
        'price',
        'track_hours',
        'track_cost'
    ];

    protected $endpoint = 'projects/service/';
    // protected $namespace = '';
}
