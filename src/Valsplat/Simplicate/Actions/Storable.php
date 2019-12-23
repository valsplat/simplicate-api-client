<?php

namespace Valsplat\Simplicate\Actions;

trait Storable
{

    /**
     * @return mixed
     */
    public function save()
    {
        if ($this->exists()) {
            return $this->update();
        } else {
            return $this->create();
        }
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $result = $this->connection()->post($this->getEndpoint(), json_encode($this->fillables()));
        return $this->selfFromResponse($result[$this->getNamespace()]);
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $result = $this->connection()->put($this->getEndpoint() . urlencode($this->id), json_encode($this->fillables(true)));
        return $this->selfFromResponse($result[$this->getNamespace()]);
    }
}
