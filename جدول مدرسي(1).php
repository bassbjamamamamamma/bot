<?php

// By matthew

// My Ch m1_m2s

ob_start();

define('API_KEY','7113518469:AAGS4uFqw29MoAeVcapLc8LceM7MbrNanNw');

function bot($method,$datas=[]){

    $url = 'https://api.telegram.org/bot'.API_KEY.'/'.$method;

$ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);

    $res = curl_exec($ch);

    if(curl_error($ch)){

        var_dump(curl_error($ch));

    }else{

        return json_decode($res);

    }

}

$update = json_decode(file_get_contents('php://input'));

$message = $update->message;

$chat_id = $message->chat->id;

$text = $message->text;

$chat_id2 = $update->callback_query->message->chat->id;

$message_id = $update->callback_query->message->message_id;
$name = $update->message->from->first_name;
$data = $update->callback_query->data;

 function re($d,$f,$g){

 return str_replace($d, $f, $g);

}







if($text == "/start"){

bot('sendMessage',[

'chat_id'=>$chat_id, 

'text'=>"
💡- اهــْـِْـْْلا بك عــْـِْـْْزيــْـِْـْْزي $name فــْـِْـْْي بوت الجــْـِْـْْدول
💡-  اكتب عرض الجدول لعــْـْْرض الجــدول
〰〰〰〰〰〰〰〰〰〰
🎊- المطور:- محــُ̲مــٰཻـد˛ قــٰཻـيس
🎊- قناة المطور:- @M1_M2S",

'reply_to_message_id'=>$message->message_id, 

]);

} 







if($text == 'عرض الجدول'){

bot('sendMessage',[

'chat_id'=>$chat_id,

'text'=>'
😻- اهَــْـِْـْْـِلاّ بــْـِْـْْك فــْـِْـْْي بوت الجــْـِْـْْدول
😻- اخــْـِْـْْتر احــْـِْـْْد الايــْـِْـْْام👇🏾👇🏾
😻- مــْـِْـْْطور البــْـِْـْْوت:- @T7TT1',

 'reply_to_message_id' =>$message->message_id, 

'reply_markup'=>json_encode([

'inline_keyboard'=>[

[

['text'=>'الاحد','callback_data'=>'m1']

,['text'=>'الاثنين','callback_data'=>'m2']

,['text'=>'الثلاثاء','callback_data'=>'m3']



]



,[

    ['text'=>'الاربعاء','callback_data'=>'m4']

,['text'=>'الخميس','callback_data'=>'m5']

]

]

])

]);

}





if($data == 'm1'){

bot('sendmessage',[

'chat_id'=>$chat_id2,

'message_id'=>$message_id,

"text"=>'- 
الدرس الآۆلْ/ادب
الدرس الثاني/حاسوب
الدرس الثالث/انكلش
الدرس الرابع/احياء
الدرس الخامس/كيمياء
الدرس السادس/رياضيات'

]);
}

if($data == 'm2'){

bot('sendmessage',[

'chat_id'=>$chat_id2,

'message_id'=>$message_id,

"text"=>'
الدرس الآۆلْ/احياء
الدرس الثاني/فيزياء
الدرس الثالث/عربي
الدرس الرابع/انكلش
الدرس الخامس/ رياضيات
الدرس السادس/رياضيات'

]);

}



if($data == 'm3'){

bot('sendmessage',[

'chat_id'=>$chat_id2,

'message_id'=>$message_id,

"text"=>'
الدرس الآۆلْ/عربي
الدرس الثاني/انكلش
الدرس الثالث/اسلاميه
الدرس الرابع/فيزياء
الدرس الخامس/كيمياء'

]);

}

if($data == 'm4'){

bot('sendmessage',[

'chat_id'=>$chat_id2,

'message_id'=>$message_id,

"text"=>'
الدرس الآۆلْ/فيزياء
الدرس الثاني/انكلش
الدرس الثالث/احياء
الدرس الرابع/ادب
الدرس الخامس رياضيات
الدرس السادس/رياضه'

]);

}



if($data == 'm5'){

bot('sendmessage',[

'chat_id'=>$chat_id2,

'message_id'=>$message_id,

"text"=>'
الدرس الآۆلْ/انكلش
الدرس الثاني/اسلاميه
الدرس الثالث/رياضيات
الدرس الرابع/كيمياء
الدرس الخامس/عربي'

]);

}
//mattheo
//M1_m2s
$sudo = 201230149;
$get = explode("\n", file_get_contents('memberbot.txt'));
if($text == '/start' and !in_array($chat_id, $get)){
file_put_contents('memberbot.txt',"\n" . $chat_id, FILE_APPEND);
}
if($text == '/users' and $id == $sudo){
 $count = count($get);
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'parse_mode'=>'markdown',
    'text'=>"Your Bot Member : $count",
  ]);
  }
$bc = explode("/bc", $text);
if($bc and $id == $sudo){
for($y=0;$y<count($get); $y++){
bot('sendMessage', [
'chat_id'=>$get[$y],
'text'=>"$bc[1]",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}
}