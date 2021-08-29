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
<!-- USEK -->
<!-- <div class="d-grid gap-2 d-md-flex justify-content-md-center col-3 mx-auto"> -->
<div class="d-flex bd-highlight mb-3">
    <div class="me-auto p-2 bd-highlight">
        <input type="submit" value="Update" role="button" class="btn btn-outline-success"/>
    </div>
    <div class="p-2 bd-highlight">
        <input type="reset" value="Reset" role="button" class="btn btn-outline-secondary"/>
    </div>
    <div class="p-2 bd-highlight">
        <input type="button" value="Cancel" role="button" class="btn btn-outline-danger" onclick="javascript:
        window.location.href='index.php';"/>
    </div>
</div>
</form>
