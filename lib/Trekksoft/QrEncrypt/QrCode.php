<?php
namespace Trekksoft\QrEncrypt;
use Trekksoft\QrEncrypt\Renderer\QrRendererInterface;

class QrCode {
    /**
     * @var QrRendererInterface
     */
    protected $renderer;

    /**
     * Data to be encoded into QR code
     * @var string|binary
     */
    protected $text;

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
     * Constructs QrCode
     *
     * @param string $text
     * @param int $width
     * @param int $height
     */
    public function __construct($text, $width, $height)
    {
        $this->text = $text;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @throws \LogicException
     *
     * @return string|false string containing image on success, false otherwise
     */
    public function generate()
    {
        if (!$this->renderer) {
            throw new \LogicException('Renderer is not set');
        }

        $this->renderer->setWidth($this->width);
        $this->renderer->setHeight($this->height);

        return $this->renderer->render($this->text);
    }

    /**
     * @param \Trekksoft\QrEncrypt\Renderer\QrRendererInterface $renderer
     */
    public function setRenderer(QrRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @return \Trekksoft\QrEncrypt\Renderer\QrRendererInterface
     */
    public function getRenderer()
    {
        return $this->renderer;
    }
}