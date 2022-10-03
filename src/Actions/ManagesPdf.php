<?php

namespace Gdinko\PdfMatrix\Actions;

use Gdinko\PdfMatrix\Interfaces\PdfRequestInterface;

trait ManagesPdf
{
    /**
     * pdf
     *
     * @param  \Gdinko\PdfMatrix\Interfaces\PdfRequestInterface $request
     *
     * @throws \Gdinko\PdfMatrix\Exceptions\PdfMatrixValidationException
     *
     * @return \Illuminate\Http\Response|array
     */
    public function pdf(PdfRequestInterface $request)
    {
        $response = $this->post(
            'get',
            $request->getValidatedData()
        );

        switch ($request->getResponseType()) {
            //return http pdf response
            case 'pdf':
                return response(
                    $response->body(),
                    $response->status(),
                    collect($response->headers())->only([
                        'Content-Type',
                        'Content-disposition',
                    ])->toArray()
                );

                //return http pdf download response
            case 'download':
                return response(
                    $response->body(),
                    $response->status(),
                    collect($response->headers())->only([
                        'Content-Description',
                        'Content-Transfer-Encoding',
                        'Content-Type',
                        'Content-Length',
                        'Content-disposition',
                        'Cache-Control',
                    ])->toArray()
                );

                //return json
            default:
                return $response->json();
        }
    }
}
