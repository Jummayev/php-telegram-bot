<?php
	use Database\DatabaseConnection;

	const BOT_TOKEN = '5316514399:AAGtzidXFV6bs3tDy8r3yOwGA4jmbb4lj38';
	/**
	 * @param $method
	 * @param $data
	 * @return mixed|void
	 * @throws \Exception
	 */
	function bot($method,$data=[]){
		if ( !BOT_TOKEN){
			throw new \RuntimeException("\n========== ".\date('Y-m-d h:i:s a')." ========== \n Please enter your bot token");
		}

	    $url = "https://api.telegram.org/bot".BOT_TOKEN."/".$method;
	    $ch = curl_init();
	    curl_setopt($ch,CURLOPT_URL,$url);
	    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
	    $res = curl_exec($ch);
	    if(curl_error($ch)){
	        var_dump(curl_error($ch));
	    }else{
	        return json_decode($res, FALSE);
	    }
	}

	$update = json_decode(file_get_contents('php://input'), FALSE);

	$message = $update->message;
	$chat_id = $message->chat->id;

	$showData = new SelectTable();
	$lang = 'en';
	try {
		$showUser = $showData->showData('users', "chat_id", $chat_id);
		if ($showUser) {
			$lang = $showUser['lang'];
		}
	} catch (Exception $e) {
		$date = new DateTime(NULL, new DateTimeZone('Asia/Tashkent'));
		error_log("\n========== ".$date->format('Y-m-d H:i:s')." ========== \nDatabase Connection Failed\n".$e->getMessage()."\n", 3, 'errors.log');
	}
	include('langs/'. $lang . '.php');

	try {
		bot('sendmessage', [
			'chat_id' => 1157219338,
			'text' => $langArray['welcome'],
		]);
	}catch (Exception  $e){
		error_log($e->getMessage(), 3, 'errors.log');
	}

	//	$mid = $message->message_id;
//	$tx = $message->text;
//	$uid = $message->from->id;
//	$rname = $message->reply_to_message->from->first_name;
//	$rmid = $message->reply_to_message->message_id;
//	$mention = $message->entities[0]->type;
//	$ty = $message->chat->type;
//	$title = $message->chat->title;
//	$repid = $message->reply_to_message->from->id;
//	$gruppa = file_get_contents('gruppa.db');
//	$lichka = file_get_contents('lichka.db');
//	$new = $message->new_chat_member;
//	$left = $message->left_chat_member;
//	$for = $message->forward_from;
//	$forx = $message->forward_from_chat;
//	$ssl = file_get_contents("data/$cid/ssilka.db");
//	$stic = file_get_contents("data/$cid/stic.db");
//	$ras = file_get_contents("data/$cid/rasm.db");
//	$join = file_get_contents("data/$cid/join.db");
//	$gif = file_get_contents("data/$cid/gif.db");
//	$ovoz = file_get_contents("data/$cid/ovoz.db");
//	$sticker = $message->sticker;
//	$rasm = $message->photo;
//	$animation = $message->animation;
//	$voice = $message->voice;
//	$replytx = $message->reply_to_message->text;
//	$url = $message->entities[0]->type;
//	$user = $message->entities[1]->type;
//	$msgs = json_decode(file_get_contents('msgs.json'), TRUE);
//	$type = $message->chat->type;
//	$text = $message->text;

//	if ($type == 'supergroup' or $type == 'group') {
//		$ex = $msgs[$text];
//		$ex = explode('|', $ex);
//		$txt = $ex[rand(0, count($ex) - 1)];
//		bot('sendmessage', [
//			'chat_id' => $message->chat->id,
//			'text' => "$txt",
//			'reply_to_message_id' => $mid
//		]);
//	}
//
//	if ($replytx) {
//		if ($type == 'supergroup' or $type == 'group') {
//			$replytx = $message->reply_to_message->text;
//			if (strpos($msgs[$replytx], "$text") !== FALSE) {
//			} else {
//				$msgs[$replytx] = "$text|$msgs[$replytx]";
//				file_put_contents('msgs.json', json_encode($msgs));
//			}
//
//		}
//	}
//	if ($text == '/del_baza') {
//		unlink('msgs.json');
//		bot('sendmessage', [
//			'chat_id' => $cid,
//			'parse_mode' => 'markdown',
//			'text' => '*🗑Baza Tozalandi*'
//		]);
//	}
//
//	if ($text == '/document') {
//		bot('senddocument', [
//			'chat_id' => $message->chat->id,
//			'document' => new CURLFile('msgs.json')
//		]);
//	}
