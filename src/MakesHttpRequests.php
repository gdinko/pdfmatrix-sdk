<?php

namespace Gdinko\PdfMatrix;

use Gdinko\PdfMatrix\Exceptions\PdfMatrixException;
use Illuminate\Support\Facades\Http;

trait MakesHttpRequests
{
    /**
     * get
     *
     * @param  string $url
     * @param  array $data
     *
     * @throws \Gdinko\PdfMatrix\Exceptions\PdfMatrixException
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function get($url, array $data = [])
    {
        return $this->request('get', $url, $data);
    }

    /**
     * post
     *
     * @param  string $url
     * @param  array $data
     *
     * @throws \Gdinko\PdfMatrix\Exceptions\PdfMatrixException
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function post($url, array $data = [])
    {
        return $this->request('post', $url, $data);
    }

    /**
     * request
     *
     * @param  string $verb
     * @param  string $url
     * @param  array $data
     *
     * @throws \Gdinko\PdfMatrix\Exceptions\PdfMatrixException
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function request($verb, $url, $data = [])
    {
        return Http::accept('application/json')
            ->withToken($this->apiToken)
            ->timeout($this->timeout)
            ->baseUrl($this->baseUrl)
            ->{$verb}($url, $data)
            ->throw(function ($response, $e) {
                throw new PdfMatrixException(
                    $e->getMessage(),
                    $e->getCode(),
                    $response->json() ?: [$response->body()]
                );
            });
    }
}
