<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/28/2017
 * Time: 7:29 PM
 */

  final class CourseController extends AbstractBaseController
{
    public function __construct()
    {
    }

        function process($params)
        {
            $this->listing($params);
            if (empty($this->data)) {
                $this->data["statusCode"] = "404";
                $this->data["statusMsg"] = "No Data Found";
            } else {
                $this->data["statusCode"] = "200";
                $this->data["statusMsg"] = "Success";
            }
        }

        private function listing($params) {
            $dao = new CourseDao();
            $course = $dao->get($params);
            if (!empty($course)){
                $this->data["course"] = $course;
            }
        }

    protected function getAll(&$data){
        $dao = new CourseDao();
        $courses = $dao->getAll();
        $data["courses"] = $courses;
    }

    protected function get(&$data, $id){
        $dao = new CourseDao();
        $course = $dao->get($id);
        if($course == null){
            return;
        }
        $data["course"] = $course;
        $data["requestedId"] = $id;
    }
}