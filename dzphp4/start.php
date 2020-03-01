<?php

$BDC = mysqli_connect("localhost", "root", "");      
$BD = "CREATE DATABASE IF NOT EXISTS baza";

if(!mysqli_query($BDC,$BD)){
    exit("<div id=\"error\" ".$style_error.">что-то пошло не по плану, перезагрузите страницу</div>");
};


$createTable = "CREATE TABLE IF NOT EXISTS baza.users(
    `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `userFIO` TEXT NOT NULL,
    `data_dr` DATE NOT NULL,
    `gorod` TEXT NOT NULL,
    `login` TEXT NOT NULL,
    `password` TEXT NOT NULL,
    `mail` TEXT NOT NULL
)";

if(!mysqli_query($BDC,$createTable)){
    exit("<div id=\"error\" ".$style_error.">что-то с таблицей, перезагрузите страницу</div>");
};


$dannie = "INSERT INTO baza.users
    (userFIO, data_dr, gorod, login, password, mail)
    VALUES('noname', '1970-01-01', 'no','1','123456789','mail')";
    if(!mysqli_query($BDC,$dannie)){
        exit("<div id=\"error\" ".$style_error.">Ошибка связанная с заполнением данных</div>");
    };
echo "создание таблицы прошло успешно"

?>