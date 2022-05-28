<?php

namespace Bangdinhnfq\Unlock\Model;

class Token
{
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Token
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
