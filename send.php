<?php

// bot id 456027644
//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "2104924397:AAGnPRV8mK89V7PLOMaZpouHuUlppHl0-n8";

//Сюда вставляем chat_id
$chat_id = "-686161989";
// "chat":{"id":-686161989

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $name = ($_POST['name']);
    $phone = ($_POST['phone']);
    $formMessage = ($_POST['formMessage']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Ім я:' => $name,
        'Телефон:' => $phone,
        'Коментар:' => $formMessage,
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        echo "Дякуємо! Ваша заявка прийнята. Скоро Вам зателефонують.";
    }

//А здесь сообщение об ошибке при отправке
    else {
        echo "Щось пішло не так. Спробуйте відправити форму ще раз.";
    }
}

?>