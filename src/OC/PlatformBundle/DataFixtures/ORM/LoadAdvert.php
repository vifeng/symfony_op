<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadAdvert.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Advert;
use OC\PlatformBundle\Entity\Image;
use OC\PlatformBundle\Entity\Application;
use OC\PlatformBundle\Entity\Category;

class LoadAdvert extends Fixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $adv1 = new Advert();
        $adv1 -> setTitle("Développer PHP Symfony");
        $adv1 -> setAuthor("Alice");
        $adv1 -> setContent("Une belle annonce pour appater les candidats. Une belle annonce pour appater les candidats. Une belle annonce pour appater les candidats. ");
        $adv1 -> setImage($this->getReference('image1'));

        $adv1 -> addCategory($this->getReference('mobile'));
        $adv1 -> addCategory($this->getReference('web'));


        $adv2 = new Advert();
        $adv2 -> setTitle("Développeur Java");
        $adv2 -> setAuthor("Jose");
        $adv2 -> setContent("Chez nous on on bosse super bien. Viens nous rejoindre ! ");
        $adv2 -> setImage($this->getReference('image2'));
        $adv2 -> addCategory($this->getReference('Graphisme'));
        $adv2 -> addCategory($this->getReference('Reseau'));


        $adv3 = new Advert();
        $adv3 -> setTitle("Développer JavaScript");
        $adv3 -> setAuthor("Charlotte");
        $adv3 -> setContent("We want you ! ");
        $adv3 -> setImage($this->getReference('image3'));

        $adv3 -> addCategory($this->getReference('mobile'));
        $adv3 -> addCategory($this->getReference('Integration'));

        // other fixtures can get this object using the 'admin-user' name
        $this->addReference("adv1", $adv1);
        $this->addReference("adv2", $adv2);
        $this->addReference("adv3", $adv3);

        // On la persiste
        $manager->persist($adv1);
        $manager->persist($adv2);
        $manager->persist($adv3);


        // On déclenche l'enregistrement
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            LoadImage::class,
        );
    }
}
