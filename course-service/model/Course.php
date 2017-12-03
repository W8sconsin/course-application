<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/28/2017
 * Time: 6:18 PM
 */

class Course implements JsonSerializable
{
    private $id;
    private $name;
    private $description;

    public function __construct(String $id, String $name, String $description)
    {
        $this->name = $name;
        $this->description = $description;
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getId(): String
    {
        return $this->id;
    }

    /**
     * @param String $id
     */
    public function setId(String $id)
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @param String $courseName
     */
    public function setName(String $name)
    {
        $this->name = $name;
    }

    /**
     * @return String
     */
    public function getDescription(): String
    {
        return $this->description;
    }

    /**
     * @param String $description
     */
    public function setDescription(String $description)
    {
        $this->description = $description;
    }





    public function jsonSerialize()//maps JSON string
    {
        return ["id"=> $this->id,
            "name"=> $this->name,
            "description"=> $this->description];
    }
}