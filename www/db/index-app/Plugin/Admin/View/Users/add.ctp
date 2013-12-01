<div class="block">			
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>KULLANICI EKLE</h2>
					<ul>
						<li><?=$this->Html->link('KULLANICILAR',Array('controller' => 'users','action' => 'index'));?></li>
					</ul>
				</div>	
				<div class="block_content">
                <?php echo $this->Session->flash(); ?>

					<?php echo $this->Form->create('User',Array('encoding' => Null,'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after')))); ?>
 						<p><?php echo $this->Form->input('User.user_type_id',Array('label'=>Array('text'=>'Kullanıcı Türü :','class' => 'req'),'class' => 'styled','autocomplete' => 'off','empty' => 'Seçiniz','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
                        <p><?php echo $this->Form->input('User.name',Array('label'=>Array('text' =>'Adı :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
                        <p><?php echo $this->Form->input('User.surname',Array('label'=>Array('text' =>'Soyadı :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
                        <p><?php echo $this->Form->input('User.username',Array('label'=>Array('text' =>'Kullanıcı Adı :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
                        <p><?php echo $this->Form->input('User.password',Array('label'=>Array('text' =>'Şifre :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
                        <p><?php echo $this->Form->input('User.mail',Array('label'=>Array('text' =>'Mail Adresi :'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
						<p>
                            <?php echo $this->Form->submit('KAYDET',Array('class' => 'submit small','div' => false)); ?> 
						</p>
					<?php echo $this->Form->end(); ?>
				</div>	
				<div class="bendl"></div>
				<div class="bendr"></div>								
</div>	



