<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="App\Repository\Products01Repository")
 */
class Products01
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
     * @ORM\Column(name="productname", type="string", length=255, nullable=true)
     */
    private $productname;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionname", type="text", nullable=true)
     */
    private $descriptionname;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var int
     *
     * @ORM\Column(name="sell", type="integer", nullable=true)
     */
    private $sell;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=true)
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="discount", type="integer", nullable=true)
     */
    private $discount;

    /**
     * @var int
     *
     * @ORM\Column(name="employeeid", type="integer", nullable=true)
     */
    private $employeeid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="productdate", type="datetime", nullable=true)
     */
    private $productdate;

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
     * @return Products
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
     * @return Products
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
     * Set productname
     *
     * @param string $productname
     *
     * @return Products
     */
    public function setProductName($productname)
    {
        $this->productname = $productname;

        return $this;
    }

    /**
     * Get productname
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productname;
    }

    /**
     * Set descriptionname
     *
     * @param integer $descriptionname
     *
     * @return Products
     */
    public function setDescriptionName($descriptionname)
    {
        $this->descriptionname = $descriptionname;

        return $this;
    }

    /**
     * Get descriptionname
     *
     * @return int
     */
    public function getDescriptionName()
    {
        return $this->descriptionname;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Products
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
     * Set sell
     *
     * @param integer $sell
     *
     * @return Products
     */
    public function setSell($sell)
    {
        $this->sell = $sell;

        return $this;
    }

    /**
     * Get sell
     *
     * @return int
     */
    public function getSell()
    {
        return $this->sell;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Products
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Products
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set discount
     *
     * @param integer $discount
     *
     * @return Products
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set employeeid
     *
     * @param integer $employeeid
     *
     * @return Products
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
     * Set productdate
     *
     * @param \DateTime $productdate
     *
     * @return Products
     */
    public function setProductdate($productdate)
    {
        $this->date = $productdate;

        return $this;
    }

    /**
     * Get productdate
     *
     * @return \DateTime
     */
    public function getProductdate()
    {
        return $this->productdate;
    }
}

