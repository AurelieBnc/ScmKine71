<?php

namespace App\Tests;

use App\Entity\Practitioner;
use PHPUnit\Framework\TestCase;

class PractitionerUnitTest extends TestCase
{
    public function testIsTrue():void
    {
        $practitioner = new Practitioner();

        $practitioner->setLastname('nom')
            ->setFirstname('prénom')
            ->setImage('image');


        self::assertSame($practitioner->getLastname(), 'nom');
        self::assertSame($practitioner->getFirstname(), 'prénom');
        self::assertSame($practitioner->getImage(), 'image');
    }

    public function testIsFalse():void
    {
        $practitioner = new Practitioner();

        $practitioner->setLastname('nom')
            ->setFirstname('prenom')
            ->setImage('image');

        $this->assertFalse($practitioner->getLastname() === 'false');
        $this->assertFalse($practitioner->getFirstname() === 'false');
        $this->assertFalse($practitioner->getImage() === 'false');
    }

    public function testIsEmpty():void
    {
        $practitioner =new Practitioner;

        self::assertEmpty($practitioner->getLastname() );
        self::assertEmpty($practitioner->getFirstname() );
        self::assertEmpty($practitioner->getImage() );
    }
}
