<?php

namespace App\Tests;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testIsTrue():void
    {
        $category = new Category();

        $category->setTitle('titre');

        self::assertSame($category->getTitle(), 'titre');

    }

    public function testIsFalse():void
    {
        $category = new Category();

        $category->setTitle('titre');

        $this->assertFalse($category->getTitle() === 'false');


    }

    public function testIsEmpty():void
    {
        $category = new Category;

        self::assertEmpty($category->getTitle() );

    }
}
