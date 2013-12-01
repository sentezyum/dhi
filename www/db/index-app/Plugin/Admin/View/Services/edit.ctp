<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>HİZMET DÜZENLE</h2>
                    <ul>
						<li><?=$this->Html->link('HİZMETLERİMİZ',Array('controller' => 'services','action' => 'index'));?></li>
					</ul>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
<?php echo $this->Form->create('Service',Array('encoding' => Null,'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>
<?php echo $this->Form->input('id',Array('label'=>Array('text' =>'Haber Kategorisi :','class' => 'req'),'class' => 'styled','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
<p>
	<?php echo $this->Form->input('name',Array('label'=>Array('text' =>'Adı :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('value',Array('label'=>Array('text' =>'Hizmet Detayı :','class' => 'req'),'class' => 'wysiwyg tall','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('has_confirm',Array('label'=>Array('text' =>' Aktif'),'class' => 'checkbox','format' => array('before', 'input', 'label', 'error', 'between', 'after'),'checked' => false,'error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->submit('Kaydet',Array('class' => 'submit','div'=>false));?>
</p>
<?php echo $this->Form->end();?>
    				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->