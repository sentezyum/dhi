<div class="grid_12 content">
            <div class="grid_3 alpha">
                <h4 style="margin-top:10px"><?php echo __('İLETİŞİM BİLGİLERİ'); ?></h4>
                <?php foreach ($iletisimBilgileri as $iletisimBilgisi) { ?>
                    <h5><?php echo __($iletisimBilgisi['Contactgroup']['name']);?></h5>
                       <?php foreach ($iletisimBilgisi['Contact'] as $iletisimAyrintisi) { ?>
                        <h5><?php echo __($iletisimAyrintisi['name']);?></h5>
                        <p><?php echo $iletisimAyrintisi['value']?></p>
                       <?php } ?>
                    <div class="clear"></div>
                <?php } ?>           
            </div>
            <div class="grid_9 omega product" style="margin-top:40px;">
                <h3><?php echo __('HARİTA'); ?></h3>
                <div class="image"><?php echo $this->Html->image("map.png"); ?></div>
                <h3><?php echo __('MAİL FORMU'); ?></h3>
                <p> &nbsp;</p>

            <script type="text/javascript">
            <!--
            function check() {
                var errmsg;
                errmsg='';
                var abbr = document.form2;
                
                if ((abbr.adsoyad.value == ""))
                errmsg += "<?php echo __("Lütfen AD ve SOYADINIZI Giriniz"); ?> !\n";
                if ((abbr.MailTo.value == ""))
                errmsg += "<?php echo __("Lütfen E-Mail Adresinizi Giriniz"); ?> !\n";
                if ((abbr.subject.value == ""))
                errmsg += "<?php echo __("Lütfen Mesaj Konunuzu Giriniz"); ?> !\n";
                if ((abbr.tel.value == ""))
                errmsg += "<?php echo __("Lütfen Telefon Numaranızı Giriniz"); ?> !\n";
                if ((abbr.body.value == ""))
                errmsg += "<?php echo __("Lütfen Mesajınızı Giriniz"); ?> !\n";
                
                if (errmsg!="") {
                    alert(errmsg);
                    return false;
                }
                else
                    return true;
            }
            //-->
            </script>

    
        
        <form id="form2" name="form2" method="post" onsubmit="return check();">
        <?php echo $this->Form->create('IletisimFormu', array('onsubmit' => 'return check();', 'id' => 'form2')); ?>
        <?php //echo $this->Form->create('IletisimFormu', array('onsubmit' => 'return check();', 'id' => 'form2')); ?>
            <table style="width:100%">
                <tbody><tr>
                    <td>
                        <b><?php echo __('Adınız Soyadınız');?> :</b><br>
                        <?php echo $this->Form->input('IletisimFormu.name', array('label' => false, 'id' => 'adsoyad', 'style' => 'width:90%;', 'type' => 'text', 'class' => 'form_textbox', 'size' => 25, 'maxlength' => 50, 'div' => false)); ?>
                    </td>
                    <td>
                        <b><?php echo __('E-Mail Adresiniz');?> :</b><br>
                        <?php echo $this->Form->input('IletisimFormu.mail', array('label' => false, 'id' => 'MailTo', 'style' => 'width:90%;', 'type' => 'text', 'class' => 'form_textbox', 'size' => 25, 'maxlength' => 50, 'div' => false)); ?>
                    </td>
                    <td>
                        <b><?php echo __('Telefon Numaranız');?> :</b><br>
                        <?php echo $this->Form->input('IletisimFormu.telephone', array('label' => false, 'id' => 'tel', 'style' => 'width:90%;', 'type' => 'text', 'class' => 'form_textbox', 'size' => 25, 'maxlength' => 50, 'div' => false)); ?>
                    </td>
                    <td>
                        <b><?php echo __('Mesaj Konusu');?> :</b><br>
                        <?php echo $this->Form->input('IletisimFormu.header', array('label' => false, 'id' => 'subject', 'style' => 'width:90%;', 'type' => 'text', 'class' => 'form_textbox', 'size' => 25, 'maxlength' => 50, 'div' => false)); ?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <b><?php echo __('Mesajınız');?> :</b><br>
                        <?php echo $this->Form->input('IletisimFormu.message', array('label' => false, 'id' => 'body', 'style' => 'width:100%;', 'type' => 'textarea', 'class' => 'yazi_duz2', 'rows' => 5, 'div' => false)); ?>
                      </td>
                </tr>
                <tr>
                    <td colspan="4">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right">
                    <button name="Abutton1" id="mailbutton" style="border-style: none; border-width: 0px; color:#ffffff">
                        <?php echo __('Gönder'); ?>
                    </button>
                    <br>
                

                    </td>
                </tr>
            </tbody></table>
        <?php echo $this->Form->end(); ?>     

            </div>
        </div>