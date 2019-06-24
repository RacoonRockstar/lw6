<!DOCTYPE html>
<html>
	<head>

		<title>vk api</title>

<meta charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php

$access_token = "13329fe413329fe413329fe45b135b988e1133213329fe44f48341806b7271860f0bb7a"; 
$url = file_get_contents("https://api.vk.com/method/wall.get?owner_id=-26750264&count=$count_rand&filter=owner&version=5.92&access_token=$access_token"); 
$data = json_decode($url, true); // in json
if($data['error']['error_code']){ echo "Error <b>".$data['error']['error_code']."</b>";} 
else{
  
  for($i=1;$i<$data['response'][$i];$i++){  

//containment

		if (strpos($data['response'][$i]['text'], 'Страна: ') &&
				strpos($data['response'][$i]['text'], 'Жанр: ') &&
				strpos($data['response'][$i]['text'], 'Рейтинги: ')){

    echo"
    <div class='wr'>
    <div class='num'>".$i."</div>
    <p>".$data['response'][$i]['text']."</p>
		<p><i class='fa fa-heart'></i> ".$data['response'][$i]['likes']['count']."<a href='https://vk.com/xfilm?w=wall-26750264_".$data['response'][$i]['id']."'> Смотреть на стене</a></p>
    <p>";
        if(empty($data['response'][$i]['attachment']['photo']
        ['src_big'])){}
        else{
          echo "<img src='".$data['response'][$i]['attachment']['photo']
          ['src_big']."'>";
        }
        echo "</p>
    </div>";
	}
  }
}
?>
</html>
