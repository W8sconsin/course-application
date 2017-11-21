<?php
/**
 * User: lyang
 * Date: 9/7/17
 */

final class CoursesController extends AbstractBaseController
{

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
        $courseDao = new CourseDao();
        $courses = $courseDao->getAll();
        if (!empty($courses)){
            $this->data["courses"] = $courses;
        }
    }
}