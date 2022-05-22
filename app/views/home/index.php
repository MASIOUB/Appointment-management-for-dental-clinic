<?php
require_once dirname(__DIR__) . "./components/header.php";
// var_dump(dirname(__DIR__));
?>

<link rel="stylesheet" href="css/style.css">

<section class="bg-cover" style="background-image: url(../img/hero.jpg)">
    <div class="container">
        <div class="row min-vh-100 align-content-center justify-content-center">
            <div class="card align-items-center w-50 p-0">
                <div class="card-header text-center bg-primary w-100">
                    <h2 class=" text-white">Appointment</h2>
                </div>
                <div class="card-body w-100">
                    <form action="http://localhost/dentiste/home/create" class="d-flex flex-column" method="POST">
                        <!-- <form action="" class="d-flex flex-column" method="POST"> -->
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <select name="subject_id">
                                <?php foreach ($subjects as $subject) : ?>
                                    <option value="<?= $subject['id'] ?>"><?= $subject['subject'] ?></option>
                                <?php endforeach; ?>
                                <!-- <option value="1">Tooth Pain</option>
                                <option value="2">Periodontal Disease</option>
                                <option value="3">Uneven Teeth</option>
                                <option value="4">Cavities & Decay</option> -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Time</label>
                            <select name="timeslot_id">
                                <?php foreach ($timeslots as $timeslot) : ?>
                                    <option value="<?= $timeslot['id'] ?>"><?= $timeslot['time'] ?></option>
                                <?php endforeach; ?>
                                <!-- <option value="1">10:00</option>
                                <option value="2">10:30</option>
                                <option value="3">11:00</option>
                                <option value="4">14:00</option>
                                <option value="5">14:30</option>
                                <option value="6">15:00</option> -->
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary align-self-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody id="appointment">
                <!-- <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr> -->
            </tbody>
        </table>
        <!-- <div id="appointment">
            
        </div> -->
    </div>
</section>

<script src="js/home.js"></script>


<?php
require_once dirname(__DIR__) . "./components/footer.php";
?>