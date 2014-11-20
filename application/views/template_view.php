<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Main Page</title>
        <link rel="stylesheet" type="text/css" href="<?=MAIN_ROOT?>css/main.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script src="<?=MAIN_ROOT?>js/main.js"></script>
        <script src="<?=MAIN_ROOT?>js/google_maps.js"></script>
        <script src="<?=MAIN_ROOT?>js/jsapi.js"></script>
    </head>
    <body>
        <? if( isset($_SESSION['user']['id']) ): ?><a href="/users/logout/">Logout</a><? endif ?>
        <?php include 'application/views/'.$content_view; ?>
    </body>
</html>
