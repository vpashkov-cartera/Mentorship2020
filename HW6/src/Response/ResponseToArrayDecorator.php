<?php

namespace src\Response;

class ResponseToArrayDecorator implements ResponseInterface
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * ResponseDecorator constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->setData($response->getData());
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->response->getData();
    }

    /**
     * @param $data
     * @return $this|mixed
     */
    public function setData($data)
    {
        $this->response->setData(json_decode($data, true));

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }
}
