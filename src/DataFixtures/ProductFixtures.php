<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ProductFixtures.
 */
class ProductFixtures extends Fixture
{
    public const FIXTURE_REFERENCE = 'product-';

    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        // create 20 customers! Bam!
        for ($i = 0; $i < 20; $i++) {
            $element = new Product();
            $element->setName('Product '.($i + 1));
            $manager->persist($element);

            // other fixtures can get this object
            $this->addReference(self::FIXTURE_REFERENCE . $i, $element);
        }

        $manager->flush();
    }
}
