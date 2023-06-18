<?php

use PhpMailer\PhpMailer\PhpMailer;
use PhpMailer\PhpMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PhpMailer.php';

$mail = new PhpMailer(true);
$mail -> CharSet = 'UTF-8';
$mail -> IsHTML(true);

//От кого письмо
$mail -> setForm('info@example.com', 'От меня');
//Кому отправить
$mail -> addAddress('example@example.com');
//Тема письма
$mail -> Subject = 'Привет! Это пробное письмо';

//Рука
$hand = "Правая";
if($_POST['hand'] == "left") {
    $hand = "Левая";
}

//Тело письма
$body = '<h1>Встречайте письмо</h1>';

if(trim(empty($_POST['name']))) {
    $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }
if(trim(empty($_POST['email']))) {
        $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
    };
 if(trim(empty($_POST['hand']))) {
        $body.='<p><strong>Рука:</strong> '.$_POST['hand'].'</p>';
    }
  if(trim(empty($_POST['age']))) {
          $body.='<p><strong>Возраст:</strong> '.$_POST['age'].'</p>';
    }
        if(trim(empty($_POST['message']))) {
            $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
    }

    //Прикрепить файл
    if(!empty($_FILES['image']['tmp_name'])) {
        //Путь загрузки файла
        $filePath = __DIR__ . "/files" . $_FILES['image']['name'];
        //грузим файл
        if(copy($_FILES['image']['tmp_name'],$filePath)) {
            $fileAttach = $filePath;
            $body.= '<p><strong>Фото в приложении</strong>';
        }
    }

    $mail -> Body = $body;
    
    //Отправляем
    if(!$mail->send()) {
        $message = "Ошибка";
    }else {
        $message = 'Данные отправлены';
    }

    $response = ['message' -> $message];

    header('Content-tupe: application/json');
    echo json_encode($response);