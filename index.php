<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
    <body onLoad="JavaScript:timedRefresh(3000);"><BR>
    <?php
    //ดึง json จาก API 
$response = file_get_contents("https://api.thingspeak.com/channels/1458412/feeds.json?results=2", false, stream_context_create($arrContextOptions));
$json = json_decode($response);
//เลือกแค่ data
$name = $json->channel->name;
$hum = $json->feeds->field1;
$temp = $json->feeds->field2;

$d1 = date("y-m-d H:i:s");

?>
    
<h1>Hamdee Naseng 6211273 <?php echo $name+$hum+$temp; ?></h1>
<div class="container">
    <div class="row">
<iframe class="col-sm-8 embed-responsive-itemr" src="https://thingspeak.com/channels/1458412/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Humidity&type=line"></iframe>
</div>
    <br>
    <div class="row">
<iframe class="col-sm-8 embed-responsive-item" class="col-sm-4" src="https://thingspeak.com/channels/1458412/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Temperature&type=line"></iframe>
</div>
    <br>
    <div class="row">
<iframe class="row embed-responsive-item" src="https://thingspeak.com/channels/1458412/maps/channel_show"></iframe>
</div>
    <br>
</div>
    </div>
        </body>
</html>
