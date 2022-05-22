<?php
require_once dirname(__DIR__) . "/views/components/header.php";
// var_dump(dirname(__DIR__));
?>

<link rel="stylesheet" href="css/style.css">

<div class="d-flex flex-column align-items-center" style="margin-top: 100px;">
        <h1>Login</h1>
        <form action="http://localhost/dentiste/login/index" class="d-flex flex-column align-items-center" method="post">
            <div class="mb-3 row">
                <label for="staticUsername" class="form-label">Enter your reference</label><br>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ref">
                </div>
            </div>
            <button name="submit" class="btn text-light">submit</button>
        </form>
    </div>

    
<?php
require_once dirname(__DIR__) . "/views/components/footer.php";
?>