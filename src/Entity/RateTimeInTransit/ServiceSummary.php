<?php

declare(strict_types=1);

namespace Ups\Entity\RateTimeInTransit;

use Ups\Entity\ServiceSummaryTrait;
use stdClass;

/**
 * Class ServiceSummary
 */
class ServiceSummary
{
    use ServiceSummaryTrait;

    /**
     * @var EstimatedArrival|null
     */
    protected $estimatedArrival;

    /**
     * @param stdClass|null $response
     */
    public function __construct(stdClass $response = null)
    {
        $this->build($response);

        $this->setEstimatedArrival(new EstimatedArrival());

        if (null !== $response) {
            if (isset($response->EstimatedArrival)) {
                $this->setEstimatedArrival(new EstimatedArrival($response->EstimatedArrival));
            }
        }
    }

    /**
     * @return EstimatedArrival|null
     */
    public function getEstimatedArrival(): ?EstimatedArrival
    {
        return $this->estimatedArrival;
    }

    /**
     * @param EstimatedArrival $estimatedArrival
     */
    public function setEstimatedArrival(EstimatedArrival $estimatedArrival)
    {
        $this->estimatedArrival = $estimatedArrival;
    }
}
