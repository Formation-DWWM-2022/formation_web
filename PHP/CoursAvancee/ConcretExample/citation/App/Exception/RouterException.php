<?php

namespace App\Exception;

use Exception;

class RouterException extends Exception {
    protected $details;

    public function __construct($details) {
        $this->details = $details;
        parent::__construct();
    }

    public function __toString() {
        return 'I am an exception.' . $this->details;
    }
}