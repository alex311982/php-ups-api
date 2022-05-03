<?php

declare(strict_types=1);

namespace Ups\Entity\Tradeability;

use DomDocument;
use DomElement;
use Ups\NodeInterface;

/**
 * Class Shipment.
 */
class Shipment implements NodeInterface
{
    /**
     * @var int
     */
    const TRANSPORT_MODE_AIR = 1;

    /**
     * @var int
     */
    const TRANSPORT_MODE_GROUND = 2;

    /**
     * @var int
     */
    const TRANSPORT_MODE_RAIL = 3;

    /**
     * @var int
     */
    const TRANSPORT_MODE_OCEAN = 4;

    /**
     * @var string
     */
    private $originCountryCode;

    /**
     * @var string
     */
    private $originStateProvinceCode;

    /**
     * @var string
     */
    private $destinationCountryCode;

    /**
     * @var string
     */
    private $destinationStateProvinceCode;

    /**
     * @var int
     */
    private $transportationMode;

    /**
     * @var FreightCharges
     */
    private $freightCharges;

    /**
     * @var mixed
     */
    private $additionalInsurance;

    /**
     * @var array
     */
    private $products = [];

    /**
     * @var string
     */
    private $resultCurrencyCode;

    /**
     * @var
     */
    private $transactionReferenceId;

    /**
     * @var int
     */
    private $tariffCodeAlert;

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

        $node = $document->createElement('Shipment');

        if ($this->getFreightCharges() instanceof FreightCharges) {
            $node->appendChild($this->getFreightCharges()->toNode($document));
        }

        // Then the required values
        $node->appendChild($document->createElement('OriginCountryCode', (string)$this->getOriginCountryCode()));
        $node->appendChild($document->createElement('DestinationCountryCode', (string)$this->getDestinationCountryCode()));

        // Then the optional values
        if ($this->getOriginStateProvinceCode() !== null) {
            $node->appendChild(
                $document->createElement(
                    'OriginStateProvinceCode',
                    (string)$this->getOriginStateProvinceCode()
                )
            );
        }
        if ($this->getDestinationStateProvinceCode() !== null) {
            $node->appendChild(
                $document->createElement(
                    'DestinationStateProvinceCode',
                    (string)$this->getDestinationStateProvinceCode()
                )
            );
        }
        if ($this->getTransportationMode() !== null) {
            $node->appendChild($document->createElement('TransportationMode', (string)$this->getTransportationMode()));
        }
        if ($this->getResultCurrencyCode() !== null) {
            $node->appendChild($document->createElement('ResultCurrencyCode', (string)$this->getResultCurrencyCode()));
        }
        if ($this->getTariffCodeAlert() !== null) {
            $node->appendChild($document->createElement('TariffCodeAlert', (string)$this->getTariffCodeAlert()));
        }
        if ($this->getTransactionReferenceId() !== null) {
            $node->appendChild($document->createElement('TransactionReferenceID', (string)$this->getTransactionReferenceId()));
        }

        // Then products array
        foreach ($this->products as $product) {
            $node->appendChild($product->toNode($document));
        }

        // Return created node
        return $node;
    }

    /**
     * @return mixed
     */
    public function getAdditionalInsurance()
    {
        return $this->additionalInsurance;
    }

    /**
     * @param mixed $additionalInsurance
     */
    public function setAdditionalInsurance($additionalInsurance): void
    {
        $this->additionalInsurance = $additionalInsurance;
    }

    /**
     * @return FreightCharges|null
     */
    public function getFreightCharges(): ?FreightCharges
    {
        return $this->freightCharges;
    }

    /**
     * @param FreightCharges $freightCharges
     */
    public function setFreightCharges(FreightCharges $freightCharges): void
    {
        $this->freightCharges = $freightCharges;
    }

    /**
     * @return string
     */
    public function getOriginCountryCode()
    {
        return $this->originCountryCode;
    }

    /**
     * @param string $originCountryCode
     */
    public function setOriginCountryCode($originCountryCode): void
    {
        $this->originCountryCode = $originCountryCode;
    }

    /**
     * @return string|null
     */
    public function getDestinationCountryCode(): ?string
    {
        return $this->destinationCountryCode;
    }

    /**
     * @param string $destinationCountryCode
     */
    public function setDestinationCountryCode($destinationCountryCode): void
    {
        $this->destinationCountryCode = $destinationCountryCode;
    }

    /**
     * @return string|null
     */
    public function getOriginStateProvinceCode(): ?string
    {
        return $this->originStateProvinceCode;
    }

    /**
     * @param string $originStateProvinceCode
     */
    public function setOriginStateProvinceCode(string $originStateProvinceCode): void
    {
        $this->originStateProvinceCode = $originStateProvinceCode;
    }

    /**
     * @return string|null
     */
    public function getDestinationStateProvinceCode(): ?string
    {
        return $this->destinationStateProvinceCode;
    }

    /**
     * @param string $destinationStateProvinceCode
     */
    public function setDestinationStateProvinceCode(string $destinationStateProvinceCode): void
    {
        $this->destinationStateProvinceCode = $destinationStateProvinceCode;
    }

    /**
     * @return int|null
     */
    public function getTransportationMode(): ?int
    {
        return $this->transportationMode;
    }

    /**
     * @param int $transportationMode
     */
    public function setTransportationMode(int $transportationMode): void
    {
        $this->transportationMode = $transportationMode;
    }

    /**
     * @return string|null
     */
    public function getResultCurrencyCode(): ?string
    {
        return $this->resultCurrencyCode;
    }

    /**
     * @param string $resultCurrencyCode
     */
    public function setResultCurrencyCode(string $resultCurrencyCode): void
    {
        $this->resultCurrencyCode = $resultCurrencyCode;
    }

    /**
     * @return int|null
     */
    public function getTariffCodeAlert(): ?int
    {
        return $this->tariffCodeAlert;
    }

    /**
     * @param int $tariffCodeAlert
     */
    public function setTariffCodeAlert(int $tariffCodeAlert): void
    {
        $this->tariffCodeAlert = $tariffCodeAlert;
    }

    /**
     * @return mixed
     */
    public function getTransactionReferenceId()
    {
        return $this->transactionReferenceId;
    }

    /**
     * @param mixed $transactionReferenceId
     */
    public function setTransactionReferenceId($transactionReferenceId): void
    {
        $this->transactionReferenceId = $transactionReferenceId;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    /**
     * @param Product $product
     *
     * @return $this
     */
    public function addProduct(Product $product): self
    {
        array_push($this->products, $product);

        return $this;
    }
}
