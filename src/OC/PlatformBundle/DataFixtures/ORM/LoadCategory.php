<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Category;

class LoadCategory extends Fixture implements FixtureInterface 
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // On crée la catégorie
      $web = new Category();
      $web->setName("Développement web");
      // on la défini pour qu'elle soit disponible dans d'autre fixitures
      $this->addReference('web', $web);

      $mobile = new Category();
      $mobile->setName("Développement mobile");
      $this->addReference('mobile', $mobile);

      $Reseau = new Category();
      $Reseau->setName("Réseau");
      $this->addReference('Reseau', $Reseau);

      $Integration = new Category();
      $Integration->setName("Intégration");
      $this->addReference('Integration', $Integration);

      $Graphisme = new Category();
      $Graphisme->setName("Graphisme");
      $this->addReference('Graphisme', $Graphisme);
      
      // On les persiste
      $manager->persist($web);
      $manager->persist($mobile);
      $manager->persist($Reseau);
      $manager->persist($Integration);
      $manager->persist($Graphisme);


    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}
