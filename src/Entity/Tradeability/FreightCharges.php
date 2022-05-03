<?php

declare(strict_types=1);

namespace Ups\Entity\Tradeability;

use DOMDocument;
use DOMElement;

/**
 * Class FreightCharges
 */
class FreightCharges extends \Ups\Entity\FreightCharges
{
    private $currencyCode;

    public function __construct($response = null)
    {
        if (null !== $response) {
            if (isset($response->CurrencyCode)) {
                $this->setCurrencyCode($response->CurrencyCode);
            }
        }

        parent::__construct($response);
    }

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

        $node = $document->createElement('FreightCharges');
        $node->appendChild($document->createElement('MonetaryValue', (string)$this->getMonetaryValue()));
        $node->appendChild($document->createElement('CurrencyCode', (string)$this->getCurrencyCode()));

        return $node;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param mixed $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }
}
