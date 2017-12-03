<?php
/**
 * User: lyang
 * Date: 9/7/17
 */

class CourseDao
    /**
     * Returns an array of Color objects.  Empty array is returned if none exist.
     * @return array
     */
{
    public function __construct()
    {
    }
    public function getAll() {
        $sql = "select * from course";
        $rows = Db::queryAll($sql, array());
        $result = array();
        if(empty($rows)){
            return $result;
        }
        foreach($rows as $row){
            $course = $this->create($row);
            array_push($result, $course);
        }
        return $result;
    }
    public function get($id){
        $sql = "select * from course where id = " . $id;
        $rows = Db::queryOne($sql, array());
        $result = array();
        if(empty($rows)){
            return $result;
        }
        foreach($rows as $row){
            $course = $this->create($row);
            array_push($result, $course);
        }
        return $result;
    }
//        $sql = "select * from course where id = $id";
//        $param = array();
//        array_push($param, $id);
//        $row = Db::queryOne($sql, $param);
//        if (empty($row)){
//            null;
//        }
//        return $this->create($row);
    private function create($row){
        return new Course($row["id"], $row["name"], $row["description"]);
    }

}