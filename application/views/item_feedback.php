<blockquote class="quote-box col-md-15">
    <p class="quotation-mark">
        “
    </p>
    <p class="quote-text">
        <?= $row['Message'] ?>
    </p>
    <hr>
    <div class="blog-post-actions">
        <p class="blog-post-bottom pull-left">
            <?= $row['Name'] ?>
        </p>
        <p class="blog-post-bottom pull-right">
            <span class="badge quote-badge"><?= date("Y-m-d H:i:s", $row['FeedTime']); ?></span>
        </p>
    </div>
</blockquote>