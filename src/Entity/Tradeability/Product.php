<?php

declare(strict_types=1);

namespace Ups\Entity\Tradeability;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

/**
 * Class Product.
 */
class Product implements NodeInterface
{
    /**
     * @var string
     */
    private $productName;

    /**
     * @var string
     */
    private $productDescription;

    /**
     * @var string
     */
    private $productCountryCodeOfOrigin;

    /**
     * @var TariffInfo
     */
    private $tariffInfo;

    /**
     * @var Quantity
     */
    private $quantity;

    /**
     * @var UnitPrice
     */
    private $unitPrice;

    /**
     * @var Weight
     */
    private $weight;

    /**
     * @var int
     */
    private $tariffCodeAlert = 0;

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

        $node = $document->createElement('Product');

        // Required
        if ($this->getTariffInfo() !== null) {
            $node->appendChild($this->getTariffInfo()->toNode($document));
        }
        if ($this->getUnitPrice() !== null) {
            $node->appendChild($this->getUnitPrice()->toNode($document));
        }
        if ($this->getQuantity() !== null) {
            $node->appendChild($this->getQuantity()->toNode($document));
        }

        // Optional
        if ($this->getProductName() !== null) {
            $node->appendChild($document->createElement('ProductName', (string)$this->getProductName()));
        }
        if ($this->getProductDescription() !== null) {
            $node->appendChild($document->createElement('ProductDescription', (string)$this->getProductDescription()));
        }
        if ($this->getProductCountryCodeOfOrigin() !== null) {
            $node->appendChild(
                $document->createElement(
                    'ProductCountryCodeOfOrigin',
                    (string)$this->getProductCountryCodeOfOrigin()
                )
            );
        }
        if ($this->getWeight() instanceof Weight) {
            $node->appendChild($this->getWeight()->toNode($document));
        }
        if ($this->getTariffCodeAlert() !== null) {
            $node->appendChild($document->createElement('TariffCodeAlert', (string)$this->getTariffCodeAlert()));
        }

        return $node;
    }

    /**
     * @return TariffInfo|null
     */
    public function getTariffInfo(): ?TariffInfo
    {
        return $this->tariffInfo;
    }

    /**
     * @param TariffInfo $tariffInfo
     */
    public function setTariffInfo(TariffInfo $tariffInfo): void
    {
        $this->tariffInfo = $tariffInfo;
    }

    /**
     * @return UnitPrice|null
     */
    public function getUnitPrice(): ?UnitPrice
    {
        return $this->unitPrice;
    }

    /**
     * @param UnitPrice $unitPrice
     */
    public function setUnitPrice(UnitPrice $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return Quantity|null
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @param Quantity $quantity
     */
    public function setQuantity(Quantity $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string|null
     */
    public function getProductName(): ?string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     */
    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return string|null
     */
    public function getProductDescription(): ?string
    {
        return $this->productDescription;
    }

    /**
     * @param string $productDescription
     */
    public function setProductDescription(string $productDescription): void
    {
        $this->productDescription = $productDescription;
    }

    /**
     * @return string|null
     */
    public function getProductCountryCodeOfOrigin(): ?string
    {
        return $this->productCountryCodeOfOrigin;
    }

    /**
     * @param string $productCountryCodeOfOrigin
     */
    public function setProductCountryCodeOfOrigin(string $productCountryCodeOfOrigin): void
    {
        $this->productCountryCodeOfOrigin = $productCountryCodeOfOrigin;
    }

    /**
     * @return Weight|null
     */
    public function getWeight(): ?Weight
    {
        return $this->weight;
    }

    /**
     * @param Weight $weight
     */
    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getTariffCodeAlert(): int
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
}
