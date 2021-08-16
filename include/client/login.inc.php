<?php
if(!defined('OSTCLIENTINC')) die('Access Denied');

$email=Format::input($_POST['luser']?:$_GET['e']);
$passwd=Format::input($_POST['lpasswd']?:$_GET['t']);

$content = Page::lookupByType('banner-client');

if ($content) {
    list($title, $body) = $ost->replaceTemplateVariables(
        array($content->getLocalName(), $content->getLocalBody()));
} else {
    $title = __('Sign In');
    $body = __('To better serve you, we encourage you to login with your USEK email address we have on record.');
}

?>
<h1><?php echo Format::display($title); ?></h1>
<p><?php echo Format::display($body); ?></p>
<form action="login.php" method="post" id="clientLogin">
    <?php csrf_token(); ?>
<div style="display:table-row">
    <div class="login-box">
    <strong><?php echo Format::htmlchars($errors['login']); ?></strong>
    <div>
        <input id="username" placeholder="<?php echo __('Email or Username'); ?>" type="text" name="luser" size="30" value="<?php echo $email; ?>" class="nowarn">
    </div>
    <div>
        <input id="passwd" placeholder="<?php echo __('Password'); ?>" type="password" name="lpasswd" size="30" value="<?php echo $passwd; ?>" class="nowarn"></td>
    </div>
    <p>
        <input class="btn" type="submit" value="<?php echo __('Sign In'); ?>">
        <?php if ($suggest_pwreset) { ?>
                <a style="padding-top:4px;display:inline-block;" href="pwreset.php"><?php echo __('Forgot My Password'); ?></a>
        <?php } ?>
        <!-- USEK -->
        <div>
            <b><?php echo __("I'm an agent"); ?></b> —
            <a href="<?php echo ROOT_PATH; ?>scp/"><?php echo __('sign in here'); ?></a>
        </div>
    </p>
    </div>
    <div style="display:table-cell;padding: 15px;vertical-align:top; text-align:center;">
        <!-- USEK -->
        <div style="color:#00569c; font-size:150px"><span class="lock"></span></div>
        <!-- USEK - Deleted Registration -->
    </div>
</div>
</form>
<br>