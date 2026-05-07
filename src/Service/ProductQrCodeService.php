<?php

namespace App\Service;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\SvgWriter;

class ProductQrCodeService
{
    public function generateSvgString(string $data): string
    {
        $result = Builder::create()
            ->writer(new SvgWriter())
            ->data($data)
            ->size(300)
            ->margin(10)
            ->build();

        return $result->getString();
    }
}