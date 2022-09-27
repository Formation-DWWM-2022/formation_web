<?php

namespace App\Helpers;

use cebe\markdown\Markdown;

class MarkdownHelper
{
    private $parser;

    public function __construct(markdown $parser)
    {
        $this->parser = $parser;
    }

    public function formatNumber(float $number): string
    {
        return number_format(($number/100),2,'.',',');
    }

    public function makeReference(): string
    {
        $date = new \DateTimeImmutable();
        return $date->format('dmY').'-'.uniqid();
    }

}
