<?php

namespace Erlem\JobeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Erlem\JobeetBundle\Utils\Jobeet;

/**
 * Category
 */
class Category {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $affiliates;

    /**
     *
     * @var \Doctrine\Common\Collections\Collection
     */
    private $more_jobs;

    /**
     * Constructor
     */
    public function __construct() {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->affiliates = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Add jobs
     *
     * @param \Erlem\JobeetBundle\Entity\Job $jobs
     * @return Category
     */
    public function addJob(\Erlem\JobeetBundle\Entity\Job $jobs) {
        $this->jobs[] = $jobs;

        return $this;
    }

    /**
     * Remove jobs
     *
     * @param \Erlem\JobeetBundle\Entity\Job $jobs
     */
    public function removeJob(\Erlem\JobeetBundle\Entity\Job $jobs) {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs() {
        return $this->jobs;
    }

    /**
     * Add affiliates
     *
     * @param \Erlem\JobeetBundle\Entity\Affiliate $affiliates
     * @return Category
     */
    public function addAffiliate(\Erlem\JobeetBundle\Entity\Affiliate $affiliates) {
        $this->affiliates[] = $affiliates;

        return $this;
    }

    /**
     * Remove affiliates
     *
     * @param \Erlem\JobeetBundle\Entity\Affiliate $affiliates
     */
    public function removeAffiliate(\Erlem\JobeetBundle\Entity\Affiliate $affiliates) {
        $this->affiliates->removeElement($affiliates);
    }

    /**
     * Get affiliates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAffiliates() {
        return $this->affiliates;
    }

    public function __toString() {
        return $this->getName();
    }

    public function getSlug() {
        return Jobeet::slugify($this->getName());
    }

    public function setMoreJobs($jobs) {
        $this->more_jobs = $jobs >= 0 ? $jobs : 0;
    }

    public function getMoreJobs() {
        return $this->more_jobs;
    }

}
