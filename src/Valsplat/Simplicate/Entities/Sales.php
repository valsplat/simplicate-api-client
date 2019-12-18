<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Sales extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;

    protected $fillable = [
        'id',
        'responsible_employee',
        'person',
        'organization',
        'progress',
        'source',
        'status',
        'separate_invoice_recipient',
        'teams',
        'created_at',
        'updated_at',
        'status_updated_at',
        'simplicate_url',
        'my_organization_profile_id',
        'organization_id',
        'person_id',
        'contact_id',
        'reason',
        'contact',
        'subject',
        'start_date',
        'expected_closing_date',
        'expected_revenue',
        'custom_fields',
        'note',
        'chance_to_score',
        'lost_to_competitor'
    ];

    protected $endpoint = 'sales/sales/';
    // protected $namespace = '';
}
