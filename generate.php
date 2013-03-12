<?php
require 'lib/autoloader.php';
use Trekksoft\QrEncrypt\QrCode, Trekksoft\QrEncrypt\Renderer\GoogleChartsRenderer;

$qrCode = new QrCode('Comment ça fonctionne? 我爱编码', 300, 300);
$qrCode->setRenderer(new GoogleChartsRenderer());
$qrCodeData = $qrCode->generate();

//Output result
$image = $qrCodeData?@imagecreatefromstring($qrCodeData):false;
if ($image) {
    //Return image in response
    header('Content-Type: image/png');
    echo $qrCodeData;
} else {
    //Return html output (most likely and error from renderer)
    if ($qrCodeData) {
        echo $qrCodeData;
    } else {
        echo '<h1>Failed to generate QR code</h1>';
    }
}