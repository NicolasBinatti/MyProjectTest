<?php
namespace App\Controller;

abstract class Base
{


    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $doctrine;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var \App\Helpers\Email
     */
    protected $phpmailer;

    /**
     * @var \Mpdf
     */
    protected $mpdf;

    /**
     * @var \DomPdf\DomPDf
     */
    protected $dompdf;

    /**
     * @var \App\Helpers\Token
     */
    protected $token;

    /**
     *
     * @var array
     */
    protected $iplist = [];



    protected function __construct(\Slim\Container $container)
    {
        $this->doctrine = $container->doctrine;
        $this->client = $container->client;
        $this->phpmailer = $container->phpmailer;
        $this->mpdf = $container->mpdf;
        $this->dompdf = $container->dompdf;
        $this->token = $container->token;
        $this->iplist = $container->settings['ip'];
    
    }
}
