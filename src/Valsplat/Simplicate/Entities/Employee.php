<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Employee extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    // use Actions\Storable;
    // use Actions\Deletable;

    protected $fillable = [
        'id',
        'person_id',
        'name',
        'marital_status',
        'social_security_number',
        'bank_account',
        'function',
        'type',
        'employment_status',
        'work_phone',
        'work_mobile',
        'work_email',
        'hourly_sales_tariff',
        'hourly_cost_tariff',
        'avatar',
        'created_at',
        'updated_at',
        'custom_fields',
        'simplicate_url'
    ];

    protected $endpoint = 'hrm/employee/';
    // protected $namespace = '';
}
