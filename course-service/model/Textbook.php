<?php
/**
 * Created by PhpStorm.
 * User: NEUMUELLER
 * Date: 12/3/2017
 * Time: 8:45 AM
 */

class Textbook implements JsonSerializable
{
    private $isbn;
    private $title;


    public function __construct(String $id, String $isbn, String $title)
    {
        $this->isbn = $isbn;
        $this->title = $title;

    }


    /**
     * @return String
     */
    public function getIsbn(): String
    {
        return $this->isbn;
    }

    /**
     * @param String $isbn
     */
    public function setIsbn(String $isbn)
    {
        $this->courseName = $isbn;
    }

    /**
     * @return String
     */
    public function getTitle(): String
    {
        return $this->title;
    }

    /**
     * @param String $description
     */
    public function setTitle(String $title)
    {
        $this->title = $title;
    }


    public function jsonSerialize()//maps JSON string
    {
        return ["isbn" => $this->isbn,
            "title" => $this->title];
    }
}