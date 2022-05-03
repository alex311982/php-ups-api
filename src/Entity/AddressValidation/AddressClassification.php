<?php

declare(strict_types=1);

namespace Ups\Entity\AddressValidation;

use SimpleXMLElement;
use InvalidArgumentException;

/**
 * Class AddressClassification
 */
class AddressClassification
{
    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $description;

    /**
     * @param SimpleXMLElement $object
     */
    public function __construct(SimpleXMLElement $object)
    {
        if ($object->count() == 0) {
            throw new InvalidArgumentException(__METHOD__.': The passed object does not have any child nodes.');
        }
        $this->code = $object->Code;
        $this->description = $object->Description;
    }
}
