<?php
/**
 * Created by PhpStorm.
 * User: NEUMUELLER
 * Date: 12/3/2017
 * Time: 8:42 AM
 */
class TextbookDao
{
    /**
     * Returns an array of Color objects.  Empty array is returned if none exist.
     * @return array
     */
    public function __construct()
    {
    }
    public function getAll()
    {
        $sql = "select * from textbook order by isbn";
        $rows = Db::queryAll($sql, array());
        $result = array();
        if (empty($rows)) {
            return $result;
        }
        foreach ($rows as $row) {
            $textbook = $this->create($row);
            array_push($result, $textbook);
        }
        return $result;
    }
    private function create($row)
    {
        return new Textbook($row["isbn"], $row["name"]);
    }
}