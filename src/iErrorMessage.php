<?php

declare(strict_types=1);

namespace FluencePrototype\Validation;

/**
 * Interface iErrorMessage
 * @package FluencePrototype\Validation
 */
interface iErrorMessage
{

    /**
     * @return string
     */
    public function getMessage(): string;

}