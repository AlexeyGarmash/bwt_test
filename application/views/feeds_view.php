<div class="container">
    <h2>Feedbacks</h2>
    <div class="list-group">
        <?php
        while ($row = mysqli_fetch_array($data['result'])) {
            /* echo '<div class="list-group-item flex-column align-items-start">' .
              '<div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">' . $row['Name'] . '</h5>
              <small>' . $row['Email'] . '</small>
              </div>
              <p class="mb-1">' . $row['Message'] . '</p> </div>'; */
            include 'application/views/item_feedback.php';
        }
        ?>
    </div>
</div>