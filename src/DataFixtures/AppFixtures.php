<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 10; $i++) {
            $product = new Property();
            $product->setTitle('Logement '.$i);
            $product->setDescription('Ceci est une description generer par les fixtures');
            $product->setSurface(mt_rand(20, 80));
            $product->setRooms(mt_rand(2, 5));
            $product->setBedrooms(mt_rand(1, 3));
            $product->setFloor(mt_rand(1, 3));
            $product->setPrice(mt_rand(100000, 300000));
            $product->setHeat(mt_rand(0, 1));
            $product->setCity('Ville Random...');
            $product->setAddress('Adresse Random');
            $product->setPostalCode('42800');
            $product->setSold(false);

            $manager->persist($product);
        }

        $manager->flush();
    }
}
