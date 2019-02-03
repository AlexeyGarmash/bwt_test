<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li role="presentation" class="active"><a href="./main"><h5>Home</h5></a></li>
            <li role="presentation"><a href="./weather"><h5>Weather</h5></a></li>
            <li role="presentation"><a href="./feedback"><h5>Leave feedback</h5></a></li>
            <li role="presentation"><a href="./feeds"><h5>Feedbacks</h5></a></li>
        </ul>
    </div>
</nav>
<script>
    $(document).ready(function () {
        var selector = 'body > nav > div > ul > li';
        var url = window.location.href;
        console.log(url);
        var target = url.split('/');
        $(selector).each(function () {
            console.log(this);
            if ($(this).find('a').attr('href') === ('./' + target[target.length - 1])) {
                $(selector).removeClass('active');
                $(this).removeClass('active').addClass('active');
                console.log('YES');
            }
        });
    });
</script>
