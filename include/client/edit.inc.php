<?php

if(!defined('OSTCLIENTINC') || !$thisclient || !$ticket || !$ticket->checkUserAccess($thisclient)) die('Access Denied!');

?>

<h1>
    <?php echo sprintf(__('Editing Ticket #%s'), $ticket->getNumber()); ?>
</h1>

<form action="tickets.php" method="post">
    <?php echo csrf_token(); ?>
    <input type="hidden" name="a" value="edit"/>
    <input type="hidden" name="id" value="<?php echo Format::htmlchars($_REQUEST['id']); ?>"/>
<table width="800">
    <tbody id="dynamic-form">
    <?php if ($forms)
        foreach ($forms as $form) {
            $form->render(['staff' => false]);
    } ?>
    </tbody>
</table>
<hr>
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
    <input type="submit" value="Update" role="button" class="btn btn-outline-success"/>
    <input type="reset" value="Reset" role="button" class="btn btn-outline-secondary"/>
    <input type="button" value="Cancel" role="button" class="btn btn-outline-danger" onclick="javascript:
        window.location.href='index.php';"/>
</div>
</form>
