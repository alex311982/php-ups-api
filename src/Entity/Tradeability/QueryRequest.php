<?php

declare(strict_types=1);

namespace Ups\Entity\Tradeability;

use DomDocument;
use DomElement;
use Ups\NodeInterface;

/**
 * Class QueryRequest.
 */
class QueryRequest implements NodeInterface
{

    /**
     * @var Shipment
     */
    private $shipment;

    /**
     * @var bool
     */
    private $suppressQuestionIndicator = false;

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

        $node = $document->createElement('QueryRequest');

        if ($this->getShipment() !== null) {
            $node->appendChild($this->getShipment()->toNode($document));
        }
        $node->appendChild(
            $document->createElement(
                'SuppressQuestionIndicator',
                ($this->isSuppressQuestionIndicator() ? 'Y' : 'N')
            )
        );

        return $node;
    }

    /**
     * @return Shipment|null
     */
    public function getShipment(): ?Shipment
    {
        return $this->shipment;
    }

    /**
     * @param Shipment $shipment
     */
    public function setShipment(Shipment $shipment): void
    {
        $this->shipment = $shipment;
    }

    /**
     * @return boolean
     */
    public function isSuppressQuestionIndicator(): bool
    {
        return $this->suppressQuestionIndicator;
    }

    /**
     * @param boolean $suppressQuestionIndicator
     */
    public function setSuppressQuestionIndicator(bool $suppressQuestionIndicator): void
    {
        $this->suppressQuestionIndicator = $suppressQuestionIndicator;
    }
}
