<h1 align="center">Login</h1>
<div class="panel-body">
    <form action="" method="post" name="login">
        <input type="hidden" name="action" value="login">


        <div class="form-group">
            <input class="form-control" name="email" type="email" placeholder="Enter your email">
            <span class="label label-danger"><?php echo $data['err']['emailLogin'] ?></span>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" type="password" placeholder="Enter password">
            <span class="label label-danger"></span>
        </div>
        <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Login">
    </form>
</div>