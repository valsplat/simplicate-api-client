<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Hours extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;

    protected $fillable = [
        'employee_id',
        'project_id',
        'projectservice_id',
        'type_id',
        'approvalstatus_id',
        'hours',
        'start_date',
        'end_date',
        'is_time_defined',
        'note',
        'custom_fields',
        'source',
    ];

    protected $endpoint = 'hours/hours/';
    // protected $namespace = '';
}
