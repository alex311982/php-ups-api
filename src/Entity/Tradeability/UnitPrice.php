<?php

declare(strict_types=1);

namespace Ups\Entity\Tradeability;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

/**
 * Class UnitPrice.
 */
class UnitPrice implements NodeInterface
{

    /**
     * @var float
     */
    private $monetaryValue;

    /**
     * @var string
     */
    private $currencyCode;

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

        $node = $document->createElement('UnitPrice');

        // Required
        $node->appendChild($document->createElement('MonetaryValue', (string)$this->getMonetaryValue()));

        // Optional
        if ($this->getCurrencyCode() !== null) {
            $node->appendChild($document->createElement('CurrencyCode', (string)$this->getCurrencyCode()));
        }

        return $node;
    }

    /**
     * @return float|null
     */
    public function getMonetaryValue(): ?float
    {
        return $this->monetaryValue;
    }

    /**
     * @param float $monetaryValue
     */
    public function setMonetaryValue(float $monetaryValue)
    {
        $this->monetaryValue = $monetaryValue;
    }

    /**
     * @return string|null
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     */
    public function setCurrencyCode(string $currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }
}
