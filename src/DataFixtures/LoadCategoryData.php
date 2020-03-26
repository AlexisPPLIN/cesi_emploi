<?php


namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadCategoryData extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $design = new Category();
        $design->setName('Design');
        $manager->persist($design);

        $programming = new Category();
        $programming->setName('Programming');
        $manager->persist($programming);

        $managing = new Category();
        $managing->setName('Manager');
        $manager->persist($managing);

        $administrator = new Category();
        $administrator->setName('Administrator');
        $manager->persist($administrator);

        $manager->flush();
    }
}