<!DOCTYPE html>
<html>
<head>
    <?php date_default_timezone_set('Asia/Bangkok');?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body onload="JavaScript:timedRefresh(15000);"><BR>
    <?php
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  
    //ดึง json จาก API 
$response = file_get_contents("https://api.thingspeak.com/channels/1458412/feeds.json?results=2", false, stream_context_create($arrContextOptions));
$json = json_decode($response);
//เลือกแค่ data
$name = $json->channel->name;
$hum = $json->feeds[1]->field1;
$temp = $json->feeds[1]->field2;

$time = $json->feeds[1]->created_at;
$newtime = date("d-m-Y H:i", strtotime($time)); 
?>
    
<h1>Hamdee Naseng 6211273 </h1>
<br>

    
<div class="container">
  <div class="row">
    <div class="col-sm-7">
      <h3>Dashboard</h3>
      <div class="container">
        <div class="row">
        <iframe  style="width: 500px; height: 300px " src="https://thingspeak.com/channels/1458412/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Humidity&type=line"></iframe>
        </div>
    <br>
        <div class="row">
        <iframe style="width: 500px; height: 300px " src="https://thingspeak.com/channels/1458412/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Temperature&type=line"></iframe>
        </div>
    <br>
        <div class="row">
        <iframe style="width: 500px; height: 300px " src="https://thingspeak.com/channels/1458412/maps/channel_show"></iframe>
        </div>
    <br>
</div>
    </div>
    <div class="col-sm-5">
      <h3>Data Latest</h3>
      <div class="container">
    <h3>Humidity : <?php echo $hum; ?> % <br>
    Temperature: <?php echo $temp; ?> C <br>
    Created at: <?php echo $newtime; ?>   <br>
    </h3>
</div>
    </div>
    
  </div>
</div>
<script type="text/JavaScript">
function timedRefresh(timeoutPeriod) {
 setTimeout("location.reload(true);",timeoutPeriod);
}

</script>

        </body>
</html>
