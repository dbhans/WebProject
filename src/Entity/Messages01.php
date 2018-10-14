<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table(name="messages")
 * @ORM\Entity(repositoryClass="App\Repository\Messages01Repository")
 */
class Messages01
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
     * @var int
     *
     * @ORM\Column(name="employeeid", type="integer", nullable=true)
     */
    private $employeeid;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * @var int
     *
     * @ORM\Column(name="readed", type="integer", nullable=true)
     */
    private $readed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date", nullable=true)
     */
    private $created;

    /**
     * @var int
     *
     * @ORM\Column(name="clientid", type="integer", nullable=true)
     */
    private $clientid;

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
     * @return Messages
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
     * @return Messages
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
     * Set employeeid
     *
     * @param integer $employeeid
     *
     * @return Messages
     */
    public function setEmployeeid($employeeid)
    {
        $this->employeeid = $employeeid;

        return $this;
    }

    /**
     * Get employeeid
     *
     * @return int
     */
    public function getEmployeeid()
    {
        return $this->employeeid;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Messages
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set readed
     *
     * @param integer $readed
     *
     * @return Messages
     */
    public function setReaded($readed)
    {
        $this->readed = $readed;

        return $this;
    }

    /**
     * Get readed
     *
     * @return int
     */
    public function getReaded()
    {
        return $this->readed;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Messages
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

    /**
     * Set clientid
     *
     * @param integer $clientid
     *
     * @return Messages
     */
    public function setClientid($clientid)
    {
        $this->clientid = $clientid;

        return $this;
    }

    /**
     * Get clientid
     *
     * @return int
     */
    public function getClientid()
    {
        return $this->clientid;
    }
}

