<?php

$container = $app->getContainer();

$container['doctrine'] = function($c) {
    $settings = $c->get('settings')['doctrine'];
//    $redis = false;
    $em = new \App\Dependencies\Doctrine($settings, false, false);
    return $em();
};

$container['client'] = function() {
    return new \GuzzleHttp\Client();
};

$container['phpmailer'] = function($c) {
    // return new \App\Helpers\Email($c->get('settings')['phpmailer']);
};

$container['htmlpdf'] = function() {
    return new \Spipu\Html2Pdf\Html2Pdf();
};

$container['mpdf'] = function() {
    return new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'debug' => true]);
};

$container['dompdf'] = function() {
    return new Dompdf\Dompdf();
};

$container['cssinline'] = function() {
    return new TijsVerkoyen\CssToInlineStyles\CssToInlineStyles();
};

$container['token'] = function($c) {
    return new App\Helpers\Token($c->get('settings')['tokenkey']);
};
