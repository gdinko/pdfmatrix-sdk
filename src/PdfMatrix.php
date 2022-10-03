<?php

namespace Gdinko\PdfMatrix;

class PdfMatrix
{
    use MakesHttpRequests;
    use Actions\ManagesMe;
    use Actions\ManagesPdf;
    use Actions\ManagesFiles;

    /**
     * apiToken
     *
     * @var string
     */
    protected $apiToken;

    /**
     * baseUrl
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * timeout
     *
     * @var integer
     */
    protected $timeout;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->apiToken = config('pdfmatrix.api_token');

        $this->timeout = config('pdfmatrix.timeout');

        $this->baseUrl = config('pdfmatrix.base_url');
    }

    /**
     * setApiToken
     *
     * @param  string $apiToken
     * @return void
     */
    public function setApiToken(string $apiToken): void
    {
        $this->apiToken = $apiToken;
    }

    /**
     * setBaseUrl
     *
     * @param  string $baseUrl
     * @return void
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    /**
     * getBaseUrl
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * setTimeout
     *
     * @param  int $timeout
     * @return void
     */
    public function setTimeout(int $timeout): void
    {
        $this->timeout = $timeout;
    }

    /**
     * getTimeout
     *
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }
}
