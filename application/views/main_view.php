</br>
<?php include 'application/views/popup.php'; ?>
<div class="row row-conformity row-centered">
    <div class="col-md-4"></div>
    <div class="mt-1 panel panel-primary register col-md-4">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#reg">Register</a></li>
            <li><a data-toggle="tab" href="#log">Login</a></li>
        </ul>

        <div class="tab-content">
            <div id="reg" class="tab-pane fade in active">
                <?php include 'application/views/registerPanel.php'; ?>
            </div>
            <div id="log" class="tab-pane fade">
                <?php include 'application/views/loginPanel.php'; ?>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>