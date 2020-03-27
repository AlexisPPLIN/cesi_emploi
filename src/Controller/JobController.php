<?php

namespace App\Controller;

use App\Entity\Job;
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
        $jobs = $em->getRepository(Job::class)->findAll();
        return $this->render('job/index.html.twig', [
            'controller_name' => 'JobController',
            'ListJobs' => $jobs
        ]);
    }

    /**
     * @Route("/job/{id}",name="job_show",requirements={"id"="\d+"})
     */
    public function show(EntityManagerInterface $em,int $id){
        $job = $em->getRepository(Job::class)->find($id);
        if(null === $job){
            throw new NotFoundHttpException();
        }

        return $this->render('job/show.html.twig',[
           'job' => $job,
        ]);
    }
}
