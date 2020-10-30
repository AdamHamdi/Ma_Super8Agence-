<?php

namespace App\Entity;

class PropertySearch
{

  /**
   * @var int|null
   */
    private $maxPrice;

   /**
   * @var int|null
   */
    private $minSurface;
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