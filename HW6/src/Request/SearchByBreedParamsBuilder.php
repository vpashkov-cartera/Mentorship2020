<?php

namespace src\Request;

class SearchByBreedParamsBuilder extends AbstractRequestParamsBuilder
{
    /**
     * @var string
     */
    protected $breedId;

    /**
     * SearchByBreedParamsBuilder constructor.
     * @param string $breedId
     */
    public function __construct(string $breedId)
    {
        $this->breedId = $breedId;
    }

    /**
     * {@inheritDoc}
     */
    public function create(): array
    {
        parent::create();

        if (!empty($this->breedId)) {
            $this->requestParams['breed_ids'] = $this->breedId;
        }

        return $this->requestParams;
    }
}
