<?php

declare(strict_types=1);

namespace FluencePrototype\Validation;

/**
 * Interface iValidate
 * @package FluencePrototype\Validation
 */
interface iValidate
{

    /**
     * iValidate constructor.
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage);

    /**
     * @return string
     */
    public function getMessage(): string;

    /**
     * @param bool|float|int|string|null $value
     * @return bool
     */
    public function validate(bool|float|int|null|string $value): bool;

}