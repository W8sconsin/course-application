<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/28/2017
 * Time: 7:37 PM
 */

class UnsupportedController extends AbstractController
{
    public function __construct()
    {
    }

    function processInternal(&$data, $param)
    {
        $data["message"] = "Unknown error";
    }

}