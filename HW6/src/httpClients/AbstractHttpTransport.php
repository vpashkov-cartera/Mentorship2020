<?php

namespace src\httpClients;

abstract class AbstractHttpTransport implements HttpTransportInterface
{
    protected $client = null;

    /**
     * AbstractHttpTransport constructor.
     * @param array $config
     */
    public abstract function __construct(array $config = []);
}
