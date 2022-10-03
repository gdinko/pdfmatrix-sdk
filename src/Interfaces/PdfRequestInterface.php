<?php

namespace Gdinko\PdfMatrix\Interfaces;

interface PdfRequestInterface
{
    /**
     * validationRules
     *
     * @return array
     */
    public function validationRules(): array;

    /**
     * getValidatedData
     *
     * @return array
     */
    public function getValidatedData(): array;

    /**
     * getResponseType
     *
     * @return string
     */
    public function getResponseType(): string;
}
