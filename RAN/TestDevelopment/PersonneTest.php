<?php
namespace exo1;
use PHPUnit\Framework\TestCase;
require_once('src/Personne.php');

class PersonneTest extends TestCase {
protected $pers;

    /**
     * @before
     */
    public function setupSomeFixtures()
    {
        $this->pers= new Personne('toto');
    }

public function testirradier()
    {
        $this->pers->irradier();
	$this->assertEquals(3,$this->pers->pieds);
	
    }

 }
