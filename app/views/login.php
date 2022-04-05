<a class=" text-light" href="<?= createLink("/") ?>">Home</a>
<br>
<br>
<a class=" text-light" href="<?= createLink("/login") ?>">Login</a>
<br>
<br>
<a class=" text-light" href="<?= createLink("/signup") ?>">Register</a>
<br>
<br>

<div class="d-flex flex-column align-items-center">
        <h1>Login</h1>
        <form class="d-flex flex-column align-items-center" method="post">
            <div class="mb-3 row">
                <label for="staticUsername" class="form-label">Enter your reference</label><br>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ref">
                </div>
            </div>
            <button name="submit" class="btn text-light">submit</button>
        </form>
    </div>