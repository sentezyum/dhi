<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>HABER KATEGORİSİ DÜZENLE</h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
<?php echo $this->Form->create('PostCategory',Array('encoding' => Null,'inputDefaults' => Array('div' => false)));?>
<p><?php echo $this->Form->input('name',Array('label'=>Array('text' =>'Adı :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
<p><?php echo $this->Form->input('link',Array('label'=>Array('text' =>'Link :','class' => 'req'),'class' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?></p>
<p><?php echo $this->Form->input('has_confirm',Array('label'=>Array('text' =>'Menüde Gözüksün','class' => 'req'),'class' => 'checkbox','autocomplete' => 'off','between' => ' ','error' => array('wrap' => 'span','class' => 'note error')));?></p>
<p><?php echo $this->Form->input('has_confirm',Array('label'=>Array('text' =>'Alt Sayfada Gözüksün','class' => 'req'),'class' => 'checkbox','autocomplete' => 'off','between' => ' ','error' => array('wrap' => 'span','class' => 'note error')));?></p>
<p>
	<?php echo $this->Form->submit('Kaydet',Array('class' => 'submit','div'=>false));?>
</p>
<?php echo $this->Form->end();?>
    				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->
