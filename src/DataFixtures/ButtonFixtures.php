<?php

namespace App\DataFixtures;

use App\Entity\Button;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ButtonFixtures.
 */
class ButtonFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        // create 100 buttons! Bam!
        for ($i = 0; $i < 10000; $i++) {
            $element = new Button();
            $element->setName('Button '.($i + 1));

            $element->setCustomer(
                $this->getReference(CustomerFixtures::FIXTURE_REFERENCE. ($i % 20))
            );

            $element->setProduct(
                $this->getReference(ProductFixtures::FIXTURE_REFERENCE. ($i % 20))
            );

            $manager->persist($element);
        }

        $manager->flush();
    }

    /**
     * @inheritdoc
     */
    public function getDependencies()
    {
        return [
            CustomerFixtures::class,
            ProductFixtures::class
        ];
    }
}
