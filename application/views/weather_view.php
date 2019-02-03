<div class="container">
    <div class="row">
        <div id="" class="text-center col-md-8 col-md-offset-2 weather">
            <div class="weather-head">
                <h1 id="location" class="text-center display-4">Запорожье, Украина</h1>
                <div class="row">
                    <div id="description" class="description col-md-6 text-center">
                        <img src="<?php echo $data['weather']->cloudness['img']; ?>" alt="lorem">
                        <p class="desc"><?php echo $data['weather']->cloudness['desc']; ?></p>
                    </div>
                    <div id="temperature" class="col-md-6 text-center">
                        <?php echo $data['weather']->temp; ?>
                    </div>
                </div>
                <div class="weather-body">					
                    <div class="row">
                        <div class="humidityNow col-md-4 text-center">
                            <i class="wi wi-raindrop"></i><span> Влажность</span>
                        </div>
                        <div class="windNow col-md-4 text-center">
                            <i class="wi wi-strong-wind"></i><span> Ветер</span>
                        </div>
                        <div class="pressureNow col-md-4 text-center">
                            <i class="wi wi-barometer"></i><span> Давление</span>
                        </div>				
                    </div>
                    <div class="row">
                        <div id="humidity" class="humidity-data col-md-4 text-center">
                            <?php echo $data['weather']->humidity; ?>
                        </div>
                        <div id="wind" class="wind-data col-md-4 text-center">
                            <?php echo $data['weather']->wind; ?>
                        </div>
                        <div id="pressure" class="degree-data col-md-4 text-center">
                            <?php echo $data['weather']->pressure; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="" class="text-center col-md-8 col-md-offset-2 weatherday">
            <?php echo $data['weatherTable']; ?>
        </div>
        <div class="text-center col-md-8 col-md-offset-2">
            <form action="" method="post" name="logout">
                <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Log out">
            </form>
        </div>
    </div>
</div>