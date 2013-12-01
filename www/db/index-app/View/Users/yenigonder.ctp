<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('User',array('encoding' => Null,'action' => '../users/yenigonder')); ?>
            	<?php echo $this->Form->input('User.mail',Array('label' => 'Mail Adresi :')); ?>
<?php $recaptcha->display_form('echo'); ?>
            <?php echo $this->Form->end('Şifremi Gönder'); ?>
            
