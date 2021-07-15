<?php

namespace App\Tests;

use App\Entity\Equipement;
use PHPUnit\Framework\TestCase;

class EquipementUnitTest extends TestCase
{
    public function testIsTrue():void
    {
        $equipement = new Equipement();

        $equipement->setName('nom')
            ->setDescribeEquipement('description')
            ->setImage('image');


        self::assertSame($equipement->getName(), 'nom');
        self::assertSame($equipement->getDescribeEquipement(), 'description');
        self::assertSame($equipement->getImage(), 'image');
    }

    public function testIsFalse():void
    {
        $equipement = new Equipement();

        $equipement->setName('nom')
            ->setDescribeEquipement('description')
            ->setImage('image');

        $this->assertFalse($equipement->getName() === 'false');
        $this->assertFalse($equipement->getDescribeEquipement() === 'false');
        $this->assertFalse($equipement->getImage() === 'false');
    }

    public function testIsEmpty():void
    {
        $equipement =new Equipement;

        self::assertEmpty($equipement->getName() );
        self::assertEmpty($equipement->getDescribeEquipement() );
        self::assertEmpty($equipement->getImage() );
    }
}
