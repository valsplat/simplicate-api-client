<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Leave extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    //use Actions\Deletable;

    protected $fillable = [
        'employee_id',
        'leave_type_id',
        'start_date',
        'end_date',
        'year',
        'hours',
        'description'
    ];

    protected $endpoint = 'hrm/leave/';
    // protected $namespace = '';
}
