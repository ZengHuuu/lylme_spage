<!DOCTYPE html>
<html lang="zh-CN" element::-webkit-scrollbar {display:none}>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1"/>
		<meta charset="utf-8">
		<title><?php echo $conf['title']?></title>
		<meta name="keywords" content="<?php echo $conf['keywords']?>">
		<meta name="description" content="<?php echo $conf['description']?>">
		<meta name="author" content="LyLme">
		<link rel="icon" href="<?php echo $conf['logo']?>" type="image/x-icon">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="full-screen" content="yes">
		<meta name="browsermode" content="application">
		<meta name="x5-fullscreen" content="true">
		<meta name="x5-page-mode" content="app">
		<meta name="lsvn" content="MS4xLjM=">
		<script src="https://lf3-cdn-tos.bytecdntp.com/cdn/expire-2-M/jquery/3.5.1/jquery.min.js" type="application/javascript"></script>
		<link href="https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/bootstrap/4.5.3/css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo $cdnpublic ?>/assets/css/fontawesome-free5.13.0.css" type="text/css">	
		<link rel="stylesheet" href="<?php echo $cdnpublic ?>/template/default/css/style.css" type="text/css">
		<link rel="stylesheet" href="./template/default/css/font.css" type="text/css">
	</head>
    <body onload="FocusOnInput()"><div class="banner-video">
<img src="<?php echo background()?>">
			<div class="bottom-cover" style="background-image: linear-gradient(rgba(255, 255, 255, 0) 0%, rgb(244 248 251 / 0.6) 50%, rgb(244 248 251) 100%);">
			</div>
		</div>
		<!--topbar开始-->
		<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="position: absolute; z-index: 10000;">
		<!--<a class="navbar-brand" href="/"><img src="./assets/img/logo.png" height="25"  title="六零起始页"></a>-->
		<button class="navbar-toggler collapsed" style="border: none; outline: none;"type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
			    
		<svg class="icon" width="200" height="200"><use xlink:href="#icon-menus"></use></svg>
		<span><svg class="bi bi-x" 	fill="currentColor" id="x"><use xlink:href="#icon-closes"></use></svg><span>
			</button>
			<div class="collapse navbar-collapse" id="navbarsExample05">
				<ul class="navbar-nav mr-auto">
			<?php
$tagslists = $DB->query("SELECT * FROM `lylme_tags`");
while ($taglists = $DB->fetch($tagslists)) {
    echo '<li class="nav-item"><a class="nav-link" href="' . $taglists["tag_link"] . '"';
    if ($taglists["tag_target"] == 1) echo ' target="_blant"';
    echo '>' . $taglists["tag_name"] . '</a></li>
				    ';
}

if ($conf['tq'] != 'false') {
    echo '<div id="he-plugin-simple"></div>
		<script src="https://widget.qweather.net/simple/static/js/he-simple-common.js?v=2.0"></script>';
}
?>

				</ul>
				<div id="main">  
<div id="show_date"></div>  
<div id="show_time"></div>
 </div>	
		</div>
			
		</nav>
				<!--topbar结束-->
		<div class="container" style="margin-top:10vh; position: relative; z-index: 100;">
			<?php
echo $conf['home-title'] ?>

<?php
if ($conf['yan'] != 'false') {
    $filename = './assets/data/data.dat'; //随机一言文件路径
    if (file_exists($filename)) {
        $data = explode(PHP_EOL, file_get_contents($filename));
        $result = str_replace(array(
            "\r",
            "\n",
            "\r\n"
        ) , '', $data[array_rand($data) ]);
        echo '<p class="content">' . $result;
    }
}
?>
		</p>
			<!--搜索开始-->
			<div id="search" class="s-search">
				<div id="search-list" class="hide-type-list">
					<div class="search-group group-a s-current" style=" margin-top: 50px;">
						<ul class="search-type">
						<?php
$soulists = $DB->query("SELECT * FROM `lylme_sou` ORDER BY `lylme_sou`.`sou_order` ASC");
while ($soulist = $DB->fetch($soulists)) {
    if ($soulist["sou_st"] == 1) {
        echo '	<li>
								<input hidden=""  checked="" type="radio" name="type" id="type-' . $soulist["sou_alias"] . '" value="';
        if (checkmobile()&& $soulist["sou_waplink"] != NULL) {
            echo $soulist["sou_waplink"];
        } else {
            echo $soulist["sou_link"];
        }
        echo '"data-placeholder="' . $soulist["sou_hint"] . '">
								<label for="type-' . $soulist["sou_alias"] . '" style="font-weight:600">
								' . $soulist["sou_icon"] . '
									<span style="color:' . $soulist["sou_color"] . '">
										' . $soulist["sou_name"] . '
									</span>
								</label>
							</li>
							';
    }
}
?>						  
						</ul>
					</div>
				</div>
				<form action="https://www.baidu.com/s?wd=" method="get" target="_blank"
				id="super-search-fm">
					<input type="text" id="search-text" placeholder="百度一下，你就知道" style="outline:0"
					autocomplete="off">
					<button class="submit" type="submit">
						<svg style="width: 22px; height: 22px; margin: 0 20px 0 20px; color: #fff;"
						class="icon" aria-hidden="true">
							<use xlink:href="#icon-sousuo">
							</use>
						</svg>
						<span>
					</button>
				
					<ul id="word" style="display: none;">
					</ul>
				</form>
				<div class="set-check hidden-xs">
					<input type="checkbox" id="set-search-blank" class="bubble-3" autocomplete="off">
				</div>
			</div>

<?php
include "list.php";
include "footer.php";
?>
