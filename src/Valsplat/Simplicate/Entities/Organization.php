<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Organization extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;
    use Actions\CustomFields;

    protected $fillable = [
        'visiting_address',
        'postal_address',
        'relation_type',
        'relation_manager',
        'linked_persons_contacts',
        'interests',
        'debtor',
        'teams',
        'accountancy',
        'name',
        'coc_code',
        'vat_number',
        'email',
        'phone',
        'url',
        'note',
        'linkedin_url',
        'has_different_postal_address',
        'industry',
        'organizationsize',
        'custom_fields',
        'invoice_receiver',
        'allow_autocollect',
        'bank_account',
        'bank_bic',
        'relation_number'
    ];

    protected $endpoint = 'crm/organization/';
    // protected $namespace = '';
}
