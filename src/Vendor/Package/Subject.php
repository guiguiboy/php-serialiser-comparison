<?php
/**
 * Created by PhpStorm.
 * User: guigui
 * Date: 15/06/18
 * Time: 22:50
 */

namespace Vendor\Package;

class Subject
{
    protected $id;

    protected $name;

    protected $description;

    protected $content;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    protected $isEnabled;

    protected $isPurchasable;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getisEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * @param mixed $isEnabled
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    }

    /**
     * @return mixed
     */
    public function getisPurchasable()
    {
        return $this->isPurchasable;
    }

    /**
     * @param mixed $isPurchasable
     */
    public function setIsPurchasable($isPurchasable)
    {
        $this->isPurchasable = $isPurchasable;
    }

}