<div class="container" style="text-align:center">
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
<p class="fs-1"><?php echo Format::display($title); ?></p>
<p class="fs-6"><?php echo Format::display($body); ?></p>
<form action="login.php" method="post" id="clientLogin" style="background:white">
        <?php csrf_token(); ?>
        <div>
            <div style="color:#00569c; font-size:50px;"><i class="fas fa-user-lock"></i></div>
            <strong><?php echo Format::htmlchars($errors['login']); ?></strong>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <input id="username" placeholder="<?php echo __('Email or Username'); ?>" type="text" name="luser" value="<?php echo $email; ?>" class="nowarn">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <input id="passwd" placeholder="<?php echo __('Password'); ?>" type="password" name="lpasswd" value="<?php echo $passwd; ?>" class="nowarn"></td>
            </div>
            <button class="btn btn-primary" type="submit">Sign In</button>
            <br />
        </div>
    </form>
</div>
<br />
<!-- <div style="text-align:center;">
    <b>I'm an agent</b> — <a href="<?php echo ROOT_PATH; ?>scp/">sign in here</a>
</div> -->