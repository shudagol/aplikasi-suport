<?php 

function mail_kirim($username_issue,$judul,$alamat,$username_comm)
	{
		
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
		$mail->addAddress($alamat, $username_issue);
		$mail->Subject = "Notifikasi Aplikasi IT Suport CEP";
		$mail->msgHTML('<h1>Hai <b>'.$username_issue.'</b></h1><p>'.$username_comm.' telah menambahkan komentar pada post <b>"'.$judul.'"</b> di Aplikasi Suport IT CEP</p>');
		if (!$mail->send()) {
		    return false;
		} else {
		    return true;
		}
	}



 ?>