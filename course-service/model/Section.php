<?php
/**
 * Created by PhpStorm.
 * User: NEUMUELLER
 * Date: 12/1/2017
 * Time: 8:54 AM
 */
class Section implements JsonSerializable
{
    private $section;
    private $days;
    private $time;
    public function __construct(String $section, String $days, String $time)
    {
        $this->time = $time;
        $this->days = $days;
        $this->section = $section;
    }
    /**
     * @return String
     */
    public function getSection(): String
    {
        return $this->section;
    }
    /**
     * @param String $section
     */
    public function setSection(String $section)
    {
        $this->section = $section;
    }
    /**
     * @return String
     */
    public function getTime(): String
    {
        return $this->time;
    }
    /**
     * @param String $time
     */
    public function setTime(String $time)
    {
        $this->time = $time;
    }
    /**
     * @return String
     */
    public function getDays(): String
    {
        return $this->days;
    }
    /**
     * @param String $days
     */
    public function setDescription(String $days)
    {
        $this->days = $days;
    }
    public function jsonSerialize()//maps JSON string
    {
        return ["section"=> $this->section,
            "days"=> $this->days,
            "time"=> $this->time];
    }
}