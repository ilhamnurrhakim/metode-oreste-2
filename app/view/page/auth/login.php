<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body>
    <!-- Contoller -->
    <?php include 'app/controller/auth/login.php' ?>
    <!-- \Controller -->

    <!-- Content -->
    <form method="post" class="needs-validation" novalidate>
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 card shadow">
                <div class="card-body px-3">
                    <div class="my-3">
                        <h3 class="text-center fw-bolder"><?= $dataProject['project'] ?></h3>
                        <h5 class="text-center">Masukan Username dan Password</h5>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required />
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required />
                    </div>
                    <div class="login-form-actions mb-3">
                        <button type="submit" name="login" class="btn btn-primary w-100">
                            <span class="icon">
                                <i class="bi bi-arrow-right-circle"></i>
                            </span>
                            LOGIN
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- \Content -->

    <!-- Script -->
    <?php include 'app/view/layout/script.php' ?>
    <!-- \Script -->
</body>

</html>