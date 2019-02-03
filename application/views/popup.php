<?php
if ($data['post']) {
    ?>
    <script>
        $(document).ready(function () {
            $('#myModal').modal('show');
        });
    </script>
<?php } ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $data['title']; ?></h4>
            </div>
            <div class="modal-body">
                <p><?php echo $data['message']; ?></p>                     
            </div>    
        </div>
    </div>
</div>