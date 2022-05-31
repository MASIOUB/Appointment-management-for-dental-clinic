<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json ; charset=utf-8');
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
header("Access-Control-Allow-Headers:*");

class HomeController
{

    private $timeslotModel;
    private $subjectModel;
    private $appointmentModel;



    /**
     * get times which possible to get.
     *
     * @param date $dt
     */
    public function getTimes()
    {
        $model = new Model();
        //    $table = 'appointments';
        $ref = currentUserRef();
        $dt = $_POST['date'];
        $id_time = $_POST['id_time'];
        $numRow = $model->getTimesR($dt, $id_time);
        $time = $model->getTime($id_time);
        $data['time'] = $time;
        $data['rows'] = $numRow;
        if ($data > 0) :
            echo json_encode($data);
        else :
            $data['time'] = 0;
            $data['rows'] = 0;
            echo json_encode($data);
        endif;
    }



    public function __construct()
    {
        $this->timeslotModel = new Timeslot();
        $this->subjectModel = new Subject();
        $this->appointmentModel = new Appointment();
    }

    public function index()
    {
        if (isLoggedIn()) {
            $timeslots = $this->timeslotModel->fetchAll();
            $subjects = $this->subjectModel->fetchAll();
            if ($timeslots && $subjects) {
                $tables = ["timeslots" => $timeslots, "subjects" => $subjects];
                // $subjectExist = ["subjects" => $subjects];
                return view("home/index", $tables);
                // if (isset($_SESSION['quarterly'])) {
                //     echo '<div class="alert alert-success" role="alert">You selected Quarterly Plan - <a href="plans.php">CHANGE</a></div>';
                //  }
            }
            return view("/");
        } else {
            return view('login');
        }
    }

    // public function allAppointments()
    // {
    //     if (isLoggedIn()){
    //         $timeslots = $this->timeslotModel->fetchAll();
    //         $appointments = $this->appointmentModel->fetchAll();
    //         if($appointments && $timeslots){
    //             $table = ["appointments" => $appointments, "timeslots" => $timeslots];
    //             return view("home/index", $table);
    //         }
    //         return("home/index");
    //     }else{
    //         return view('login');
    //     }
    // }

    public function create()
    {
        if (isPostRequest()) {
            $appointmentData = [
                "patient_ref" => currentUserRef(),
                ...$_POST // spread operator
            ];
            $isAppointmentCreated = $this->appointmentModel->create($appointmentData);
            json($isAppointmentCreated);
            return redirect("home/index");
        }
    }

    public function history()
    {
        if (isLoggedIn()) {
            $ref = currentUserRef();
            $isAppointmentExist = $this->appointmentModel->join("appointments.id AS id, appointments.date AS date, timeslots.time AS time, subjects.subject AS subject", "INNER JOIN subjects ON subjects.id = appointments.subject_id INNER JOIN timeslots ON timeslots.id = appointments.timeslot_id INNER JOIN patients ON patients.ref = :ref", ["ref" => $ref]);
            if ($isAppointmentExist) {
                // $appointments = ["appointments" => $isAppointmentExist];
                // return view("home", $appointments);
                return json($isAppointmentExist);
                // print_r($json);
            }
        } else {
            return view("login");
        }
    }

    public function update($id)
    {
        if (isLoggedIn()) {
            $appointment = $this->appointmentModel->fetchById($id);
            if (!$appointment) {
                return redirect("/home/index");
            }
            if (isPostRequest()) {
                $dataAppointment = $this->appointmentModel->update($_POST, $id);
                if ($dataAppointment) {
                    return redirect("/home/index");
                }
                return redirect("/home/update/$id");
            } else {
                $timeslots = $this->timeslotModel->fetchAll();
                $subjects = $this->subjectModel->fetchAll();
                $table = ["timeslots" => $timeslots, "subjects" => $subjects, "appointment" => $appointment];
                return view("home/update", $table);
            }
        }
    }

    public function delete($id)
    {
        if (isLoggedIn()) {
            $appointment = $this->appointmentModel->fetchById($id);
            if (!$appointment) return redirect("/home");
            $dataAppointment = $this->appointmentModel->delete($id);
            if ($dataAppointment) return redirect("/home");
        }
    }
}
