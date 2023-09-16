        </div>
    </div>
    <br>
    <div class="fs-6 p-2" style="text-align:center;">
    <?php
        if ($thisclient && is_object($thisclient) && $thisclient->isValid()
                        && !$thisclient->isGuest()) {
            ?> Logged in as: <b><?php
            echo Format::htmlchars($thisclient->getName()); ?></b><?php
        } ?>
    </div>
    <div class="fs-6" style="text-align:center;">
        <a href="<?php echo ROOT_PATH; ?>scp/" target="_blank"  class="btn btn-outline-secondary" role="button">Switch to Admin <i class="fas fa-user-cog"></i></a>
    </div>
    <hr />
    <div id="footer">
        <p><?php echo __('Copyright &copy;'); ?> <?php echo date('Y'); ?> <?php
        echo Format::htmlchars((string) $ost->company ?: 'www.usek.edu.lb'); ?> - <?php echo __('All rights reserved.'); ?></p>
        <!-- <a id="poweredBy" href="https://osticket.com" target="_blank"><?php echo __('Helpdesk software - powered by osTicket'); ?></a> -->
    </div>
<div id="overlay"></div>
<div id="loading">
    <h4><?php echo __('Please Wait!');?></h4>
    <p><?php echo __('Please wait... it will take a second!');?></p>
</div>
<?php
if (($lang = Internationalization::getCurrentLanguage()) && $lang != 'en_US') { ?>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>ajax.php/i18n/<?php
        echo $lang; ?>/js"></script>
<?php } ?>
<script type="text/javascript">
    getConfig().resolve(<?php
        include INCLUDE_DIR . 'ajax.config.php';
        $api = new ConfigAjaxAPI();
        print $api->client(false);
    ?>);
</script>
</body>
</html>
