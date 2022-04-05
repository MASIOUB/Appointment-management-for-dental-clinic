<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json ; charset=utf-8');
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
header("Access-Control-Allow-Headers:*");

class LoginController
{

    private $patientModel;

    public function __construct()
    {
        $this->patientModel = new Patient();
    }

    public function index()
    {
        if (isPostRequest() && verify(["ref"], $_POST)) {
            $patient = $this->patientModel->fetchOne("WHERE ref = :ref", ["ref" => $_POST["ref"]]);
            echo json_encode($patient);


            // if ($patient )
            createUserSession($patient);
            return redirect("/appointment");
        }
         else {
            return view("login");
        }
    }

}