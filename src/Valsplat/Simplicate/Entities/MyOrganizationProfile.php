<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class MyOrganizationProfile extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    // use Actions\Storable;
    // use Actions\Deletable;

    protected $fillable = [
        'organization_id',
        'name',
        'coc_code',
        'vat_number',
        'bank_account',
        'blocked'
    ];

    protected $endpoint = 'crm/myorganizationprofile/';
    // protected $namespace = '';
}
