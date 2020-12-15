<?php
	$dataFromFile = file_get_contents('cache/usercomments.txt');
if(empty($dataFromFile)){
	$comments = [];
	}
	else{
		$comments = json_decode($dataFromFile, true);
	}

if (isset($_POST['send'])){
	$error = '';
	if(empty($_POST['comment'])){
	$error = 'Поле комментария пустое, введите текст';
	}
	if(empty($_POST['email'])){
	$error = 'Введите Email';
	}
	elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   $error = "Адрес указан не правильно.";
	
}
	
	
	if (empty($error)){
	$filterComm = preg_replace('/#\w{1,}\#/', 'censored', $_POST['comment']);
		
			$result = ['email'=> $_POST['email'], 'comment'=>$filterComm];
			array_unshift($comments, $result);
			file_put_contents('cache/usercomments.txt', json_encode($comments));
			}
			else{ 
			echo $error . "<hr>";
			
			}}

 foreach ($comments as $comment){
	 
	echo 'Комментарий пользователя:'. htmlspecialchars($comment['comment']) . "<br>" . 'email:'. htmlspecialchars($comment['email']) . "<hr>";
 }

