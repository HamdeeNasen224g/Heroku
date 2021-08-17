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
    //ดึง json จาก ais มา 
$response = file_get_contents("https://magellan.ais.co.th/pullmessageapis/api/listen/thing/59740BBAF7C0BEB8891F1896ADF19ACD", false, stream_context_create($arrContextOptions));
$json = json_decode($response);
//เลือกแค่ data
$thingname = $json->ThingName;
$temp1 = $json->Sensor->Temperature1;
$temp2 = $json->Sensor->Temperature2;
$hum =  $json->Sensor->humidity;
$tempevm=$json->Sensor->temperatureEVM;
$d1 = date("y-m-d H:i:s");

//echo $temp1."<br>". $temp2 ."<br>".$hum;
?>
    
<h1>Hamdee Naseng 6211273</h1>
<iframe src="https://thingspeak.com/channels/1458412/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Humidity&type=line"></iframe>
<br>
<iframe src="https://thingspeak.com/channels/1458412/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Temperature&type=line"></iframe>
<br>
<iframe src="https://thingspeak.com/channels/1458412/maps/channel_show"></iframe>
<br>
<?php $temp1 ?>
        </body>
</html>
