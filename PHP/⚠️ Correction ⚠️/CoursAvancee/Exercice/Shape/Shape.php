<?php

class Shape {
    const SHAPE_TYPE = 1;

    public $name;
    protected $length, $width;
    private $id;

    public function __construct($length = 0, $width = 0) {
        // Set length and width properties
        $this->length   = $length;
        $this->width    = $width;

        // Generate ID
        $this->id       = uniqid();
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getID() {
        return $this->id;
    }

    public function area() {
        return $this->length * $this->width;
    }

    public static function getTypeDescription() {
        // self::SHAPE_TYPE is not working, it always returns SHAPE_TYPE from the Shape class
        $c = get_called_class();
        return sprintf('Type: %d', $c::SHAPE_TYPE);
    }

    public function getFullDescription() {
        return sprintf('%s<#%s>: %s - %d x %d', get_class($this), $this->getID(), $this->name, $this->length, $this->width);
    }

} 