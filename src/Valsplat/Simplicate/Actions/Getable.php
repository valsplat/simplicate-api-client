<?php

namespace Valsplat\Simplicate\Actions;

trait Getable
{

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        $result = $this->connection()->get($this->getEndpoint() . urlencode($id));
        return $this->makeFromResponse($result['data']);
    }
}
