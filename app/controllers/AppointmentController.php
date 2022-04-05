<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json ; charset=utf-8');
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
header("Access-Control-Allow-Headers:*");

class AppointmentController
{

    private $patientModel;
    private $appointmentModel;
    private $timeslotModel;

    public function __construct()
    {
        $this->patientModel = new Patient();
        $this->appointmentModel = new Appointment();
        $this->timeslotModel = new Timeslot();
    }

    public function index()
    {

        if (isPostRequest()) {
            
            $appointmentData = [
                "patient_ref"=> currentUserRef(),
                ...$_POST // spread operator
            ];
            $isAppointmentCreated = $this->appointmentModel->create($appointmentData);
            echo json_encode($isAppointmentCreated);
            if($isAppointmentCreated){
                return redirect("/");
            }
            
        }else{
            $timeslots = $this->timeslotModel->fetchAll();
            echo json_encode($timeslots);
            $timeIDs = ["id" => $timeslots];
            return view("appointment", $timeIDs);
        }
    }

}