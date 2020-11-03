<?php
namespace App\Listener;

use App\Entity\Property;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;


class ImageCacheSubscriber implements EventSubscriber{

      /**
     * CacheManager
     *
     * @var CacheManager
     */
    private $cacheManager;

    /**
     * UploaderHelper
     *
     * @var UploaderHelper
     */
    private $uploaderHelper;
   

    

   public function __construct(CacheManager $cacheManager ,UploaderHelper $uploaderHelper)
   {
       
       $this->cacheManager = $cacheManager;
        $this->uploderHelper = $uploaderHelper;
        
    }
    public function getSubscribedEvents()
    {
        return [
            'preRemove',
            'postUpdate'
        ];
    }

    public function preRemove(LifecycleEventArgs $args)
    {

        $entity = $args->getEntity();
        if (!$entity instanceof Property) {
            $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
        }
           
        
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        

        $entity = $args->getEntity();
        if ($entity instanceof Property) {
            return;
        }

            if ($entity->getImageFile() instanceof UploadedFile) {
                $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
            }
        
    
}

}