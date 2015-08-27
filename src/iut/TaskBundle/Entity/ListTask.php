<?php

namespace iut\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ListTask
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iut\TaskBundle\Entity\ListTaskRepository")
 */
class ListTask
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
    * @ORM\OneToMany(targetEntity="Task", mappedBy="listTask")
    */
    private $tasks;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
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
     * @return List
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
     * Set tasks
     *
     * @param ArrayCollection $tasks
     * @return List
     */
    public function setTasks(ArrayCollection $tasks)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get tasks
     *
     * @return ArrayCollection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    public function addTask(Task $task)
    {
        $this->tasks->add($task);
    }

    public function removeTask(Task $task)
    {
        $this->tasks->removeElement($task);
    }
}