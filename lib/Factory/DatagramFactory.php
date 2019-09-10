<?php

namespace Hl7v2\Factory;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\PositionalState;

class DatagramFactory
{
    /**
     * @param string $data
     *
     * @return \Hl7v2\Encoding\Datagram
     */
    public function create($data)
    {
        $d = new Datagram($data);
        $d->setPositionalState(new PositionalState);

        return $d;
    }
}
