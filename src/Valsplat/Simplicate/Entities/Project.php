<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Project extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;

    protected $fillable = [
        'id',
        'project_manager',
        'project_status',
        'hours_rate_type',
        'abnormal_address',
        'abnormal_person_id',
        'abnormal_organization_id',
        'organization',
        'person',
        'separate_invoice_recipient',
        'contact',
        'my_organization_profile',
        'divergent_payment_term',
        'employees',
        'teams',
        'budget',
        'abnormal_contact_id',
        'created_at',
        'updated_at',
        'simplicate_url',
        'my_organization_profile_id',
        'person_id',
        'organization_id',
        'contact_id',
        'name',
        'billable',
        'can_register_mileage',
        'project_number',
        'note',
        'custom_fields',
        'start_date',
        'end_date',
        'invoice_reference'
    ];

    protected $endpoint = 'projects/project/';
    // protected $namespace = '';
}
