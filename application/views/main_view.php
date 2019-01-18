<div class="row row-conformity row-centered">
    <div class="col-md-3"></div>
    <div class="register col-md-3">
        <form action="" method="post" name="register">
            <input type="hidden" name="action" value="register">
            <h1>Register now</h1>
            <div class="alert">
                <a class="close" data-dismiss="alert"><i class="icon-remove"></i></a>
                <strong><?php echo $data['message']; ?></strong>
            </div>
            <div class="form-group">
                <input class="form-control" name="name" type="text" placeholder="Enter your name">
                <span class="badge badge-pill badge-danger"><?php echo $data['err']['name'] ?></span>
            </div>
            <div class="form-group">
                <input class="form-control" name="secname" type="text" placeholder="Enter your second name">
                <span class="badge badge-pill badge-danger"><?php echo $data['err']['secname'] ?></span>
            </div>
            <div class="form-group">
                <input class="form-control" name="email" type="email" placeholder="Enter your email">
                <span class="badge badge-pill badge-danger"><?php echo $data['err']['email'] ?></span>
            </div>
            <div class="form-group">
                <input class="form-control" name="bday" type="date" placeholder="Enter your birthday">
            </div>
            <div class="form-group">
                <select class="form-control" name="sex" name="sex">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" name="password" type="password" placeholder="Enter password">
                <span class="badge badge-pill badge-danger"><?php echo $data['err']['pass'] ?></span>
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Register">
        </form>
    </div>

    <div class="login col-md-3">
        <form action="" method="post" name="login">
            <input type="hidden" name="action" value="login">
            <h1>Login</h1>
            <div class="alert">
                <a class="close" data-dismiss="alert"><i class="icon-remove"></i></a>
                <strong><?php echo $data['messageLogin']; ?></strong>
            </div>
            <div class="form-group">
                <input class="form-control" name="email" type="email" placeholder="Enter your email">
                <span class="badge badge-pill badge-danger"><?php echo $data['err']['emailLogin'] ?></span>
            </div>
            <div class="form-group">
                <input class="form-control" name="password" type="password" placeholder="Enter password">
                <span class="badge badge-pill badge-danger"><?php echo $data['err']['pass'] ?></span>
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Login">
        </form>
    </div>

</div>