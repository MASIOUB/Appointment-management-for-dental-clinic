<?php
require_once dirname(__DIR__) . "/views/components/header.php";
// var_dump(dirname(__DIR__));
?>

<link rel="stylesheet" href="css/style.css">

<!-- <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
    <h1>Enter Your Reference</h1>
    <form action="http://localhost/dentiste/login/index" class="" method="post">
        <div class="mb-3 row">
            <label for="staticUsername" class="form-label">Enter your reference</label><br>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ref">
            </div>
        </div>
        <button name="submit" class="btn text-light  btn-primary">submit</button>
    </form>
</div> -->

<div class="row min-vh-100 align-content-center justify-content-center">
    <div class="card align-items-center col-lg-6 col-md-8 col-sm-10 col-11 p-0">
        <div class="card-header text-center bg-primary w-100">
            <h2 class=" text-white">Login</h2>
        </div>
        <div class="card-body w-100">
            <form action="http://localhost/dentiste/login/index" class="d-flex flex-column" method="POST">
                <div class="mb-3">
                    <label class="form-label">Enter your reference</label>
                    <input type="text" name="ref" class="form-control">
                </div>
                
                
                <button type="submit" class="btn btn-primary align-self-center">Login</button>
            </form>
        </div>
    </div>
</div>


<?php
require_once dirname(__DIR__) . "/views/components/footer.php";
?>