<?php
namespace App\Listener;

use Doctrine\Common\EventSubscriber;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Vich\UploaderBundle\Handler\UploadHandler;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class ImageCacheSubscriber implements EventSubscriber{

    protected $cacheManager;

    protected $uploderHelper;

   public function __construct(CacheManager $cacheManager ,UploadHandler  $uploderHelper)
   {
       
       $this->cacheManager = $cacheManager;
        $this->uploderHelper = $uploderHelper;
    }

public function getSubscribedEvents()
{
    
}

}