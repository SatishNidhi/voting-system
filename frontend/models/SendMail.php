<?php

namespace frontend\models;

use Yii;
use backend\models\Mail;
use yii\base\Model;

/**
 * Class ContactForm
 *
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @since 0.1.0
 */
class SendMail extends Model 
{

	public function sendEmail2admin($to, $message)
    {

        $mail = Mail::findOne('1');
        
        $to = $to;
        $subject = "Voting System";
        $message = $message;

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <'.$mail->from.'>' . "\r\n";
        $headers .= 'Cc: '. $mail->cc . "\r\n";
        $headers .= 'Bcc: '. $mail->bcc . "\r\n";

        return mail($to,$subject,$message,$headers);

    }

    public function sendEmail($to)
    {

        $to = $to;
        $subject = "Voting System";
        $message = "Congratulation !!! Your booking have been done.";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <'.$mail->from.'>' . "\r\n";
        $headers .= 'Cc: '. $mail->cc . "\r\n";
        $headers .= 'Bcc: '. $mail->bcc . "\r\n";

        return mail($to,$subject,$message,$headers);

    }

}

?>