<?php

declare(strict_types=1);

namespace Ups\Entity\RateTimeInTransit;

use Ups\Entity\EstimatedArrivalTrait;

/**
 * Class EstimatedArrival
 */
class EstimatedArrival
{
    use EstimatedArrivalTrait;

    /**
     * @var string
     */
    protected $businessDaysInTransit;

    /**
     * @param \stdClass|null $response
     */
    public function __construct(\stdClass $response = null)
    {
        if (null !== $response) {
            $this->build($response);

            if (isset($response->BusinessDaysInTransit)) {
                $this->businessDaysInTransit = $response->BusinessDaysInTransit;
            }
        }
    }

    /**
     * @return string
     */
    public function getBusinessDaysInTransit(): string
    {
        return $this->businessDaysInTransit;
    }

    /**
     * @param string $BusinessDaysInTransit
     */
    public function setBusinessDaysInTransit(string $BusinessDaysInTransit)
    {
        $this->businessDaysInTransit = $BusinessDaysInTransit;
    }
}
