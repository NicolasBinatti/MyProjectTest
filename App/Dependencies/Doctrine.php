<?php
namespace App\Dependencies;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Cache\ApcuCache;
use Doctrine\Common\Cache\PredisCache;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\EntityManager;

class Doctrine
{

    private $settings;
    private $isdevmode;
    private $predis;
    private $c;

    public function __construct($settings, $isdevmode = true, $c = null)
    {
        if(__DEBUG == 1) {
            print_r($c);exit;
        }
        $this->settings = $settings;
        $this->isdevmode = $isdevmode;
        $this->c = $c;
    }

    private function setAnnotationRegistry()
    {
        AnnotationRegistry::registerFile(dirname(dirname(__DIR__)) . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
    }

    private function setDriver()
    {
        return new AnnotationDriver(new AnnotationReader(), $this->settings['paths']);
    }

    private function setConfig($driver)
    {
        $config = Setup::createConfiguration($this->isdevmode);
        $config->setMetadataDriverImpl($driver);
//        if ($this->isdevmode) {
//            return $config;
//        }

        if ($this->c) {
            $config->setQueryCacheImpl(new PredisCache($this->c));
            $config->setResultCacheImpl(new PredisCache($this->c));
            $config->setMetadataCacheImpl(new PredisCache($this->c));
        }

        if (!$this->c) {
            $config->setQueryCacheImpl(new ApcuCache());
            $config->setResultCacheImpl(new ApcuCache());
            $config->setMetadataCacheImpl(new ApcuCache());
        }

        return $config;
    }

    public function __invoke()
    {
        $this->setAnnotationRegistry();
        $driver = $this->setDriver();
        $config = $this->setConfig($driver);
        return EntityManager::create($this->settings['params'], $config);
    }
}
