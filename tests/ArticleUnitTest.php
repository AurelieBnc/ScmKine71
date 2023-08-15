<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\Category;
use PHPUnit\Framework\TestCase;
use DateTime;

class ArticleUnitTest extends TestCase
{

    public function testIsTrue():void
    {
        $article = new Article();
        $datetime = new DateTime();
        $category = new Category();

        $article->setTitle('titre')
            ->setContent('contenu')
            ->setPublicationDate($datetime)
            ->setCategory($category);

        self::assertSame($article->getTitle(), 'titre');
        self::assertSame($article->getContent(), 'contenu');
        self::assertSame($article->getPublicationDate(), $datetime);
        self::assertSame($article->getCategory(), $category);
    }

    public function testIsFalse():void
    {
        $article = new Article();
        $datetime = new DateTime();
        $category = new Category();

        $article->setTitle('titre')
            ->setContent('contenu')
            ->setPublicationDate($datetime)
            ->setCategory($category);

        $this->assertFalse($article->getTitle() === 'false');
        $this->assertFalse($article->getContent() === 'false');
        $this->assertFalse($article->getPublicationDate() === new DateTime());
        $this->assertFalse($article->getCategory() === new Category());
    }

    public function testIsEmpty():void
    {
        $article =new Article;

        self::assertEmpty($article->getTitle() );
        self::assertEmpty($article->getContent() );
        self::assertEmpty($article->getPublicationDate() );
        self::assertEmpty($article->getCategory() );
    }


}
