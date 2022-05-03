<?php

declare(strict_types=1);

namespace Ups\Entity\Tradeability;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

/**
 * Class Quantity.
 */
class Quantity implements NodeInterface
{
    /**
     * @var UnitOfMeasurement
     */
    private $unitOfMeasurement;

    /**
     * @var int
     */
    private $value;

    /**
     * @param null|DOMDocument $document
     *
     * @return DOMElement
     *
     * @throws \DOMException
     */
    public function toNode(DOMDocument $document = null): DOMElement
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('Quantity');

        // Required
        $node->appendChild($document->createElement('Value', (string)$this->getValue()));

        // Optional
        if ($this->getUnitOfMeasurement() instanceof UnitOfMeasurement) {
            $node->appendChild($this->getUnitOfMeasurement()->toNode($document));
        }

        return $node;
    }

    /**
     * @return int
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    /**
     * @return UnitOfMeasurement|null
     */
    public function getUnitOfMeasurement(): ?UnitOfMeasurement
    {
        return $this->unitOfMeasurement;
    }

    /**
     * @param UnitOfMeasurement $unitOfMeasurement
     */
    public function setUnitOfMeasurement(UnitOfMeasurement $unitOfMeasurement): void
    {
        $this->unitOfMeasurement = $unitOfMeasurement;
    }
}
