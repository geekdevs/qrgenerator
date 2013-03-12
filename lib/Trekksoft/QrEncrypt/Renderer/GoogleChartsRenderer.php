<?php
namespace Trekksoft\QrEncrypt\Renderer;

/**
 * QRCode renderer using google apis
 * @see https://developers.google.com/chart/infographics/docs/qr_codes
 */
class GoogleChartsRenderer implements QrRendererInterface
{
    /**
     * Google URL for QR code requesting
     * @var string
     */
    protected $rootUrl = 'http://chart.googleapis.com/chart?cht=qr';

    /**
     * Width of the resulting QR image
     * @var int
     */
    protected $width;

    /**
     * Height of the resulting QR image
     * @var int
     */
    protected $height;


    /**
     * Render QR code with given details
     *
     * @param $data
     * @param string $encoding
     * @return string
     */
    public function render($data, $encoding='UTF-8')
    {
        $requestUrl = $this->rootUrl;
        $requestUrl .= '&chs='.$this->width.'x'.$this->height;
        $requestUrl .= '&chl='.urlencode($data);
        $requestUrl .= '&choe='.urlencode($encoding);

        return $this->getUrlContents($requestUrl);
    }

    /**
     * Makes CURL request
     *
     * @param $url
     *
     * @return string   Response
     */
    protected function getUrlContents($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = (int)$width;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = (int)$height;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
}