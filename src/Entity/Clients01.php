<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clients
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity(repositoryClass="App\Repository\Clients01Repository")
 */
class Clients01
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
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=25, nullable=true)
     */
    private $sex;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="compagnyid", type="integer", nullable=true)
     */
    private $compagnyid;
    
    /**
     * @var int
     *
     * @ORM\Column(name="employeeid", type="integer", nullable=true)
     */
    private $employeeid;
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
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;
    /**
     * Set modifybyid
     *
     * @param string $modifybyid
     *
     * @return Clients
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Clients
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Clients
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return Clients
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Clients
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Clients
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
 /**
     * Set compagnyid
     *
     * @param integer $compagnyid
     *
     * @return Clients
     */
    public function setCompagnyid($compagnyid)
    {
        $this->compagnyid = $compagnyid;

        return $this;
    }

    /**
     * Get compagnyid
     *
     * @return int
     */
    public function getCompagnyid()
    {
        return $this->compagnyid;
    }
     /**
     * Set employeeid
     *
     * @param integer $employeeid
     *
     * @return Clients
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
     * @return Clients
     */
    public function setCreatedbyid($createdbyid)
    {
        $this->createdbyid = $createdbyid;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Clients
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
    
    
    
}
