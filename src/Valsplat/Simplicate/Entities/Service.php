<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Service extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;

    protected $fillable = [
        'id',
        'vat_class',
        'revenue_group',
        'created_at',
        'updated_at',
        'modified',
        'my_organization_profile_id',
        'name',
        'price_editable',
        'price'
    ];

    protected $endpoint = 'services/defaultservice/';
    // protected $namespace = '';
}
