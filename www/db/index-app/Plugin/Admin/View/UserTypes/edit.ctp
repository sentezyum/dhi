<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>KULANICI TÜRÜ DÜZENLE</h2>
					<ul> 
						<li><?=$this->Html->link('KULLANICI TÜRLERİNE gerİ dÖn',Array('controller' => 'user_types','action' => 'index','page' => $page))?></li>
						<li><?=$this->Html->link('Yenİ KULLANICI TÜRÜ Ekle',Array('controller' => 'user_types','action' => 'add'))?></li> 
					</ul>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
					<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('UserType',Array('encoding' => Null,'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>
<?php echo $this->Form->input('id',Array('label'=>Array('text' =>'Haber Kategorisi :','class' => 'req'),'class' => 'styled','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
<p>
	<?php
		echo $this->Form->input('name',Array('label' => 'Adı :','between' => '<br>','class' => 'text big','div' => false,'error' => array('wrap' => 'span','class' => 'note error')));
	?>
</p>
<p>
	<?php echo $this->Form->submit('Kaydet',Array('class' => 'submit','div'=>false));?>
</p>
<?php echo $this->Form->end();?>
    				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->
