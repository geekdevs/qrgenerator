<?php
require 'lib/autoloader.php';
use Trekksoft\QrEncrypt\QrCode, Trekksoft\QrEncrypt\Renderer\GoogleChartsRenderer;

$text = "
Name: Joe Doe\n
Tour: River Rafting Tour on the Big Sea\n
Date: 20 june 2013 at 14:15h\n
Price: USD 50.-\n
";

$qrCode = new QrCode($text, 300, 300);
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