<?php

declare(strict_types=1);

namespace Ups\Entity\Tradeability;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

/**
 * Class TariffInfo.
 */
class TariffInfo implements NodeInterface
{
    /**
     * @var string
     * @required
     */
    private $tariffCode;

    /**
     * @var string
     * @optional
     */
    private $detailId;

    /**
     * @var string
     * @optional
     */
    private $secondaryTariffCode;

    /**
     * @var string
     * @optional
     */
    private $secondaryDetailId;

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

        $node = $document->createElement('TariffInfo');

        // Required
        $node->appendChild($document->createElement('TariffCode', (string)$this->getTariffCode()));

        // Optional
        if ($this->getDetailId() !== null) {
            $node->appendChild($document->createElement('DetailId', (string)$this->getDetailId()));
        }
        if ($this->getSecondaryTariffCode() !== null) {
            $node->appendChild($document->createElement('SecondaryTariffCode', (string)$this->getSecondaryTariffCode()));
        }
        if ($this->getSecondaryDetailId() !== null) {
            $node->appendChild($document->createElement('SecondaryDetailId', (string)$this->getSecondaryDetailId()));
        }

        return $node;
    }

    /**
     * @return string
     */
    public function getTariffCode()
    {
        return $this->tariffCode;
    }

    /**
     * @param string $tariffCode
     */
    public function setTariffCode(string $tariffCode): void
    {
        $this->tariffCode = $tariffCode;
    }

    /**
     * @return string|null
     */
    public function getDetailId(): ?string
    {
        return $this->detailId;
    }

    /**
     * @param string $detailId
     */
    public function setDetailId(string $detailId): void
    {
        $this->detailId = $detailId;
    }

    /**
     * @return string|null
     */
    public function getSecondaryTariffCode(): ?string
    {
        return $this->secondaryTariffCode;
    }

    /**
     * @param string $secondaryTariffCode
     */
    public function setSecondaryTariffCode(string $secondaryTariffCode): void
    {
        $this->secondaryTariffCode = $secondaryTariffCode;
    }

    /**
     * @return string|null
     */
    public function getSecondaryDetailId(): ?string
    {
        return $this->secondaryDetailId;
    }

    /**
     * @param string $secondaryDetailId
     */
    public function setSecondaryDetailId(string $secondaryDetailId): string
    {
        $this->secondaryDetailId = $secondaryDetailId;
    }
}
