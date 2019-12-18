<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Person extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;

    protected $fillable = [
        'interests',
        'address',
        'linked_as_contact_to_organization',
        'gender_id',
        'teams',
        'relation_type',
        'gender',
        'initials',
        'first_name',
        'family_name_prefix',
        'family_name',
        'full_name',
        'date_of_birth',
        'note',
        'email',
        'phone',
        'website_url',
        'twitter_url',
        'linkedin_url',
        'facebook_url',
        'custom_fields',
        'relation_number',
        'bank_account',
        'bank_bic',
        'invoice_receiver',
        'mailing_list_email',
        'mailing_lists'
    ];

    protected $endpoint = 'crm/person/';
    // protected $namespace = '';
}
