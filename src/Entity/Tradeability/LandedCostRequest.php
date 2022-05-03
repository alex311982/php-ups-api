<?php

declare(strict_types=1);

namespace Ups\Entity\Tradeability;

/**
 * Class LandedCostRequest
 */
class LandedCostRequest
{
    /**
     * @var QueryRequest
     */
    private $queryRequest;

    /**
     * @var mixed
     */
    private $estimateRequest;

    /**
     * @return QueryRequest
     */
    public function getQueryRequest(): QueryRequest
    {
        return $this->queryRequest;
    }

    /**
     * @param QueryRequest $queryRequest
     */
    public function setQueryRequest($queryRequest): void
    {
        $this->queryRequest = $queryRequest;
    }

    /**
     * @return mixed
     */
    public function getEstimateRequest()
    {
        return $this->estimateRequest;
    }

    /**
     * @param mixed $estimateRequest
     */
    public function setEstimateRequest($estimateRequest): void
    {
        $this->estimateRequest = $estimateRequest;
    }
}
