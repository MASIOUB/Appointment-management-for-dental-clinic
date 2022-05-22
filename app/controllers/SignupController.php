<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json ; charset=utf-8');
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
header("Access-Control-Allow-Headers:*");

class SignupController
{

    private $patientModel;
    public function __construct()
    {
        $this->patientModel = new Patient();
    }

    public function index()
    {
        view('signup');
    }

    public function create()
    {
        if (isPostRequest()) {
            $patientRef = generateRandomString();
            $data = ['ref' => $patientRef,...$_POST];

            $patient = $this->patientModel->create($data);
            // return json($patient);

            if ($patient) {
                createPatientSession($patient);
                return redirect("/");
            }
        } else {
            return view("signup");
            // echo 'patient not inserted';
        }


    }

}