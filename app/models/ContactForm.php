<?php
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

    class ContactForm {

        private $name;
        private $email;
        private $age;
        private $message;

        public function setData($name, $email, $age, $message) {
            $this->name = $name;
            $this->email = $email;
            $this->age = $age;
            $this->message = $message;
        }

        public function validForm() {
            if(strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(!is_numeric($this->age) || $this->age <= 0 || $this->age > 90)
                return "Вы ввели не возраст";
            else if(strlen($this->message) < 5)
                return "Сообщение слишком короткое";
            else
                return "Верно";
        }

        public function mail() {

            $mailBody = 'Имя: ' . $this->name . '<br>Возраст: ' . $this->age . '<br>Сообщение: ' . $this->message;
                      
            $mail = new PHPMailer(true);

            define('SMTP_SERVER', 'smtp.geotek24.ru');
            define('SMTP_PORT', 25);
            define('SMTP_USERNAME', 'info');
            define('SMTP_PASSWORD', '5LlqB7L5TY14');
            define('SMTP_SENT_FROM', 'info@geotek24.ru');
            define('SMTP_SENT_TO', $this->email);  // Please type your mail
            define('SMTP_SENT_NAME', $this->name);  // Please type your name

            

            try {
                //Server settings
                $mail->isSMTP();                                       // Send using SMTP
                $mail->Host       = SMTP_SERVER;                       // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                              // Enable SMTP authentication
                $mail->Username   = SMTP_USERNAME;                     // SMTP username
                $mail->Password   = SMTP_PASSWORD;                     // SMTP password
                $mail->Port       = SMTP_PORT;                         // TCP port to connect to

                //Recipients
                $mail->setFrom(SMTP_SENT_FROM, 'Mail from site');
                $mail->addAddress(SMTP_SENT_TO, SMTP_SENT_NAME);    
                $mail->addReplyTo(SMTP_SENT_FROM, 'Information');
                $mail->addCC('melik.ramin@gmail.com');

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'New request';
                $mail->Body    = $mailBody;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                return "Сообщение успешно отправлено";
            } catch (Exception $e) {
                return "Сообщение было не отправлено. Mailer Error: {$mail->ErrorInfo}";
            }
            
            
            
            
            
            
        }




    }