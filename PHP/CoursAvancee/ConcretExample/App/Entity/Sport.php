<?php

namespace App\Entity;

use Exception;

class Sport
{
    private int $id;
    private string $design;

    /**
     * @param string $design
     */
    public function __construct(string $design)
    {
        $this->design = $design;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $design
     */
    public function setDesign(string $design): void
    {
        $this->design = $design;
    }

    /**
     * @throws Exception
     */
    public function __get($property){
        if('design' === $property) {
            return $this->design;
        } elseif('id' === $property) {
            return $this->id;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }
}
