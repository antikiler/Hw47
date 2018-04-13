<?php

namespace AppBundle\Entity;

use AppBundle\Lib\Enumeration\Active;
use AppBundle\Lib\Enumeration\City;
use AppBundle\Lib\Enumeration\Gender;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity(
 *     fields={"email"},
 *     message="Такаой Email уже занят."
 * )
 */
class User
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
     * @ORM\Column(name="name", type="string", length=128)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = 128,
     *      maxMessage = "Имя не может быть длиннее {{ limit }} символов"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=128)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = 128,
     *      maxMessage = "Фамилия не может быть длиннее {{ limit }} символов"
     * )
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/.+@.+\..+/",
     *     message="Ваш email не корректный"
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 6,
     *      max = 128,
     *      minMessage = "Пароль должно быть не менее {{ limit }} символов",
     *      maxMessage = "Пароль не может быть длиннее {{ limit }} символов"
     * )
     * @Assert\Regex(
     *     pattern="/([0-9])/",
     *     message="Пароль не содержит цифры"
     * )
     * @Assert\Regex(
     *     pattern="/([a-zA-Zа-яА-я])/",
     *     message="Пароль не содержит буквы"
     * )
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=2048, nullable=true)
     * @Assert\Regex(
     *     pattern="/([\<\/\>])/",
     *     match=false,
     *     message="Описание содержит заперещенные символы"
     * )
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="sex", type="boolean")
     * @Assert\NotBlank()
     */
    private $sex;

    /**
     * @var int
     *
     * @ORM\Column(name="city", type="integer")
     * @Assert\NotBlank()
     */
    private $city;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     * @Assert\NotBlank()
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="url_web_site", type="string", length=255)
     * @Assert\Url(
     *    message = "URL странички '{{ value }}' не является действительным URL-адресом",
     * )
     */
    private $urlWebSite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_birth", type="date")
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $DateBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string",length=100)
     * @Assert\NotBlank()
     * @Assert\File(
     *   maxSize = "200k",
     *   mimeTypes = { "image/gif", "image/jpg", "image/jpeg", "image/png" },
     *   mimeTypesMessage = "Недопустимый тип данных ({{ type }}). Допустимы: {{ types }}."
     * )
     */
    private $avatar;



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
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
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
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
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
     * Set sex
     *
     * @param boolean $sex
     *
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return bool
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set city
     *
     * @param integer $city
     *
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return int
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function getPrintTableSex()
    {
        return Gender::getALL()[$this->sex];
    }

    /**
     * @return string
     */
    public function getPrintTableCity()
    {
        return City::getALL()[$this->city];
    }

    /**
     * @return string
     */
    public function getPrintTableActive()
    {
        return Active::getALL()[$this->active];
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return User
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
     * Set urlWebSite
     *
     * @param string $urlWebSite
     *
     * @return User
     */
    public function setUrlWebSite($urlWebSite)
    {
        $this->urlWebSite = $urlWebSite;

        return $this;
    }

    /**
     * Get urlWebSite
     *
     * @return string
     */
    public function getUrlWebSite()
    {
        return $this->urlWebSite;
    }

    /**
     * Set dateBirth
     *
     * @param \DateTime $dateBirth
     *
     * @return User
     */
    public function setDateBirth($dateBirth)
    {
        $this->DateBirth = $dateBirth;

        return $this;
    }

    /**
     * Get dateBirth
     *
     * @return \DateTime
     */
    public function getDateBirth()
    {
        return $this->DateBirth;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}
