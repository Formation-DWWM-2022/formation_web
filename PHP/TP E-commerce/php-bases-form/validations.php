<?php

function validate_name(string $name): bool {
    // if(!empty($name) && strlen($name) > 3) {
    //     return true;
    // } else {
    //     return false;
    // }

    // return !empty($name) && strlen($name) > 3 ? true : false;

    return !empty($name) && strlen($name) > 3;
}

function validate_desc(string $desc): bool {
    return !empty($desc) && strlen($desc) > 15;
}

function validate_price(int $price): bool {
    return !empty($price) && $price > 0;
}