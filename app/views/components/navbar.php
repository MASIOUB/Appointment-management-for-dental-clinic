<!-- navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dent<span style="color: rgb(0, 108, 255);">Life</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("/home/index") ?>">Home</a>
                    </li>
                    <?php if (!isLoggedIn()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("/login") ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("/signup") ?>">Register</a>
                    </li>
                    <?php endif;
                    if (isLoggedIn()) : ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= createLink("/logout") ?>">Logout</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>