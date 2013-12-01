<div class="userForm">

    	<div class="genel_baslik">Üyelik Formu</div>
<?php echo $this->Form->create('User',Array('encoding' => Null,'action' => '../users/yeni'));?>

	<?php
		echo $this->Form->input('username',Array('label' => 'Kullanıcı Adı :'));
		echo $this->Form->input('password',Array('label' => 'Şifre :'));
		echo $this->Form->input('rePassword',Array('label' => 'Tekrar Giriniz :','type' => 'password'));
		echo $this->Form->input('mail',Array('label' => 'Mail Adresi :'));
	?>

<?php echo $this->Form->end(__('Üye Ol', true));?>

</div>
