<?php

class Circle extends Shape {
    const SHAPE_TYPE = 3;

    protected $radius;

    public function __construct($radius) {
        parent::__construct();

        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }

    public function getFullDescription() {
        return sprintf('Circle<#%s>: %s - %d', $this->getID(), $this->name, $this->radius);
    }

} 