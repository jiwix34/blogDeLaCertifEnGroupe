<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(name="name", type="string",nullable=true, length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=255)
     */
    private $pass;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", length=255)
     */
    private $roles;
    
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string",nullable=true, length=255)
     */
    private $image;

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
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * Set pass
     *
     * @param string $pass
     *
     * @return User
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set roles
     *
     * @param string $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return string
     */
    public function getRoles()
    {
        return $this->roles;
    }
    
    /**
     * Get image
     *
     * @return image
     */
    function getImage() {
        return $this->image;
    }

    
    /**
     * Set roles
     *
     * @param string $image
     *
     * @return image
     */
    function setImage($image) {
        
        $this->image = $image;
        
        return $this;
    }

    public function serialize() {
        return serialize(array(
            $this->id,
            $this->email,
            $this->pass
        ));
       
    }

    public function unserialize($serialized) {
        list(
            $this->id,
            $this->email,
            $this->pass,
            ) = unserialize($serialized);
        
    }

    public function eraseCredentials() {
        
    }

    public function getPassword() {
        return $this->pass;
    }

    public function getSalt() {
        
    }

    public function getUsername() {
        return $this->email;
    }

}

