<?php

declare(strict_types=1);

namespace Ups;

use DOMDocument;
use DOMNode;

/**
 * Class NodeInterface
 */
interface NodeInterface
{
    /**
     * @param null|DOMDocument $document
     *
     * @return DOMNode
     */
    public function toNode(DOMDocument $document = null);
}
