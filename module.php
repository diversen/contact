<?php

class contact {
    
    public $errors = array ();
    /**
     * validate form
     */
    public function validate(){

        if (isset($_POST['mail_form_submit'])) {
            if (empty($_POST['title'])) {
                $this->errors[] = lang::translate('Enter title');
            }
            if (empty($_POST['content'])) {
                $this->errors[] = lang::translate('Enter content');
            }
            if (!captcha::checkCaptcha($_POST['captcha'])) {
                $this->errors[] = lang::translate('Not a correct calculation of captcha');
            }
        }
    }
    public function indexAction () {
        
        template::setTitle('Contact');
        if (!session::checkAccess('user')) {
            return;
        }
        if (isset($_POST['mail_form_submit'])) {
            $this->validate();
            if (empty($this->errors)) {
                $_POST = html::specialDecode($_POST);
                $res = $this->sendMail ();
                if ($res) {
                    http::locationHeader('/contact/thanks');
                }
            }
        }
        
        $_POST = html::specialEncode($_POST);
        contact_views::form($this->errors);
    }
    
    public function thanksAction () {
        echo html::getHeadline('Message sent!');
        echo "Thanks for comment. We will return as soon as possible. ";
    }
    
        /**
     * send email
     * @return boolean $res
     */
    public function sendMail (){

        //$from = config::getMainIni('site_email');

        $title = $_POST['title'];
        $content = $_POST['content'];
        $to = config::getMainIni('system_email');

        $account = user::getAccount(session::getUserId());
        $reply_to = $account['email'];
        $res = cosMail::text(
            $to,
            $title,
            $content,
            null,
            $reply_to);
        return $res;
    }
}