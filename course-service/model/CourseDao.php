<?php
/**
 * User: lyang
 * Date: 9/7/17
 */

class CourseDao
{
    /**
     * Returns an array of Color objects.  Empty array is returned if none exist.
     * @return array
     */
    public function getAll() {
        $result = array();
        $sql = "select * from course order by id";
        $rows = Db::queryAll($sql, array());
        return $rows;
    }

}