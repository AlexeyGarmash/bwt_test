<h1 align="center">Register now</h1>
<div class="panel-body">
    <form action="" method="post" name="register">
        <input type="hidden" name="action" value="register">
        <div class="form-group">
            <input class="form-control" name="name" type="text" placeholder="Enter your name" required minlength="3">
            <span class="label label-danger"><?php echo $data['err']['name'] ?></span>
        </div>
        <div class="form-group">
            <input class="form-control" name="secname" type="text" placeholder="Enter your second name" required minlength="3">
            <span class="label label-danger"><?php echo $data['err']['secname'] ?></span>
        </div>
        <div class="form-group">
            <input class="form-control" name="email" type="email" placeholder="Enter your email" required>
            <span class="label label-danger"><?php echo $data['err']['email'] ?></span>
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
            <input class="form-control" name="password" type="password" placeholder="Enter password" 
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                   title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
            <span class="label label-danger"><?php echo $data['err']['pass'] ?></span>
        </div>
        <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Register">
    </form>
</div>