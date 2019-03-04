<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class CustomerFixtures.
 */
class CustomerFixtures extends Fixture implements DependentFixtureInterface
{
    public const FIXTURE_REFERENCE = 'customer-';

    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        // create 20 customers! Bam!
        for ($i = 0; $i < 20; $i++) {
            $element = new Customer();
            $element->setName('Customer '.($i + 1));
            $element->setExternalSale(
                $this->getReference(ExternalSaleFixtures::FIXTURE_REFERENCE. ($i % 4))
            );
            $manager->persist($element);

            // other fixtures can get this object
            $this->addReference(self::FIXTURE_REFERENCE . $i, $element);
        }

        $manager->flush();
    }

    /**
     * @inheritdoc
     */
    public function getDependencies()
    {
        return [
            ExternalSaleFixtures::class,
        ];
    }
}
