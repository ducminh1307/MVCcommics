<?php
    function sendMail($user){

        require './app/PHPMailer/PHPMailer.php';
        require './app/PHPMailer/SMTP.php';
        require './app/PHPMailer/Exception.php';
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        
        try {
                                                
            $mail->isSMTP();     
            $mail->CharSet = 'utf8';                                       
            $mail->Host       = 'smtp.gmail.com;';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'truyentranhzuik20@gmail.com';                 
            $mail->Password   = 'minh1307';                        
            $mail->SMTPSecure = 'ssl';                         
            $mail->Port       = 465;  
        
            $mail->setFrom('truyentranhzuik20@gmail.com', 'truyentranhzui');           
            $mail->addAddress($user['email']);
            
            $mail->isHTML(true);                                  
            $mail->Subject = 'OTP đổi mật khẩu';
            $mail->Body=    '<h1 style="text-align: center">Xin chào '.$user['tenhienthi'].'!</h1>
                            <p style="text-align: center">OTP đổi mật khẩu của bạn là: <b style="color:red">'.$user['maxacthuc'].'</b></p>';
            $mail->smtpConnect( array(
                'ssl' => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
    }
    function sendOTP($email, $otp){

        require './app/PHPMailer/PHPMailer.php';
        require './app/PHPMailer/SMTP.php';
        require './app/PHPMailer/Exception.php';
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        
        try {
                                                
            $mail->isSMTP();     
            $mail->CharSet = 'utf8';                                       
            $mail->Host       = 'smtp.gmail.com;';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'truyentranhzuik20@gmail.com';                 
            $mail->Password   = 'minh1307';                        
            $mail->SMTPSecure = 'ssl';                         
            $mail->Port       = 465;  
        
            $mail->setFrom('truyentranhzuik20@gmail.com', 'truyentranhzui');           
            $mail->addAddress($email);
            
            $mail->isHTML(true);                                  
            $mail->Subject = 'OTP quên mật khẩu';
            $mail->Body=    '<h1 style="text-align: center">Xin chào độc giả!</h1>
                            <p style="text-align: center">OTP quên mật khẩu của bạn là: <b style="color:red">'.$otp.'</b></p>';
            $mail->smtpConnect( array(
                'ssl' => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
    }
?>