<?php

class contact_views {
    
    
    
    public static function form ($errors = array ()) { 




echo html::getHeadline('Send us a message');
$user = user::getAccount(session::getUserId());



if (!empty($errors)) {
    echo html::getErrors($errors);
}

?>
<form action="" method="post">
<fieldset><legend><?=lang::translate('Fill out the contact form')?></legend>
<label for="title">* <?=lang::translate('Title')?></label><br />
<input type="text" name="title" size="<?=HTML_FORM_TEXT_SIZE ?>" value="<?=@$_POST['title']?>" />
<br />
<label for="title">* <?=lang::translate('Email')?></label><br />
<input type="text" name="email" size="<?=HTML_FORM_TEXT_SIZE ?>" value="<?=$user['email']?>" disabled />
<br />
<?php

echo html::labelClean('captcha', captcha::createCaptcha());
echo html::textClean('captcha');

    ?>
<label for="content">* <?=lang::translate('Enter your message')?></label><br />
<textarea name="content" cols="<?=HTML_FORM_TEXTAREA_WT ?>" rows="<?=HTML_FORM_TEXTAREA_HT ?>" ><?=@$_POST['content']?></textarea>
<label for="submit">&nbsp;</label>
<br />
<input type="submit" name="mail_form_submit" value="<?=lang::translate('Submit')?>" />
<br />
</fieldset>

</form>
 <?php       
    }
}
