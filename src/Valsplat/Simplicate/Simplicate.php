<?php

namespace Valsplat\Simplicate;

class Simplicate
{
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     *
     */
    public function get($id = '')
    {
        $entityType = strtok($id,':');
        if (method_exists($this, $entityType)) {
            return $this->$entityType()->get($id);
        } else {
            throw new Exceptions\MethodNotSupportedException(sprintf('Entity %s not supported', $entityType));
        }
    }

    public function contactperson($attributes = [])
    {
        return new Entities\Contactperson($this->connection, $attributes);
    }

    public function defaultservice($attributes = [])
    {
        return new Entities\DefaultService($this->connection, $attributes);
    }

    public function employee($attributes = [])
    {
        return new Entities\Employee($this->connection, $attributes);
    }

    public function hours($attributes = [])
    {
        return new Entities\Hours($this->connection, $attributes);
    }

    public function hourstype($attributes = [])
    {
        return new Entities\HoursType($this->connection, $attributes);
    }

    public function invoice($attributes = [])
    {
        return new Entities\Invoice($this->connection, $attributes);
    }

    public function leave($attributes = [])
    {
        return new Entities\Leave($this->connection, $attributes);
    }

    public function mileage($attributes = [])
    {
        return new Entities\Mileage($this->connection, $attributes);
    }

    public function myorganizationprofile($attributes = [])
    {
        return new Entities\MyOrganizationProfile($this->connection, $attributes);
    }

    public function organization($attributes = [])
    {
        return new Entities\Organization($this->connection, $attributes);
    }

    public function payment($attributes = [])
    {
        return new Entities\Payment($this->connection, $attributes);
    }

    public function person($attributes = [])
    {
        return new Entities\Person($this->connection, $attributes);
    }

    public function project($attributes = [])
    {
        return new Entities\Project($this->connection, $attributes);
    }

    public function revenuegroup($attributes = [])
    {
        return new Entities\RevenueGroup($this->connection, $attributes);
    }

    public function sales($attributes = [])
    {
        return new Entities\Sales($this->connection, $attributes);
    }

    public function salesservice($attributes = [])
    {
        return new Entities\SalesService($this->connection, $attributes);
    }

    public function service($attributes = [])
    {
        return new Entities\Service($this->connection, $attributes);
    }

    public function timelineMessage($attributes = [])
    {
        return new Entities\TimelineMessage($this->connection, $attributes);
    }

    public function vatclass($attributes = [])
    {
        return new Entities\VatClass($this->connection, $attributes);
    }

}
