<?php

//===========================[ Настройки ]===========================
$diraudio = "common/sounds/"; // папка до музы
//================================================
$servername = "Resta World"; // Название проекта/сервера
//================================================
$map = "rp_downtown_REDIT"; // Карта
//================================================
$gamemode = "BW"; // Gamemode
//================================================
$slots = "42"; // слоиы
//===========================[ Узнаем игрока ]===========================
$api = "0316F35905ADA2A02338C68E753D5230"; //Steam Api
//================================================
$steam64 = $_GET["steamid"]; //get запрос
//================================================
$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $api . "&steamids=" . $steam64;
//================================================
$data = file_get_contents($url); // берем инфу об акке
//================================================
$json = str_replace("\n", "", $data); //шифровка инфы
//================================================
$table2 = json_decode($json, true); // декодирование кода
//================================================
$table = $table2["response"]["players"][0]; // табличка с инфой
//================================================
$authserver = bcsub($steam64, '76561197960265728') & 1; // Магия
//================================================
$authid = (bcsub($steam64, '76561197960265728')-$authserver)/2; // магия 2
//================================================
$steam32 = "STEAM_0:$authserver:$authid"; // делаем 32 битный стим ид
//================================================
//================================================
$scan = scandir($diraudio); // сканируем папку на музу
//================================================
$random = rand(2, sizeof($scan)-1); // рандомная муза
//================================================
?>

<? //================ HTML ================ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">

<head>
	<!-- =========================[Название сверху]========================= -->
	<title>Resta LoadScreen</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- =========================[CSS Модули]========================= -->
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link href="common/style.css" rel="stylesheet">
	<!-- =========================[Кодировка (НА ДОКУМЕНТЕ ДОЛЖНА БЫТЬ Win 2151)]========================= -->
	<meta charset="utf-8">
	<!-- =========================[Модуль музыки]========================= -->
	<script>
		$(document).ready(function() 
		{
		music = document.getElementById("music");
		music.volume = 0.2; // громкость
		music.play();
		});
	</script>
<body>
	<!-- =========================[Скрипт музыки]========================= -->
	<audio id="music" autoplay="autoplay" loop="loop" >
    	<source src="common/sounds/<?php echo $scan[$random]; ?>" type="audio/ogg">
	</audio>
	<!-- =========================[Накладываем черный фон]========================= -->
	<div id ="nalowenye1"></div>
	<!-- =========================[Задний фон]========================= -->
	<div class="w3-content w3-section" style="max-width:300px">
		<!-- =========================[Картинкиу]========================= -->
	  <img class="fon w3-animate-fading" src="common/1.jpg" style="width:100%;height:100%;">
	  <img class="fon w3-animate-fading" src="common/2.jpg" style="width:100%;height:100%;">
	  <img class="fon w3-animate-fading" src="common/3.jpg" style="width:100%;height:100%;">
	  <img class="fon w3-animate-fading" src="common/4.jpg" style="width:100%;height:100%;">
	  <!-- =========================[ПРИМЕР]========================= 
		<img class="fon w3-animate-fading" src="CSS/ЛФКЕШТЛФ.jpg" style="width:100%;height:100%;">
	  -->
	</div>
	<!-- =========================[Черные точки]========================= -->
	<div id ="nalowenye"></div>
	<!-- =========================[Блок посередине]========================= -->
	<div id="block_center">
		<!-- =========================[Название сервера]========================= -->
		<p class="FontTitile"><?php echo $servername; ?></p><br>
		<!-- =========================[Ну тут понятно]========================= -->
		<p class="FontStats" style="text-align: left; top: 5%;">Map : </p>
		<p class="FontStats" style="text-align: left; top: 15%;">Gamemode : </p>
		<p class="FontStats" style="text-align: left; top: 25%;">Slots : </p>
		<!-- =========================[Текст когда загрузка карты,слотов и тд]========================= -->
		<p class="FontStats" id="serv_map" style="text-align: left; top: 5%; left: 55px;"><?php echo $map; ?></p>
		<p class="FontStats" id="serv_gamemode" style="text-align: left; top: 15%; left: 115px;"><?php echo $gamemode; ?></p>
		<p class="FontStats" id="serv_maxplayers" style="text-align: left; top: 25%; left: 58px;"><?php echo $slots; ?></p>
		<!-- =========================[Бар]========================= -->
		<span id="ProgressBar" class="expand" style="width: 100%"></span>
		<!-- =========================[Декодируем ник]========================= -->
		<?php $youname = str_replace("\n", " ", $table["personaname"]); ?>
		<!-- =========================[Ник,ид,IP]========================= -->
		<p class="FontStats" style="text-align: left; top: 45%; left: 115px;"><?php echo "Привет, " . $youname; ?></p>
		<p class="FontStats" style="text-align: left; top: 55%; left: 115px;"><?php echo $steam32; ?></p>
		<p class="FontStats" style="text-align: left; top: 65%; left: 115px;"><?php echo "Ваш IP : " . $_SERVER["REMOTE_ADDR"];; ?></p>
		<!-- =========================[Новости]========================= -->
		<div id="newsblock">
			<div class="news w3-animate-fading">
			<p class="FontNewsTitle" style="left: 0%; top: -15%;">Контакты</p>
			<p class="FontNews" style="left: 0%; top: -30%;">Наша группа ВК : vk.com/ArsikRP</p><br>
			</div>
			<div class="news w3-animate-fading">
			<p class="FontNewsTitle" style="left: 0%; top: -15%;">Правила</p>
			<p class="FontNews" style="left: 0%; top: -30%;">1. FearRP<? echo "<br>";?>2. NLP 3 мин<? echo "<br>";?>3. NONRP<? echo "<br>";?>4. RDM<? echo "<br>";?>Все в группе ВК!</p><br>
			</div>
			<div class="news w3-animate-fading">
			<p class="FontNewsTitle" style="left: 0%; top: -15%;">Новости</p>
			<p class="FontNews" style="left: 0%; top: 25%;">Был добавлен новый таб,F4, и карта<? echo "<br>";?>Спасибо что играете у нас!</p><br>
			</div>
			<!-- =========================[Пример новостей]========================= 
			<div class="news w3-animate-fading">
			<p class="FontNewsTitle" style="left: 0%; top: -15%;">ВАЖНО!!!</p>
			<p class="FontNews" style="left: 0%; top: 25%;">Заходим и не стесняемся.</p><br>
			</div>
		    -->
		</div>
		<!-- =========================[Бокс с авой]========================= -->
	<div id="ava1" style="top: 53%;">
		<?php	echo "<img class='ava' src=\"" . $table["avatarfull"] . "\" />"; ?>
	</div>
	</div>
</body>
<?php //================ JS ================ ?>
	<script>
	// Глобальные переменые JSON
	var myIndex = 0;
	var myIndexnews = 0;
	// Включаем функций листание новостей ,и фона
	carousel();
	carousel_news();
	// Для гмода
	function SetFilesTotal( total )
	{

	}
	//Загрузка мода,карты,игроков
	// Меняет фон
	function carousel() 
	{
	    var i;
	    var x = document.getElementsByClassName("fon");
	    for (i = 0; i < x.length; i++) 
	    {
	       x[i].style.display = "none";  
	    }
	    myIndex++;
	    if (myIndex > x.length) {myIndex = 1}    
	    x[myIndex-1].style.display = "block";  
	    setTimeout(carousel, 10000);    
	}
	// Меняет новости
	function carousel_news() 
	{
	    var inews;
	    var xnews = document.getElementsByClassName("news");
	    for (inews = 0; inews < xnews.length; inews++) 
	    {
	       xnews[inews].style.display = "none";  
	    }
	    myIndexnews++;
	    if (myIndexnews > xnews.length) {myIndexnews = 1}    
	    xnews[myIndexnews-1].style.display = "block";  
	    setTimeout(carousel_news, 10000);    
	}
	</script>

</head>