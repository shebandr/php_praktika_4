<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>постинг</title>
    <link rel="stylesheet" type="text/css" href="styles.css" >
    <link rel="stylesheet" type="text/css" href="reset.css" >
</head>
<body>

<div id='inp_php'>
<?php
// код регистрации и проверки получения логина
$type_data = $_POST['type_data'];

   if (($type_data == 'reg')){
   
   echo 'очко';
    $userFIO = $_POST['FIO'];
    $data_dr = $_POST['data_dr'];
    $gorod = $_POST['gorod'];
    $login = $_POST['login'];
    $password = $_POST['password'];

if(empty($password)){
    exit("<div id=\"error\"><p>Вы не ввели пароль</p></div>"); };
if(strlen($password) > 37){
    exit("<div id=\"error\"><p>пароль слишком длинный</p></div>"); };
if(strlen($password) < 8){
    exit("<div id=\"error\"><p>пароль слишком короткий</p></div>"); };



if(empty($userFIO)){
    exit("<div id=\"error\"><p>Вы не ввели свое имя</p></div>"); };

if(empty($data_dr)){
      exit("<div id=\"error\"><p>Вы не ввели свою дату рождения </p></div>"); };

if(empty($gorod)){
      exit("<div id=\"error\"><p>Вы не ввели свой город </p></div>"); };

if(empty($login)){
      exit("<div id=\"error\"><p>Вы не ввели свой логин </p></div>"); };
  
$BDC = mysqli_connect("localhost", "root", "");      
$BD = "CREATE DATABASE IF NOT EXISTS baza";

if(!mysqli_query($BDC,$BD)){
    exit("<div id=\"error\">что-то пошло не по плану, перезагрузите страницу</div>");
};
      
$createTable = "CREATE TABLE IF NOT EXISTS baza.users(
        `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `userFIO` TEXT NOT NULL,
        `data_dr` DATE NOT NULL,
        `gorod` TEXT NOT NULL,
        `login` TEXT NOT NULL,
        `password` TEXT NOT NULL
)";

 $login_chek = "SELECT baza.users.login FROM baza.users";
 $result = mysqli_query($BDC, $login_chek) or die("<div id=\"error\"> что-то со вносом логина в базу </div>"); 
 if($result) {

 while ($row = mysqli_fetch_row($result)) {
     if($row[0]==$login)(die("<div id=\"error\">такой логин уже занят</div>"));

 }

 };

if(!mysqli_query($BDC,$createTable)){
    exit("<div id=\"error\">что-то с таблицей, перезагрузите страницу</div>");
};

      
$dannie = "INSERT INTO baza.users
    (userFIO, data_dr, gorod, login, password)
    VALUES('$userFIO', '$data_dr', '$gorod','$login','$password')";
    if(!mysqli_query($BDC,$dannie)){
        exit("<div id=\"error\">Ошибка связанная с заполнением данных</div>");
    };



 echo "<div id=\"inp_msg\">поздравляю, вы зарегистрированны</div>";
}
// до этого комментария идет код регистрации, дальше идет код логина
if (($type_data == 'login')){
$login = $_POST['login'];
$password = $_POST['password'];

$BDC = mysqli_connect("localhost", "root", "");      
$BD = "CREATE DATABASE IF NOT EXISTS baza";

if(!mysqli_query($BDC,$BD)){
    exit("<div id=\"error\">что-то пошло не по плану, перезагрузите страницу</div>");
};

$login_chek2 = "SELECT baza.users.login FROM baza.users";
 $result1 = mysqli_query($BDC, $login_chek2) or die("<div id=\"error\"> произошла ошибка во время проверки логина  </div>"); 

 while ($row2 = mysqli_fetch_row($result1)) {
   

    if($row2[0]==$login)break;

 };
 
     $password_chek ="SELECT baza.users.password FROM baza.users WHERE baza.users.login = $login";
     $result2 = mysqli_query($BDC, $login_chek2) or die("<div id=\"error\"> произошла ошибка во время получения пароля из базы данных </div>"); 
     $row2 = mysqli_fetch_row($result2);
     if($row[0]==$password)(print_r("<div id=\"inp_msg\">вход успешно завершен</div>"));

};

//тут кончается код логинки, дальше код вноса сообщения и тегов в базу


if ($type_data == 'work'){
    $text_msg = $_POST['text_of_mesage'];
    if(empty($text_msg)){
        exit('<div id=\"error\">нет текста поста</div>');
    };

$BDC = mysqli_connect("localhost", "root", "");      
$BD = "CREATE DATABASE IF NOT EXISTS baza";

if(!mysqli_query($BDC,$BD)){
    exit("<div id=\"error\">что-то пошло не по плану, перезагрузите страницу</div>");
};

$createTable2 = "CREATE TABLE IF NOT EXISTS baza.tags(
    `id_tag` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tags` TEXT NOT NULL
)";

if(!mysqli_query($BDC,$createTable2)){
    exit("<div id=\"error\">что-то с таблицей, перезагрузите страницу</div>");
};
$createTable3 = "CREATE TABLE IF NOT EXISTS baza.msg(
    `id_msg` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `text_msg` TEXT NOT NULL
)";
if(!mysqli_query($BDC,$createTable3)){
    exit("<div id=\"error\">что-то с таблицей, перезагрузите страницу</div>");
};
$dannie3 = "INSERT INTO baza.msg
(  text_msg)
VALUES('$text_msg')";
if(!mysqli_query($BDC,$dannie3)){
exit("<div id=\"error\">Ошибка связанная с заполнением данных3</div>");
};

$login = 'ыва';
$id_user = mysqli_query($BDC,"SELECT baza.users.user_id FROM baza.users WHERE baza.users.login = '$login'");
$id_user2 = mysqli_fetch_array($id_user)[0];



 for($z =1;$z < (count($_POST))-1;$z++){
    $tag = $_POST["tag$z"];

if($tag != ''){
    $dannie2 = "INSERT INTO baza.tags
    (  tags)
    VALUES('$tag')";
    if(!mysqli_query($BDC,$dannie2)){
    exit("<div id=\"error\">Ошибка связанная с заполнением данных2</div>");
}}
$createTable4 = "CREATE TABLE IF NOT EXISTS baza.tags_and_msg(
    `id_connect` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_user` TEXT NOT NULL, 
    `id_msg` TEXT NOT NULL,
    `id_tag` TEXT NOT NULL
)";
if(!mysqli_query($BDC,$createTable4)){
    exit("<div id=\"error\">Ошибка связанная с созданием таблицы 4</div>");
};



$idmsg = mysqli_query($BDC,"SELECT baza.msg.id_msg FROM baza.msg WHERE baza.msg.text_msg = '$text_msg'");
$idmsg2 = mysqli_fetch_array($idmsg)[0];



$idtag = mysqli_query($BDC,"SELECT baza.tags.id_tag FROM baza.tags WHERE baza.tags.tags = '$tag'");
$idtag2 = mysqli_fetch_array($idtag)[0];


$msgtagsinsrt = "INSERT INTO baza.tags_and_msg
(id_user, id_msg, id_tag)
 VALUES($id_user2, $idmsg2, $idtag2)";
    if(!mysqli_query($BDC,$msgtagsinsrt)){
        exit("<div id=\"error\">Ошибка связанная с заполнением данных в таблице связи тегов и сообщений</div>");
    };
echo "<div id=\"inp_msg\">тег номер $z<p>$tag</p></div>";
};
echo "<div id=\"inp_msg\">текст сообщения:<p>$text_msg</p></div>";
};



?>
</div>


    
</body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,0L14.1,32C28.2,64,56,128,85,149.3C112.9,171,141,149,169,165.3C197.6,181,226,235,254,256C282.4,277,311,267,339,266.7C367.1,267,395,277,424,288C451.8,299,480,309,508,288C536.5,267,565,213,593,192C621.2,171,649,181,678,176C705.9,171,734,149,762,138.7C790.6,128,819,128,847,122.7C875.3,117,904,107,932,128C960,149,988,203,1016,234.7C1044.7,267,1073,277,1101,261.3C1129.4,245,1158,203,1186,197.3C1214.1,192,1242,224,1271,218.7C1298.8,213,1327,171,1355,138.7C1383.5,107,1412,85,1426,74.7L1440,64L1440,0L1425.9,0C1411.8,0,1384,0,1355,0C1327.1,0,1299,0,1271,0C1242.4,0,1214,0,1186,0C1157.6,0,1129,0,1101,0C1072.9,0,1045,0,1016,0C988.2,0,960,0,932,0C903.5,0,875,0,847,0C818.8,0,791,0,762,0C734.1,0,706,0,678,0C649.4,0,621,0,593,0C564.7,0,536,0,508,0C480,0,452,0,424,0C395.3,0,367,0,339,0C310.6,0,282,0,254,0C225.9,0,198,0,169,0C141.2,0,113,0,85,0C56.5,0,28,0,14,0L0,0Z"></path></svg>
</html><form method="post"  action="action.php" enctype = multipart/form-data>

<div class='okno_vvoda2'>


    <input type='text' value="work" id='display_none' name="type_data">
    <p><input type='text'  name='text_of_mesage' > текст сообщения</p>
    <div id='tags'>
    <p><button type="button" id='buttonz'>добавить тег</button></p> 
       
    <p><button type="submit" id='buttonr'>отправить пост</button></p>
    
</div>
</div>
<script src='scripts_for_messages.js'></script>
</form>
</body>
</html>