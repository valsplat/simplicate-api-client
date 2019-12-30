<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class TimelineMessage extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable; // only supports create
    use Actions\Deletable;

    protected $fillable = [
        'messagetype_id', //  string
        'linked_to', // { sales_id, project_id, employee_id, invoice_id, person_id, organization_id }
        'created_by_id', //  employee, 'abc123'
        'title', //  string
        'content_fields', //  Array[['title' => string,'value' => string]
        'content', //  string
        'display_date', //  string
    ];

    protected $endpoint = 'timeline/message/';
    // protected $namespace = '';

}
