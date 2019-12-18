<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Contactperson extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;

    protected $fillable = [
        'id',
        'organization',
        'person',
        'created_at',
        'updated_at',
        'work_function',
        'work_email',
        'work_phone',
        'work_mobile'
    ];

    protected $endpoint = 'crm/contactperson/';
    // protected $namespace = '';
}
