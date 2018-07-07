<?php
$id=$_GET['id'];
$message=$_GET['message'];
    $url = 'https://api.vk.com/method/messages.send';
if(isset($_GET['id'])){
  $params = array(
'user_id' => $id,    // Кому отправляем
        'message' => $message,   // Что отправляем
'access_token' => '',  // access_token можно вбить хардкодом, если работа будет идти из под одного юзера
        'v' => '5.37',
);
}

    // В $result вернется id отправленного сообщения
    $result = file_get_contents($url, false, stream_context_create(array(
        'http' => array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($params)
        )
    )));
?> 
<html>
 <head>  
<title> 
</title> 
</head>
 <body> 
<form action="mesages.php" method="get">
Если у пользователя id то пишем просто цифры с id<br>
<input name="id" value="id контакта"><br>
         <input name="message" value="Сообщение">
         <input type="submit" value="Отправитб">
     </form>
</body>
 </html>
