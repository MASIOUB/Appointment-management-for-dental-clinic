<a class=" text-light" href="<?= createLink("/") ?>">Home</a>
<br>
<br>
<?php if (!isLoggedIn()) : ?>
    <a class=" text-light" href="<?= createLink("/login") ?>">Login</a>
    <br>
    <br>
    <a class=" text-light" href="<?= createLink("/signup") ?>">Register</a>
    <br>
    <br>
<?php endif;
if (isLoggedIn()) : ?>
    <a class=" text-light" href="<?= createLink("/appointment") ?>">Appointment</a>
    <br>
    <br>
    <a class=" text-light" href="<?= createLink("/logout") ?>">Logout</a>
    <br>
    <br>
<?php endif;
echo currentUserRef();
?>
<br>
<br>


<p>Time slots exists are:</p>
<?php foreach ($id as $key) :
?>
    <p><?= $key["id"] . " from " . $key["start_time"] . " to " . $key["end_time"] ?></p>
<?php endforeach;
?>

<br>
<br>

<div class="row min-vh-100 align-content-center justify-content-center">
    <div class="card align-items-center w-50 p-0">
        <div class="card-header text-center bg-primary w-100">
            <h2 class=" text-white">Appointment</h2>
        </div>
        <div class="card-body w-100">
            <form class="d-flex flex-column" method="POST">
                <div class="mb-3">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="mb-3">
                    <!-- <input type="number" name="timeslot_id" class="form-control"> -->
                    <select name="timeslot_id">
                        <?php foreach ($id as $key) : ?>
                            <option><?= $key["id"] ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>


                <button type="submit" class="btn btn-primary align-self-center">Submit</button>
            </form>
        </div>
    </div>
</div>