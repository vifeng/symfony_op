<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadApplication.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Application;


class LoadApplication extends Fixture implements FixtureInterface 
{
  public function load(ObjectManager $manager)
  {
    $appli1 = new Application();
    $appli1 -> setAuthor("Marie");
    $appli1 -> setContent("je suis Dynamique");

    $appli2 = new Application();
    $appli2 -> setAuthor("Paul");
    $appli2 -> setContent("je suis motivé");

    $appli3 = new Application();
    $appli3 -> setAuthor("Arthur");
    $appli3 -> setContent("je suis excellent");

    // other fixtures can get this object using the 'admin-user' name
    $this->addReference("appli1", $appli1);
    $this->addReference("appli2", $appli2);
    $this->addReference("appli3", $appli3);

    $adv1 = $this->getReference('adv1');
    $adv1 -> addApplication($this->getReference('appli1'));
    $adv1 -> addApplication($this->getReference('appli2'));
    $adv1 -> addApplication($this->getReference('appli3'));

    // On la persiste
    $manager->persist($appli1);
    $manager->persist($appli2);
    $manager->persist($appli3);

    // On déclenche l'enregistrement de toutes les compétences
    $manager->flush();
  }

   public function getDependencies()
    {
        return array(
            LoadAdvert::class
        );
    }
}
