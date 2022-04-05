<a class=" text-light" href="<?= createLink("/") ?>">Home</a>
<br>
<br>
<a class=" text-light" href="<?= createLink("/login") ?>">Login</a>
<br>
<br>
<a class=" text-light" href="<?= createLink("/signup") ?>">Register</a>
<br>
<br>

<div class="row min-vh-100 align-content-center justify-content-center">
    <div class="card align-items-center w-50 p-0">
        <div class="card-header text-center bg-primary w-100">
            <h2 class=" text-white">Sign Up</h2>
        </div>
        <div class="card-body w-100">
            <form class="d-flex flex-column" method="POST">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Day Of Birth</label>
                    <input type="date" name="birth_day" class="form-control">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="gender" class="form-check-input">
                    <label class="form-check-label">Female</label>
                    <input type="checkbox" name="gender" class="form-check-input">
                    <label class="form-check-label">Male</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">CIN</label>
                    <input type="text" name="cin" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary align-self-center">Submit</button>
            </form>
        </div>
    </div>
</div>