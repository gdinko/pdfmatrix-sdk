<?php

namespace Gdinko\PdfMatrix\Actions;

trait ManagesMe
{    
    /**
     * me
     * 
     * @throws \Gdinko\PdfMatrix\Exceptions\PdfMatrixException
     *
     * @return array
     */
    public function me(): array
    {
        return $this->get(
            'user'
        )->json();
    }
}
