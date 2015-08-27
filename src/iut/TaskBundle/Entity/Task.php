<?php

namespace iut\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Task
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iut\TaskBundle\Entity\TaskRepository")
 */
class Task
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=80)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="check", type="boolean")
     */
    private $check;

    /**
    * @ORM\ManyToOne(targetEntity="ListTask", inversedBy="tasks")
    * @ORM\JoinColumn(name="list_id", referencedColumnName="id")
    */
    private $listTask;

    public function __construct()
    {
        $listTask = new ArrayCollection();
    }

    /**
     * Set id
     * @param string $id
     * @return List
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Task
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Task
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set listTask
     *
     * @param ListTask $listTask
     * @return Task
     */
    public function setListTask($listTask)
    {
        $this->listTask = $listTask;

        return $this;
    }

    /**
     * Get ListTask
     *
     * @return ListTask 
     */
    public function getListTask()
    {
        return $this->listTask;
    }

    /**
     * Set check
     *
     * @param string $check
     * @return Check
     */
    public function setCheck($check)
    {
        $this->check = $check;

        return $this;
    }

    /**
     * Get Check
     *
     * @return Check 
     */
    public function getCheck()
    {
        return $this->check;
    }
}
