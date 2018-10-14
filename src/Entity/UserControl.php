<?php
// src/Entity/User.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints\Length;
//use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
//use Doctrine\DBAL\Schema\Constraint;


/**
 * User_control
 *
 * @ORM\Table(name="usercontrol")
 * @ORM\Entity
 * UniqueEntity(
 *     fields="username",
 *     message="This username is already in exist."
 * )  
 *@ORM\Entity(repositoryClass="App\Repository\AdressesRepository")
*/
class UserControl implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=false,nullable=true)
     *NotBlank()
     *Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, unique=false,nullable=true)
     *NotBlank()
     */
    private $username;

    /**
     *NotBlank()
     *Length(max=4096)
     */
    private $plainPassword;

    /**
     * The below length depends on the "algorithm" you use for encoding
     * the password, but this works well with bcrypt.
     *
     * @ORM\Column(type="string", length=64)
     */
    private $password;
    
    /**
     * @var array
     *
     * @ORM\Column(type="array", unique=false)
     */
    private $roles = [];
	
	/**
     * @var int
     *
     * @ORM\Column(name="employeeid", type="integer", nullable=true)
     */
    private $employeeid;
	
	/**
     * @var int
     *
     * @ORM\Column(name="clientid", type="integer", nullable=true)
     */
    private $clientid;

     /**
     * @var int
     *
     * @ORM\Column(name="active_user", type="integer", nullable=true)
     */
    private $active_user;
    
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
     * Set active_user
     *
     * @param string $active_user
     *
     * @return UserControl
     */
    public function setActive_user($active_user)
    {
        $this->active_user = $active_user;

        return $this;
    }

    /**
     * Get active_user
     *
     * @return string
     */
    public function getActive_user()
    {
        return $this->active_user;
    }
    
    // other properties and methods
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
     * Set email
     *
     * @param string $email
     *
     * @return UserControl
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * Set username
     *
     * @param string $username
     *
     * @return UserControl
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    /**
     * Get plainPassword
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
    /**
     * Set plainPassword
     *
     * @param string $plainPassword
     *
     * @return UserControl
     */
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }
    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Set password
     *
     * @param string $password
     *
     * @return UserControl
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    /**
     * Get salt
     *
     * @return null
     */
    public function getSalt()
    {
        // The bcrypt algorithm doesn't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }
    /**
     ** Get roles
     *
     * @return array
     * Returns the roles or permissions granted to the user for security.
     */
    public function getRoles()
    {
        $roles = $this->roles;

        // guarantees that a user always has at least one role for security
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }
    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return UserControl
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }


  
    /**
     * Removes sensitive data from the user.
     *
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
			$this->employeeid,
			$this->clientid,
			$this->roles,
            //$this->salt
            // see section on salt below
            
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
			$this->employeeid,
			$this->clientid,
			$this->roles,
            //$this->salt
            // see section on salt below
            
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }
     /**
     * Set employeeid
     *
     * @param integer $employeeid
     *
     * @return UserControl
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
     * Set clientid
     *
     * @param integer $clientid
     *
     * @return UserControl
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
    
    // other methods, including security methods like getRoles()
}