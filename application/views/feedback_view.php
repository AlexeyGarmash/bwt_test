<div style="clear:both;" class="container container-table">
    <div style="clear:both;" class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 feedback">
            <h1 class="display-4">Feedback</h1>
            <form action="" method="post" name="feed">
                <div class="form-group">
                    <input class="form-control" name="name" placeholder="Enter name" required minlength="3">
                    <span class="badge badge-pill badge-danger"><?php echo $data['err']['name'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" name="email" placeholder="Enter email" required>
                    <span class="badge badge-pill badge-danger"><?php echo $data['err']['email'] ?></span>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" placeholder="Put feedback here" required minlength="3"><?= $_SESSION["text"] ?></textarea>
                    <span class="badge badge-pill badge-danger"><?php echo $data['err']['text'] ?></span>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LcIc4sUAAAAAK3iTNwY03G5Nzx41UiybtXKKiDc"></div>
                    <span class="badge badge-pill badge-danger"><?php echo $data['captcha'] ?></span>
                </div>
                <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Send">
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>