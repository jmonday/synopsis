<?php

namespace Synopsis\Bundle\SubjectBundle\Twig;

/**
 * Class GoogleChartQrCode
 *
 * @package Synopsis\Bundle\SubjectBundle\Twig
 */
class GoogleChartQrCode extends \Twig_Extension
{

    /**
     * {@inheritdoc}
     */
    public function getFunctions ()
    {
        return array(
            new \Twig_SimpleFunction('qr_code', array($this, 'get')),
        );
    }

    /**
     * Generate a QR code via the Google Charts API.
     *
     * @link https://developers.google.com/chart/infographics/docs/qr_codes
     * @param string $data Raw data that will be encoded.
     * @param int $size The width/height of the QR code in pixels.
     * @return string The Google Charts image URL.
     */
    public function get ( $data, $size = 250 )
    {
        $root = 'https://chart.googleapis.com/chart?';

        $urlParams = http_build_query([
            'cht'  => 'qr',
            'chs'  => $size,
            'chl'  => $data,
            'chld' => 'Q|0',
        ]);

        return sprintf('%s%s', $root, $urlParams);
    }

    /**
     * {@inheritdoc}
     */
    public function getName ()
    {
        return 'qr_code_extension';
    }

}