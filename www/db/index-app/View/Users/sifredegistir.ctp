<div class="userForm">

<?php echo $this->Session->flash(); ?>
<div class="genel">
    <div class="uyelik">
    	<div class="genel_baslik">Şifre Değiştir</div>
<?php echo $this->Form->create('User',Array('encoding' => Null,'action' => '../users/sifredegistir'));?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('password',Array('label' => 'Yeni Şifre :'));
		echo $this->Form->input('rePassword',Array('label' => 'Tekrar Giriniz :','type' => 'password'));
	?>
<?php echo $this->Form->end(__('Değiştir', true));?>
	</div>
</div>

</div>
