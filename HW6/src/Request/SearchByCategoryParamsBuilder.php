<?php

namespace src\Request;

class SearchByCategoryParamsBuilder extends AbstractRequestParamsBuilder
{
    /**
     * @var array
     */
    protected $categoriesId;

    /**
     * SearchByCategoryParamsBuilder constructor.
     * @param array $categoriesId
     */
    public function __construct(array $categoriesId)
    {
        $this->categoriesId = $categoriesId;
    }

    /**
     * {@inheritDoc}
     */
    public function create(): array
    {
        parent::create();

        if (!empty($this->categoriesId)) {
            $this->requestParams['category_ids'] = implode(',', $this->categoriesId);
        }

        return $this->requestParams;
    }
}
