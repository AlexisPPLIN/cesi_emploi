<?php


namespace App\DataFixtures;


use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadJobData extends Fixture
{

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $categoryProgramming = $this->getReference('category-programming');
        $categoryDesign = $this->getReference('category-design');

        $jobSensioLabs = new Job();
        $jobSensioLabs->setCategory($categoryProgramming);
        $jobSensioLabs->setType('full-time');
        $jobSensioLabs->setCompany('Apple');
        $jobSensioLabs->setLogo('apple.png');
        $jobSensioLabs->setUrl("http://www.apple.com/");
        $jobSensioLabs->setPosition("Web Developer");
        $jobSensioLabs->setLocation("Paris, France");
        $jobSensioLabs->setDescription("Vous avez déja développé des sites Web avec symfony et vous souhaitez utiliser les technologies Open-Source. Vous avez au minimum 3 ans d'expérience dans le développement Web avec PHP ou Java et vous souhaitez participer au développement de sites Web 2.0 en utilisant les meilleurs frameworks disponibles.");
        $jobSensioLabs->setHowToApply("Envoyez votre CV à l'adresse suivante : contact@apple.com");
        $jobSensioLabs->setIsPublic(true);
        $jobSensioLabs->setIsActivated(true);
        $jobSensioLabs->setToken('job_apple');
        $jobSensioLabs->setEmail('job@example.com');
        $jobSensioLabs->setExpiresAt(new \DateTime('2020-10-10'));
        $manager->persist($jobSensioLabs);

        $manager->flush();
    }
}