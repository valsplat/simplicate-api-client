<?php

namespace Valsplat\Simplicate\Actions;

trait Listable
{
    /**
     * @return mixed
     */
    public function list($params = [])
    {
        $params['metadata'] = 'offset,total_count,count';
        $result = $this->connection()->get($this->getEndpoint(), $params);
        return $this->collectionFromResult($result);
    }

    /**
     * @return mixed
     */
    public function listAll($params = [])
    {
        $params['metadata'] = 'offset,count';
        $result = $this->connection()->get($this->getEndpoint(), $params);
        $otherResults = [];

        if ($result['metadata']['count'] > count($result['data'])) {
            $params['offset'] = $result['metadata']['offset'] + count($result['data']);
            $otherResults = $this->connection()->getConcurrent($this->getEndpoint(), $result['metadata']['count'], $params);
        }

        foreach($otherResults as $r) {
            $result['data'] = array_merge($result['data'], $r['data']);
        }
        return $this->collectionFromResult($result);

    }
}
