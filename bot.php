<?php 

if (!isset($_REQUEST)) { 
  return; 
} 

//Строка для подтверждения адреса сервера из настроек Callback API 

//Ключ доступа сообщества 
$token='3e233feb0e841a96be8b6f153ec7f64e67c7e832d141c35b539e0282adbf2d1c4fbb9aebb741eda0b8d89';
// VK API как сделать бот в вк готовый php скрипт бот вконтакте бот сообщений группы вконтакте
$data = json_decode(file_get_contents('php://input'));
switch ($data->type){
case 'message_new':
$user_id = $data->object->user_id;
$user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&v=5.0"));
$user_name = $user_info->response[0]->first_name;
$message = $data->object->body;
include"http://test.clic-club.ga/Vk/otvet.php";
include "meny.php";
foreach($messages_array as $k => $v){
if($message == $k){$otwet = $v;}
}
$request_params =array(
'message' => $otwet,
'user_id' => $user_id,
'access_token' => $token,
'v' => '5.0'
);
$get_params = http_build_query($request_params);
file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
echo('ok');
break;
return false;
}
?>
