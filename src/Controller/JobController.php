<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Job;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    /**
     * @Route("/job", name="job")
     */
    public function index(EntityManagerInterface $em)
    {
        $categories=$em->getRepository(Category::class)->findCategoriesWithJobs();
        $jobsCategories =[];
        foreach ($categories as $category){
            $jobsCategories[$category->getName()] = $em->getRepository(Job::class)->findActiveByCategory($category);
        }

        return $this->render('job/index.html.twig', [
            'controller_name' => 'JobController',
            'categories' => $jobsCategories,
        ]);
    }

    /**
     * @Route("/job/{company}/{id}/{position}",name="job_show",requirements={
     *     "id"="\d+",
     *     "company" = "[A-Za-z0-9\-]+",
     *     "position" = "[A-Za-z0-9\-]+"
     * })
     */
    public function show(EntityManagerInterface $em,int $id,string $company,string $position){
        $job = $em->getRepository(Job::class)->find($id);
        if(null === $job){
            throw new NotFoundHttpException();
        }

        $currentDate = new DateTime();
        if($job->getExpiresAt() < $currentDate){
            throw new NotFoundHttpException();
        }

        return $this->render('job/show.html.twig',[
           'job' => $job,
        ]);
    }
}
