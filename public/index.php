<?php
require_once '../vendor/autoload.php';

try {

// Create the Transport
    $transport = (new \Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
        ->setUsername('homeworkloft@mail.ru')// указать свою почту
        ->setPassword('loft123123') //указать свой пароль от почты
    ;

// Create the Mailer using your created Transport
    $mailer = new \Swift_Mailer($transport);

// Create a message
    $message = (new \Swift_Message('Wonderful Subject'))
        ->setFrom(['homeworkloft@mail.ru' => 'homeworkloft@mail.ru']) //почта отправителя
        ->setTo(['homeworkloft@mail.ru']) // почта получателя
        ->setBody('Here is the message itself')
    ;

// Send the message
    $result = $mailer->send($message);
    var_dump(['res' => $result]);
} catch (Exception $e) {
    var_dump($e->getMessage());
    echo '<pre>' . print_r($e->getTrace(), 1);
}