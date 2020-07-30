<?php

namespace src\Request;

abstract class AbstractRequestParamsBuilder implements RequestParamsBuilderInterface
{
    /**
     * @var string
     */

    protected $format;

    /**
     * @var int
     */
    protected $limit;

    /**
     * @var array
     */
    protected $mimeTypes;

    /**
     * @var string
     */
    protected $size;

    /**
     * @var string
     */
    protected $order;

    /**
     * @var int
     */
    protected $pageNum;

    /**
     * @var bool
     */
    protected $hasBreeds;

    /**
     * @var array
     */
    protected $requestParams = [];

    /**
     * {@inheritDoc}
     */
    public function format(string $format): RequestParamsBuilderInterface
    {
        $this->format = $format;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function limit(int $limit): RequestParamsBuilderInterface
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function mimeTypes(array $mimeTypes): RequestParamsBuilderInterface
    {
        $this->mimeTypes = $mimeTypes;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function size(string $size): RequestParamsBuilderInterface
    {
        $this->size = $size;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function order(string $order): RequestParamsBuilderInterface
    {
        $this->order = $order;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function page(int $pageNum): RequestParamsBuilderInterface
    {
        $this->pageNum = $pageNum;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasBreeds(bool $hasBreeds): RequestParamsBuilderInterface
    {
        $this->hasBreeds = $hasBreeds;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function create(): array
    {
        if (!empty($this->format)) {
            $this->requestParams['format'] = $this->format;
        }

        if (!empty($this->size)) {
            $this->requestParams['size'] = $this->format;
        }

        if (!empty($this->hasBreeds)) {
            $this->requestParams['hasBreeds'] = $this->format;
        }

        if (!empty($this->pageNum)) {
            $this->requestParams['page'] = $this->pageNum;
        }

        if (!empty($this->mimeTypes)) {
            $this->requestParams['mime_types'] = implode(',', $this->mimeTypes);
        }

        if (!empty($this->order)) {
            $this->requestParams['order'] = $this->order;
        }

        if (!empty($this->limit)) {
            $this->requestParams['limit'] = $this->limit;
        }

        return $this->requestParams;
    }
}
