<div class="userForm">

<?php echo $this->Session->flash(); ?>
<div class="genel">
    <div class="uyelik">
    	<div class="genel_baslik">Şifre Yenile</div>
			<?php echo $this->Form->create('User',array('encoding' => Null,'action' => '../users/sifreyenile')); ?>
            <?php echo $this->Form->input('User.mail',Array('label' => 'Mail Adresi :')); ?>
            <?php echo $this->Form->end('Şifremi Gönder'); ?>
	</div>
</div>

</div>
            
