<?php

use function PHPSTORM_META\type;

  if (isset($_POST['meteo'])) {
    $city = $_POST['selectedcity'];
    $api_key = 'e38a3fd019a7f9d07538b3a5dadf7fea';
    $url ="https://api.openweathermap.org/data/2.5/weather?q=$city,MA&appid=$api_key&units=metric";
    $req = curl_init();
    curl_setopt($req,CURLOPT_URL,$url);
    curl_setopt($req,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($req);
    curl_close($req);
    if ($res) {
      $data = json_decode($res,false);
      // var_dump($data);
      $speed = $data->wind->speed;
      $deg = $data->wind->deg;
      $coutry = $data->sys->country;
      $temp = $data->main->temp;
      $temp_max = $data->main->temp_max;
      $temp_min = $data->main->temp_min;
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<form method="post">
  <div class="">
    <select class="select-form" name="selectedcity" id="">
      <option value="Marrakesh" <?= (isset($_POST['selectedcity']) && $_POST['selectedcity'] == "Marrakesh") ? 'selected' : ''; ?>>Marrakesh</option>
      <option value="Rabat"  <?= (isset($_POST['selectedcity']) && $_POST['selectedcity'] == "Rabat") ? 'selected' : ''; ?>>Rabat</option>
      <option value="Casablanca"  <?= (isset($_POST['selectedcity']) && $_POST['selectedcity'] == "Casablanca") ? 'selected' : ''; ?>>Casablanca</option>
      <option value="Agadir"  <?= (isset($_POST['selectedcity']) && $_POST['selectedcity'] == "Agadir") ? 'selected' : ''; ?>>Agadir</option>
      <option value="Tangier"  <?= (isset($_POST['selectedcity']) && $_POST['selectedcity'] == "Tangier") ? 'selected' : ''; ?>>Tangier</option>
      <option value="Kenitra"  <?= (isset($_POST['selectedcity']) && $_POST['selectedcity'] == "Kenitra") ? 'selected' : ''; ?>>Kenitra</option>
    </select>
    <input type="submit" class="btn" value="get meteo" name="meteo">
  </div>
</form>
<div class="frame">
  
  <div class="moon">
    <div class="moon-crater1"></div>
    <div class="moon-crater2"></div>
  </div>
  <div class="hill-bg-1"></div>
  <div class="hill-bg-2"></div>
  <div class="hill-fg-1"></div>
  <div class="hill-fg-2"></div>
  <div class="hill-fg-3"></div>
	
  <div class="front">
		<div>
      <div class="">
        <?php
          if (isset($_POST['selectedcity'])) {
            echo $_POST['selectedcity'];
          }else{
            echo "SELECTIONNER UNE VILLE";
          }
        ?>,<?= $coutry?>
      </div>
			<div class="temperature">
        <?= ($temp)? $temp."°" : ''?>
			</div>
			<!-- <div class="icons">
				<i class="fas fa-wind"></i><br/><i class="fas fa-tint"></i>
			</div> -->
			<div>
				<div class="info">
					  <?= $speed ;?> km/h <br> <?= $deg ?>%
				</div>
				<table class="preview">
					<tbody>
						<tr>
							<td>Max</td>
							<td><?= ($temp_max)? $temp_max."°" : ''?></td>
						</tr>
						<tr>
							<td>Min</td>
							<td><?= ($temp_min)? $temp_min."°" : ''?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="proverb">“Frogs croaking in the lagoon,<br/>Means rain will come real soon.”</div>
	</div>
  <div class="drop-big-1"></div>
  <div class="drop-big-2"></div>
  <div class="drop-big-3"></div>
  <div class="drop-big-4"></div>
  <div class="drop-big-5"></div>
  <div class="drop-big-6"></div>
  <div class="drop-big-7"></div>
  <div class="drop-big-8"></div>
  <div class="drop-big-9"></div>
  <div class="drop-big-10"></div>
  <div class="drop-medium-1"></div>
  <div class="drop-medium-2"></div>
  <div class="drop-medium-3"></div>
  <div class="drop-medium-4"></div>
  <div class="drop-medium-5"></div>
  <div class="drop-medium-6"></div>
  <div class="drop-medium-7"></div>
  <div class="drop-medium-8"></div>
  <div class="drop-medium-9"></div>
  <div class="drop-medium-10"></div>
  <div class="drop-small-1"></div>
  <div class="drop-small-2"></div>
  <div class="drop-small-3"></div>
  <div class="drop-small-4"></div>
  <div class="drop-small-5"></div>
  <div class="drop-small-6"></div>
  <div class="drop-small-7"></div>
  <div class="drop-small-8"></div>
  <div class="drop-small-9"></div>
  <div class="drop-small-10"></div>
</div>



</body>
</html>