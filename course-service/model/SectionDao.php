<?php
/**
 * Created by PhpStorm.
 * User: NEUMUELLER
 * Date: 12/1/2017
 * Time: 8:40 AM
 */


class SectionDao
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
        $sql = "select * from section order by section" ;
        $rows = Db::queryAll($sql, array());
        $result = array();
        if (empty($rows)) {
            return $result;
        }
        foreach ($rows as $row) {
            $section = $this->create($row);
            array_push($result, $section);
        }
        return $result;
    }

    private function create($row)
    {
        return new Section($row["section"], $row["days"], $row["time"]);
    }
}