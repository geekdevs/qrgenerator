<?php
namespace Trekksoft\QrEncrypt\Renderer;

/**
 * Interface for QrCodes rendering
 */
interface QrRendererInterface
{
    /**
     * Render QR code with given details
     *
     * @param $data
     * @param string $encoding
     * @return string
     */
    public function render($data, $encoding);
}