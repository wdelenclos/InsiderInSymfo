<?php

namespace App\DataFixtures;

use App\Entity\Bug;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BugFixtures extends Fixture
{
	public function load(ObjectManager $manager)
	{
		// $product = new Product();
		// $manager->persist($product);
		$faker = \Faker\Factory::create();

		for($i = 0; $i < 10; $i ++){
			$bug = (new Bug())->setTitle($faker->words)->setDescription($faker->sentence(4));
			$manager->persist($bug);
		}
		$manager->flush();
	}
}
