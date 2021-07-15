<?php

namespace App\Tests;

use App\Entity\Diploma;
use App\Entity\Obtention;
use App\Entity\Practitioner;
use DateTime;
use PHPUnit\Framework\TestCase;

class ObtentionUnitTest extends TestCase
{
    public function testIsTrue():void
    {
        $obtention = new Obtention();
        $datetime = new DateTime();
        $practitioner = new Practitioner();
        $diploma = new Diploma();

        $obtention
            ->setDateObtained($datetime)
            ->setPractitioner($practitioner)
            ->setDiploma($diploma);

        self::assertSame($obtention->getDateObtained(), $datetime);
        self::assertSame($obtention->getPractitioner(), $practitioner);
        self::assertSame($obtention->getDiploma(), $diploma);
    }

    public function testIsFalse():void
    {
        $obtention = new Obtention();
        $datetime = new DateTime();
        $practitioner = new Practitioner();
        $diploma = new Diploma();

        $obtention
            ->setDateObtained($datetime)
            ->setPractitioner($practitioner)
            ->setDiploma($diploma);

        $this->assertFalse($obtention->getDateObtained() === new DateTime());
        $this->assertFalse($obtention->getPractitioner() === new Practitioner());
        $this->assertFalse($obtention->getDiploma() === new Diploma());
    }

    public function testIsEmpty():void
    {
        $obtention =new Obtention;

        self::assertEmpty($obtention->getDateObtained() );
        self::assertEmpty($obtention->getPractitioner() );
        self::assertEmpty($obtention->getDiploma() );
    }
}
