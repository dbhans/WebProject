<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * employee_type
 *
 * @ORM\Table(name="employee_type")
 * @ORM\Entity(repositoryClass="App\Repository\employee_type01Repository")
 */
class employees_type01
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="typem", type="string", length=255, nullable=true)
     */
    private $typem;

    /**
     * @var string
     *
     * @ORM\Column(name="task", type="string", length=255, nullable=true)
     */
    private $task;

    /**
     * @var string
     *
     * @ORM\Column(name="taskdescription", type="text", nullable=true)
     */
    private $taskdescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var int
     *
     * @ORM\Column(name="createdbyid", type="integer", nullable=true)
     */
    private $createdbyid;
    
    /**
     * @var int
     *
     * @ORM\Column(name="modifybyid", type="integer", nullable=true)
     */
    private $modifybyid;
    
    /**
     * Set modifybyid
     *
     * @param string $modifybyid
     *
     * @return employees_type
     */
    public function setModifybyid($modifybyid)
    {
        $this->modifybyid = $modifybyid;

        return $this;
    }

    /**
     * Get modifybyid
     *
     * @return string
     */
    public function getModifybyid()
    {
        return $this->modifybyid;
    }
    
    /**
     * Get createdbyid
     *
     * @return int
     */
    public function getCreatedbyid()
    {
        return $this->createdbyid;
    }
    
    /**
     * Set createdbyid
     *
     * @param integer $createdbyid
     *
     * @return employees_type
     */
    public function setCreatedbyid($createdbyid)
    {
        $this->createdbyid = $createdbyid;

        return $this;
    }
    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set typem
     *
     * @param string $typem
     *
     * @return employees_type
     */
    public function setTypem($typem)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get typem
     *
     * @return string
     */
    public function getTypem()
    {
        return $this->typem;
    }

    /**
     * Set task
     *
     * @param string $task
     *
     * @return employees_type
     */
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return string
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set taskdescription
     *
     * @param string $taskdescription
     *
     * @return employees_type
     */
    public function setTaskDescription($taskdescription)
    {
        $this->taskdescription = $taskdescription;

        return $this;
    }

    /**
     * Get taskdescription
     *
     * @return string
     */
    public function getTaskDescription()
    {
        return $this->taskdescription;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return employees_type
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
}
