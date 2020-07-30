<?php

namespace src\Request;

interface RequestInterface
{
    /**
     * @return mixed
     */
    public function getBody();

    /**
     * @return mixed
     */
    public function getHeaders();
}
