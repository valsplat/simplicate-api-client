<?php

namespace Valsplat\Simplicate;

abstract class Entity
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var array The model's attributes
     */
    protected $attributes = [ ];

    /**
     * @var array The model's fillable attributes
     */
    protected $fillable = [ ];

    /**
     * @var array Attributes that should not be set on update
     */
    protected $notFillableOnUpdate = [ ];

    /**
     * @var string The URL endpoint of this model
     */
    protected $endpoint = '';

    /**
     * @var string Name of the primary key for this model
     */
    protected $primaryKey = 'id';

    /**
     * @var string Namespace of the data
     */
    protected $namespace = 'data';

    /**
     * @var array
     */
    protected $singleNestedEntities = [];

    /**
     * Array containing the name of the attribute that contains nested objects as key and an array with the entity name
     * and json representation type
     *
     * JSON representation of an array of objects (NESTING_TYPE_ARRAY_OF_OBJECTS) : [ {}, {} ]
     * JSON representation of nested objects (NESTING_TYPE_NESTED_OBJECTS): { "0": {}, "1": {} }
     *
     * @var array
     */
    protected $multipleNestedEntities = [];

    /**
     * Entity constructor.
     *
     * @param Connection $connection
     * @param array $attributes
     */
    public function __construct(Connection $connection, array $attributes = [ ])
    {
        $this->connection = $connection;
        $this->fill($attributes);
    }

    /**
     * Get the connection instance
     *
     * @return Connection
     */
    public function connection()
    {
        return $this->connection;
    }

    /**
     * Get the model's attributes
     *
     * @return array
     */
    public function attributes()
    {
        return $this->attributes;
    }

    /**
     * Get the model's fillable attributes
     * @param boolean $forUpdate
     * @return array
     */
    public function fillables($forUpdate = false)
    {
        $out = array_filter($this->attributes, function ($attribute) use ($forUpdate) {
            return $this->isFillable($attribute, $forUpdate);
        }, ARRAY_FILTER_USE_KEY);

        if (isset($out['custom_fields'])) {
            $out['custom_fields'] = array_filter($out['custom_fields'], function ($customField) {
                if (!isset($customField['value'])) {
                    return false;
                }
                if ($customField['render_type'] == 'related_employee') {
                    return false; // We cannot set related_employee type via API because of a bug
                }
                return true;
            });
            sort($out['custom_fields']);
        }
        return $out;
    }

    /**
     * Fill the entity from an array
     *
     * @param array $attributes
     */
    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
    }

    /**
     * @param $key
     * @return bool
     */
    protected function isFillable($key, $forUpdate = false)
    {
        $isFillable = in_array($key, $this->fillable);
        if ($isFillable && $forUpdate) {
            $isFillable = !in_array($key, $this->notFillableOnUpdate);
        }
        return $isFillable;
    }

    /**
     * @param $key
     * @param $value
     */
    protected function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        if (isset($this->attributes[$key])) {
            return $this->attributes[$key];
        }
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        if ($this->isFillable($key)) {
            return $this->setAttribute($key, $value);
        }
    }

    /**
     * @return bool
     */
    public function exists()
    {
        if (!array_key_exists($this->primaryKey, $this->attributes)) {
            return false;
        }

        return !empty($this->attributes[$this->primaryKey]);
    }

    /**
     * @return string
     */
    public function json()
    {
        $array = $this->getArrayWithNestedObjects();
        return json_encode($array, JSON_FORCE_OBJECT);
    }

    /**
     * Create a new object with the response from the API
     * @param $response
     * @return static
     */
    public function makeFromResponse($response)
    {
        $entity = new static($this->connection, $response);
        return $entity;
    }

    /**
     * Recreate this object with the response from the API
     * @param $response
     * @return $this
     */
    public function selfFromResponse($response)
    {
        $this->fill($response);
        return $this;
    }

    /**
     * @param $result
     * @return array
     */
    public function collectionFromResult($result)
    {
        $collection = [];

        foreach ($result[$this->getNamespace()] as $r) {
            $collection[] = static::makeFromResponse($r);
        }

        return $collection;
    }

    /**
     * Make var_dump and print_r look pretty
     *
     * @return array
     */
    public function __debugInfo()
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * Determine if an attribute exists on the model
     *
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return (isset($this->attributes[$name]) && !is_null($this->attributes[$name]));
    }

    /**
     * Array representation of Entity
     * @return array
     * @author Joris
     */
    public function toArray()
    {
        return $this->attributes;
    }

    /**
     * String representation of Entity
     *
     * @return string fe. Entities\Project[id=1234]
     * @author Bjorn
     */
    public function __toString()
    {
        $attributes = $this->attributes;
        $keyValues = array_map(
            function ($k) use ($attributes) {
                return sprintf('%s=%s', $k, $attributes[$k]);
            },
            array_keys($attributes)
        );

        return sprintf('%s[%s]', get_class($this), $keyValues[0]);
    }
}
