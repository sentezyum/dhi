<div class="userForm"><?php echo $this->Session->flash(); ?>
<?php if ($error == True) { ?>
Yanlış Kullanıcı Adı ve(ya) Şifre
<?php } ?>

<?php echo $this->Form->create('User',array('encoding' => Null,'action' => '../users/giris')); ?>
            	<?php echo $this->Form->input('User.username',Array('label' => 'Kullanıcı Adı :','id' =>'username')); ?>
                <?php echo $this->Form->input('User.password',Array('label' => 'Şifre :','id' => 'password')); ?>
                
            <?php echo $this->Form->end('Giriş'); ?>
			<?php echo $this->Html->link('Şifremi Unuttum',Array('controller' => 'users','action' => 'sifreyenile'));?> / 
            <?php echo $this->Html->link('Kayıt Ol',Array('controller' => 'users','action' => 'yeni'));?>
            
</div>