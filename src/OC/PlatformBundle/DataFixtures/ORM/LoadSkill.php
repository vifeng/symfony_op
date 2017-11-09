<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadSkill.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Skill;

class LoadSkill extends Fixture implements FixtureInterface 
{
  public function load(ObjectManager $manager)
  {
      // On crée la compétence
      $PHP = new Skill();
      $PHP->setName("PHP");
      // on la défini pour qu'elle soit disponible dans d'autre fixitures
      $this->addReference('PHP', $PHP);

      $Symfony = new Skill();
      $Symfony->setName("Symfony");
      $this->addReference('Symfony', $Symfony);

      $C = new Skill();
      $C->setName("C++");
      $this->addReference('C', $C);

      $Java = new Skill();
      $Java->setName("Java");
      $this->addReference('Java', $Java);

      $Blender = new Skill();
      $Blender->setName("Blender");
      $this->addReference('Blender', $Blender);
      
      // On les persiste
      $manager->persist($PHP);
      $manager->persist($Symfony);
      $manager->persist($C);
      $manager->persist($Java);
      $manager->persist($Blender);


    // On déclenche l'enregistrement de toutes les compétences
    $manager->flush();
  }
}
