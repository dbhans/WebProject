<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * meeting
 *
 * @ORM\Table(name="meeting")
 * @ORM\Entity(repositoryClass="App\Repository\meeting02Repository")
 */
class meeting02
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
     * @ORM\Column(name="clientid", type="integer", nullable=true)
     */
    private $clientid;

    /**
     * @var string
     *
     * @ORM\Column(name="clientname", type="string", nullable=true)
     */
    private $clientname;

    /**
     * @var int
     *
     * @ORM\Column(name="employeeid", type="integer", nullable=true)
     */
    private $employeeid;

    /**
     * @var int
     *
     * @ORM\Column(name="documentid", type="integer", nullable=true)
     */
    private $documentid;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=25, nullable=true)
     */
    private $status;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $datem;

    /**
     * @var string
     *
     * @ORM\Column(name="information", type="text", nullable=true)
     */
    private $information;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\Column(name="time", type="integer", nullable=true)
     */
    private $time;
    
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
     * @return meeting
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
     * @return meeting
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
     * Set clientid
     *
     * @param integer $clientid
     *
     * @return meeting
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

    /**
     * Set employeeid
     *
     * @param string $employeeid
     *
     * @return meeting
     */
    public function setEmployeeid($employeeid)
    {
        $this->employeeid = $employeeid;

        return $this;
    }

    /**
     * Get employeeid
     *
     * @return string
     */
    public function getEmployeeid()
    {
        return $this->employeeid;
    }

    /**
     * Set documentid
     *
     * @param integer $documentid
     *
     * @return meeting
     */
    public function setDocumentid($documentid)
    {
        $this->documentid = $documentid;

        return $this;
    }

    /**
     * Get documentid
     *
     * @return int
     */
    public function getDocumentid()
    {
        return $this->documentid;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return meeting
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set datem
     *
     * @param \DateTime $datem
     *
     * @return meeting
     */
    public function setDatem($datem)
    {
        $this->datem = $datem;

        return $this;
    }

    /**
     * Get datem
     *
     * @return \DateTime
     */
    public function getDatem()
    {
        return $this->datem;
    }

    /**
     * Set information
     *
     * @param string $information
     *
     * @return meeting
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return meeting
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return meeting
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
     * Set time
     *
     * @param integer $time
     *
     * @return meeting
     */
    public function settime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return int
     */
    public function gettime()
    {
        return $this->time;
    }

    

    /**
     * Get the value of clientname
     *
     * @return  string
     */ 
    public function getClientname()
    {
        return $this->clientname;
    }

    /**
     * Set the value of clientname
     *
     * @param  string  $clientname
     *
     * @return  self
     */ 
    public function setClientname(string $clientname)
    {
        $this->clientname = $clientname;

        return $this;
    }
}
