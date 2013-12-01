<div class="block small center login">			
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>SİTE YÖNETİCİSİ OLUŞTURMA</h2>
					<ul>
						<li><?=$this->Html->link('GİRİŞ SAYFASINA GERİ DÖN',Array('controller' => 'users','action' => 'logout'));?></li>
					</ul>
				</div>	
				<div class="block_content">
                <?php if (!empty($form->validationErrors)) { ?> 
	                <div class="message errormsg"><p>Lütfen girdiğiniz verileri kontrol ediniz</p></div>
                <?php } ?>

					<?php echo $this->Form->create('User',Array('inputDefaults' => Array('div' => false))); ?>
                        <p><?php echo $this->Form->input('User.name',Array('label'=>Array('text' =>'Adı :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
                        <p><?php echo $this->Form->input('User.surname',Array('label'=>Array('text' =>'Soyadı :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
                        <p><?php echo $this->Form->input('User.username',Array('label'=>Array('text' =>'Kullanıcı Adı :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
                        <p><?php echo $this->Form->input('User.password',Array('label'=>Array('text' =>'Şifre :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
                        <p><?php echo $this->Form->input('User.mail',Array('label'=>Array('text' =>'Mail Adresi (Mail gönderimi bu adresten yapılır) :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
                        <p><?php echo $this->Form->input('User.user_type_id',Array('label'=>'Kullanıcı Adı :','class' => 'text','autocomplete' => 'off','type' => 'hidden'));?></p>
						<p>
                            <?php echo $this->Form->submit('KAYDET',Array('class' => 'submit small','div' => false)); ?> 
						</p>
					<?php echo $this->Form->end(); ?>
				</div>	
				<div class="bendl"></div>
				<div class="bendr"></div>								
</div>	

