<?php

namespace App\DataFixtures;

use App\Entity\ExternalSale;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ExternalSaleFixtures.
 */
class ExternalSaleFixtures extends Fixture
{
    public const FIXTURE_REFERENCE = 'external_sale-';

    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        // create 4 external sales! Bam!
        for ($i = 0; $i < 4; $i++) {
            $element = new ExternalSale();
            $element->setName('ExternalSale '.($i + 1));
            $manager->persist($element);

            // other fixtures can get this object
            $this->addReference(self::FIXTURE_REFERENCE . $i, $element);
        }

        $manager->flush();
    }
}
