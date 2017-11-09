<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadImage.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Image;

class LoadImage extends Fixture implements FixtureInterface 
{
  public function load(ObjectManager $manager)
  {
    
    $image1 = new Image();
    $image1 -> setUrl("http://jactiv.ouest-france.fr/sites/default/files/imagecache/article-detail/images/2017/03/31/5618879877_f8b482a1a4_z.jpg");
    $image1 -> setAlt("ile");

    $image2 = new Image();
    $image2 -> setUrl("http://ohmyluxe.com/wp-content/uploads/2017/05/decrocher-un-job-de-reve-ca-vous-dit-660x400.jpg");
    $image2 -> setAlt("chaise longue");

    $image3 = new Image();
    $image3 -> setUrl("https://www.blog-emploi.com/wp-content/uploads/2011/11/robinson31.jpg");
    $image3 -> setAlt("piscine");

     // other fixtures can get this object using the 'admin-user' name
        $this->addReference('image1', $image1);
        $this->addReference('image2', $image2);
        $this->addReference('image3', $image3);

      // On la persiste
      $manager->persist($image1);
      $manager->persist($image2);
      $manager->persist($image3);

    // On déclenche l'enregistrement 
    $manager->flush();
  }
}
