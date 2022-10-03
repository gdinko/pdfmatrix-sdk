<?php

namespace Gdinko\PdfMatrix\Requests;

use Gdinko\PdfMatrix\Exceptions\PdfMatrixValidationException;
use Gdinko\PdfMatrix\Interfaces\PdfRequestInterface;
use Illuminate\Support\Facades\Validator;

class PdfRequest implements PdfRequestInterface
{
    /**
     * validatedData
     *
     * @var array
     */
    protected $validatedData = [];

    /**
     * __construct
     *
     * @param  array $data
     * @return void
     */
    public function __construct(array $data = [])
    {
        $validator = Validator::make(
            $data,
            $this->validationRules()
        );

        if ($validator->fails()) {
            throw new PdfMatrixValidationException(
                __CLASS__,
                422,
                $validator->messages()->toArray()
            );
        }

        $this->validatedData = $validator->validated();
    }

    /**
     * validationRules
     *
     * @return array
     */
    public function validationRules(): array
    {
        return [
            'url' => 'string|required_without:html',
            'html' => 'string|required_without:url',
            'millisecondsToWait' => 'numeric|sometimes',
            'windowWidth' => 'numeric|sometimes',
            'windowHeight' => 'numeric|sometimes',
            'media' => 'string|sometimes|in:screen,print',
            'click' => 'string|sometimes',
            'waitUntilNetworkIdle' => 'boolean|sometimes',
            'fullPage' => 'boolean|sometimes',
            'dismissDialogs' => 'boolean|sometimes',
            'showBackground' => 'boolean|sometimes',
            'return' => 'string|sometimes|in:json,pdf,download,storage_link',
            'returnParams' => 'boolean|sometimes',
            'returnScreenshot' => 'boolean|sometimes',
            'cookies' => 'array|sometimes',
            'cookieDomain' => 'string|sometimes',
            'extraHTTPHeaders' => 'array|sometimes',
            'username' => 'string|sometimes',
            'password' => 'string|sometimes',
            'paperWidth' => 'numeric|sometimes',
            'paperHeight' => 'numeric|sometimes',
            'paperFormat' => 'string|sometimes|in:Letter,Legal,Tabloid,Ledger,A0,A1,A2,A3,A4,A5,A6',
            'marginTop' => 'numeric|sometimes',
            'marginRight' => 'numeric|sometimes',
            'marginBottom' => 'numeric|sometimes',
            'marginLeft' => 'numeric|sometimes',
            'headerHtml' => 'string|sometimes',
            'footerHtml' => 'string|sometimes',
            'landscape' => 'boolean|sometimes',
            'pages' => 'string|sometimes',
            'browserLang' => 'string|sometimes',
            'userAgent' => 'string|sometimes',
            'deviceScaleFactor' => 'numeric|sometimes',
            'mobile' => 'boolean|sometimes',
            'touch' => 'boolean|sometimes',
            'autoScroll' => 'boolean|sometimes',
            'autoScrollWait' => 'numeric|sometimes',
            'autoScrollBackToTop' => 'boolean|sometimes',
            'autoScrollWaitEnd' => 'numeric|sometimes',
            'ignoreHTTPSErrors' => 'boolean|sometimes',
            'disableJavascript' => 'boolean|sometimes',
            'grayscale' => 'boolean|sometimes',
            'documentName' => 'string|sometimes',
        ];
    }

    /**
     * getValidatedData
     *
     * @return array
     */
    public function getValidatedData(): array
    {
        return $this->validatedData;
    }

    /**
     * getResponseType
     *
     * @return string
     */
    public function getResponseType(): string
    {
        return $this->validatedData['return'] ?? 'json';
    }
}
