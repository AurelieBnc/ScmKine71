<?php

namespace App\Tests;

use App\Entity\Service;
use PHPUnit\Framework\TestCase;

class ServiceUnitTest extends TestCase
{
    public function testIsTrue():void
    {
        $service = new Service();

        $service->setTitle('Nom de l\'acte')
            ->setAmCode('AMcode')
            ->setOvertaking(1);


        self::assertSame($service->getTitle(), 'Nom de l\'acte');
        self::assertSame($service->getAmCode(), 'AMcode');
        self::assertSame($service->getOvertaking(), 1);
    }

    public function testIsFalse():void
    {
        $service = new Service();

        $service->setTitle('Nom de l\'acte')
            ->setAmCode('AMcode')
            ->setOvertaking(1);

        $this->assertFalse($service->getTitle() === 'false');
        $this->assertFalse($service->getAmCode() === 'false');
        $this->assertFalse($service->getOvertaking() === 'false');
    }

    public function testIsEmpty():void
    {
        $service =new Service;

        self::assertEmpty($service->getTitle() );
        self::assertEmpty($service->getAmCode() );
        self::assertEmpty($service->getOvertaking() );
    }
}
