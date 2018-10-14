<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoices
 *
 * @ORM\Table(name="invoices")
 * @ORM\Entity(repositoryClass="App\Repository\Invoices02Repository")
 */
class Invoices02
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
     * @var int
     *
     * @ORM\Column(name="employeeid", type="integer", nullable=true)
     */
    private $employeeid;

    /**
     * @var int
     *
     * @ORM\Column(name="productid", type="integer", nullable=true)
     */
    private $productid;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="selldate", type="datetime", nullable=true)
     */
    private $selldate;

    /**
     * @var string
     *
     * @ORM\Column(name="discount", type="decimal", precision=4, scale=0, nullable=true)
     */
    private $discount;

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
     * @return Invoices
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
     * @return Invoices
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
     * @return Invoices
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
     * @param integer $employeeid
     *
     * @return Invoices
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
     * Set productid
     *
     * @param integer $productid
     *
     * @return Invoices
     */
    public function setProductid($productid)
    {
        $this->productid = $productid;

        return $this;
    }

    /**
     * Get productid
     *
     * @return int
     */
    public function getProductid()
    {
        return $this->productid;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Invoices
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set selldate
     *
     * @param \DateTime $selldate
     *
     * @return Invoices
     */
    public function setSelldate($selldate)
    {
        $this->selldate = $selldate;

        return $this;
    }

    /**
     * Get selldate
     *
     * @return \DateTime
     */
    public function getSelldate()
    {
        return $this->selldate;
    }

    /**
     * Set discount
     *
     * @param string $discount
     *
     * @return Invoices
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}

