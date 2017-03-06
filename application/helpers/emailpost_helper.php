<?php 

function mailpost_kirim($judul,$admin_user,$isi,$user_post)
	{

		// foreach ($user_recepients as $key => $value) {
		// 	echo $value->username."<br>";
		// }
		// echo $user_post;
		// exit();

		$mail = new PHPMailer;
		$mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ),
            );
		$mail->isSMTP();
		$mail->SMTPDebug = 1;
		$mail->Debugoutput = 'html';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587; 
		$mail->SMTPAuth = true;
		$mail->Username = "cep.itsuport@gmail.com";
		$mail->Password = "margasatwa111";
		$mail->setFrom('cep.itsuport@gmail.com','IT Suport CEP');
		foreach ($admin_user as $key => $value) {
				$mail->addAddress($value->email, $value->username);
		}

		$mail->Subject = "Notifikasi Aplikasi IT Suport CEP";
		$mail->msgHTML('<h2><b>Sebuah issue bru saja ditambahkan</b></h2><p><b>'.$user_post.'</b> telah menambahkan issue baru <b>"'.$judul.'"</b> di Aplikasi Suport IT CEP</p><br><p>"'.$isi.'"</p>');
		if (!$mail->send()) {
		    return false;
		} else {
		    return true;
		}
	}



 ?>