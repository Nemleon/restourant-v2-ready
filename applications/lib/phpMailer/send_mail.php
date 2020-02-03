<?php

namespace applications\lib\phpMailer;

use applications\lib;

class send_mail 
{
	static function send ($bodyEdits, $type) 
	{	
		//$numOrder - будет айди заказа/отзыва, помещенный в шапку сообщения
		//Не хотел, пока, запариваться с бд. Можно реализовать с записью заказов и отзывов в бд, но для упрощения будет так.
		$numOrder = random_int(10000, 20000);

		$mail = new lib\phpMailer\PHPMailer();

		try {
			if ($type == 'Заказ') {
				
				$data = 'В обработке';
				
			} elseif ($type == 'Отзыв') {
				
				$data = 'Отправлено';
				
			}
			
			$mail->isSMTP();
			$mail->CharSet = "UTF-8";
			$mail->SMTPAuth   = true;

			// Настройки вашей почты
			$mail->Host       =  // SMTP сервера GMAIL
			$mail->Username   = // Логин на почте
			$mail->Password   = // Пароль на почте
			$mail->SMTPSecure = 'ssl';
			$mail->Port       = 465;
			$mail->setFrom(); // Адрес самой почты и имя отправителя

			// Получатель письма
			//$mail->addAddress('youremail@gmail.com');

			// Само письмо

			$mail->isHTML(true);
			if ($type == 'Заказ') {
				
					
				
				if(count($bodyEdits) == 4) {
					
					$file = 'applications/lib/textTemplates/orderForSelf.txt';
					$draftBody = file_get_contents($file);
					$search = array ('NAME', 'ORDER', 'SUM', 'NUMBER');
					
				} else {
					
					$file = 'applications/lib/textTemplates/orderForDelivery.txt';
					$draftBody = file_get_contents($file);
					$search = array ('NAME', 'ORDER', 'SUM', 'NUMBER', 'STREET', 'HOUSE', 'APARTMENT', 'ENTRANCE');
					
				}
				
				
				
				$replace = $bodyEdits;
				$body = str_replace($search, $replace, $draftBody);
				
				$mail->Subject = 'Заказ №' . $numOrder;
				$mail->Body    = $body;

			} elseif ($type == 'Отзыв') {
				
				$file = 'applications/lib/textTemplates/feedback.txt';	
				$draftBody = file_get_contents($file);
				
				$search = array ('NAME', 'EMAIL', 'TEXT');
				$replace = $bodyEdits;
				$body = str_replace($search, $replace, $draftBody);
				
				$mail->Subject = 'Отзыв №' . $numOrder;
				$mail->Body    = $body;

			}
			// Проверяем отравленность сообщения
			 if ($mail->send()) 
			 {
				return $data;
				
			} else {
				
				if ($type == 'Заказ') {
					
					$textErr = file_get_contents('applications/lib/textTemplates/errSendOrder.txt');
					throw new lib\phpMailer\Exception($textErr);
					
				} elseif ($type == 'Отзыв') {
					
					$textErr = file_get_contents('applications/lib/textTemplates/errSendFeedback.txt');
					throw new lib\phpMailer\Exception($textErr);
					
				}
				
			}
		} catch (lib\phpMailer\Exception $e) {
			
			$time = "\n" . date('Y-m-d H:i:s (T)') . "\n";
			$error = $mail->ErrorInfo;
			lib\errors_log\writeErrors::write_errors($time, $error);
			$data = $e->getMessage();
			return $data;
			
		}
	}
}