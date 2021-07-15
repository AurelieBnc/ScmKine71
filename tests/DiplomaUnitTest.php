<?php

namespace App\Tests;

use App\Entity\Diploma;
use App\Entity\Obtention;
use PHPUnit\Framework\TestCase;

class DiplomaUnitTest extends TestCase
{
    public function testIsTrue():void
    {
        $diploma = new Diploma();

        $diploma->setTitle('titre')
            ->setLocation('Lieu d\'obtention');

        self::assertSame($diploma->getTitle(), 'titre');
        self::assertSame($diploma->getLocation(), 'Lieu d\'obtention');

    }

    public function testIsFalse():void
    {
        $diploma = new Diploma();

        $diploma->setTitle('titre')
            ->setLocation('contenu');

        $this->assertFalse($diploma->getTitle() === 'false');
        $this->assertFalse($diploma->getLocation() === 'false');

    }

    public function testIsEmpty():void
    {
        $diploma =new Diploma;

        self::assertEmpty($diploma->getTitle() );
        self::assertEmpty($diploma->getLocation() );

    }
}
