<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    public function __construct()
    {
        $this->jobs = new ArrayCollection();
        $this->affiliates = new ArrayCollection();
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=63)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job",mappedBy="category")
     */
    private $jobs;

    /**
     * @ORM\ManyToMany(targetEntity="Affiliate",inversedBy="categories")
     */
    private $affiliates;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getJobs(): ArrayCollection
    {
        return $this->jobs;
    }

    /**
     * @param ArrayCollection $jobs
     */
    public function setJobs(ArrayCollection $jobs): void
    {
        $this->jobs = $jobs;
    }

    /**
     * @return ArrayCollection
     */
    public function getAffiliates(): ArrayCollection
    {
        return $this->affiliates;
    }

    /**
     * @param ArrayCollection $affiliates
     */
    public function setAffiliates(ArrayCollection $affiliates): void
    {
        $this->affiliates = $affiliates;
    }
}
