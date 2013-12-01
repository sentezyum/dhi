<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>YAZI DÜZENLE</h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
<?php echo $this->Form->create('Article',Array('encoding' => Null,'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>
<?php echo $this->Form->input('id',Array('label'=>Array('text' =>'Haber Kategorisi :','class' => 'req'),'class' => 'styled','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
<p>
	<?php echo $this->Form->input('user_id',Array('label'=>Array('text' =>'Yazar :','class' => 'req'),'class' => 'styled','autocomplete' => 'off','empty' => 'Yazar Seçiniz...','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('name',Array('label'=>Array('text' =>'Başlık :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('value',Array('label'=>Array('text' =>'Yazı :','class' => 'req'),'class' => 'wysiwyg tall','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('youtube_video',Array('label'=>Array('text' =>'Youtube Video Id (Yoksa boş bırakınız):'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('has_comment',Array('label'=>Array('text' =>' Yorumlanabilir'),'checked' => true,'class' => 'checkbox','format' => array('before', 'input', 'label', 'error', 'between', 'after'),'error' => array('wrap' => 'span','class' => 'note error')));?>
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
