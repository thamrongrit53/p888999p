<?php
   $accessToken = "B56+JXIosMFlP8aLyUw3hq1DEQGoEQcnKx3GKi0zhCwafgCyuiOWPiK/6SvUnMD1SCMnZIgVykAm+co7h7m4ZVTNukGksmfW7NMUaZkmtm4YkZX1PSlhMjjDyRkiyraahTkTKhp9yNaEgM8XKfbynAdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
$content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
$arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";

//    $message = $arrayJson['events'][0]['message']['text'];
//    if(isset($arrayJson['events'][0]['source']['groupId'])){
//       $id = $arrayJson['events'][0]['source']['groupId'];
//    }
//    else if(isset($arrayJson['events'][0]['source']['room'])){
//       $id = $arrayJson['events'][0]['source']['room'];
//    }
$jsonFlex ={"to": "C40a0888cfb8018cf6263bd8529e9828d",
  "messages": [
    {
      "type": "flex",
      "altText": "This is a Flex Message",
      "contents": {
        "type": "bubble",
        "body": {
          "type": "box",
          "layout": "horizontal",
          "contents": [
            {
              "type": "text",
              "text": "Hello,"
            },
            {
              "type": "text",
              "text": "World!"
            }
          ]
        }
      }
    }
  ]
};
      // $arrayPostData['to'] = "C40a0888cfb8018cf6263bd8529e9828d";
      // $arrayPostData['messages'][0]['type'] =$jsonFlex;
     

      pushMsg($arrayHeader,$jsonFlex);
 
function pushMsg($arrayHeader,$jsonFlex){
      $strUrl = "https://api.line.me/v2/bot/message/push";
$ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonFlex);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
exit;
?>
