<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
class PropertySearch
{

  /**
   * @var int|null
   * @Assert\Range(min=10 , max=400)
   */
    private $maxPrice;

   /**
   * @var int|null
   * @Assert\Range(min=10 , max=400)
   */

    private $minSurface;
    /**
     * @var ArrayCollection
     */

    private $options;

    public function __construct (){
        $this->options = new ArrayCollection();
    }
    
   /**
   * @var int|null
   */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

     /**
   * @var int|null $maxPrice
   * @return PropertySearch
   */
    public function setMaxPrice(?int $maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

     /**
   * @var int|null
   */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }
     /**
   * @var int|null $minSurface
   * @return PropertySearch
   */

    public function setMinSurface(?int $minSurface): PropertySearch
    {
        $this->minSurface = $minSurface;

        return $this;
    }





    /**
     * Get the value of options
     */ 
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @return  self
     */ 
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

   
}