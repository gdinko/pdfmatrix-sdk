<?php

namespace Gdinko\PdfMatrix\Actions;

trait ManagesFiles
{
    /**
     * listMyFiles
     * 
     * @throws \Gdinko\PdfMatrix\Exceptions\PdfMatrixException
     *
     * @return array
     */
    public function listMyFiles(): array
    {
        return $this->get(
            'listmyfiles'
        )->json();
    }

    /**
     * getFile
     *
     * @param  string $hash
     * 
     * @throws \Gdinko\PdfMatrix\Exceptions\PdfMatrixException
     * 
     * @return string
     */
    public function getFile($hash): string
    {
        return $this->get(
            "getfile/{$hash}"
        )->body();
    }

    /**
     * deleteFile
     *
     * @param  int $id
     * 
     * @throws \Gdinko\PdfMatrix\Exceptions\PdfMatrixException
     * 
     * @return array
     */
    public function deleteFile($id): array
    {
        return $this->get(
            "deletefile",
            ['id' => $id]
        )->json();
    }
}
