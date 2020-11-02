<?php

namespace App\Entity;

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

    private $option;

    public function __construct (){
        
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




}