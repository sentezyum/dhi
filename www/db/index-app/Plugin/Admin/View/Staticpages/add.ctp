<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>YENİ SAYFA EKLE</h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
<?php echo $this->Form->create('Staticpage',Array('encoding' => Null,'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>
<p>
	<?php echo $this->Form->input('menuarea_id',Array('label'=>Array('text' =>'Bağlı Menü Alanı :'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','escape' => false,'error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('parent_id',Array('label'=>Array('text' =>'Bağlı Menü :'),'empty' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','options' => $groups,'escape' => false,'error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('link',Array('label'=>Array('text' =>'Link (Boş Kalırsa Sayfa Açılır) :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>

<?php foreach (Configure::read('lang') as $lang) { ?>
	<p>
		<?php echo $this->Form->input('name' . ($lang != Configure::read('base_lang') ? '_' . $lang : ''),Array('label'=>Array('text' =>'Başlık (' . $lang . ') :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
	</p>
<?php } ?>

<?php foreach (Configure::read('lang') as $lang) { ?>
	<p>
		<?php echo $this->Form->input('value' . ($lang != Configure::read('base_lang') ? '_' . $lang : ''),Array('label'=>Array('text' =>'Sayfa İçeriği (' . $lang . ') :','class' => 'req'),'class' => 'wysiwyg tall','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
	</p>
<?php } ?>

<p>
	<?php echo $this->Form->input('youtube_video',Array('label'=>Array('text' =>'Youtube Video Id (Yoksa boş bırakınız):'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->submit('Kaydet',Array('class' => 'submit','div'=>false));?>
</p>
<?php echo $this->Form->end();?>
    				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->