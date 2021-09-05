<?php
/**
 * @link http://www.writesdown.com/
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Class ContactForm
 *
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @since 0.1.0
 */
class ContactForm extends Model
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $phone;
    /**
     * @var string
     */
    public $subject;
    /**
     * @var string
     */
    public $body;
    /**
     * @var
     */
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'phone', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail2admin($email, $subject, $body, $sendername, $senderemail)
    {
        $to = $email;
        $subject = $subject;

        $message = "
            <html>
                <head>
                    <title></title>
                </head>
                <body>
                    <p>".$body."</p>
                    <h4>Sender Detail: </h4>
                    <p><b>Name: </b> ".$sendername."<br><b>Email: </b> ".$senderemail."
                </body>
            </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";

        return mail($to,$subject,$message,$headers);
    }

    public function sendEmail($email)
    {
        $to = $email;
        $subject = "MG MOTOR";

        $message = '
            <!DOCTYPE html>
                <html>
                <head>
                    <title></title>
                    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
                    <style type="text/css">
                        .box {
                            margin: 5%;
                            padding: 2%;
                            font-family: "PT Sans Narrow", sans-serif;
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                        }
                    </style>
                </head>
                <body>

                <div class="box">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Hello,</h3>
                            <p>Thank you for contacting us. We will soon reply to you.</p><br>
                            <b>MG Motors Nepal</b><br>
                            Jwagal, Latitpur, Nepal<br>
                            01-4415369, 9841234567<br>
                            mgmotornepal@gmail.com<br>
                        </div>
                    </div>
                </div>

                </body>
                </html>
        ';

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";

        return mail($to,$subject,$message,$headers);
    }
}
