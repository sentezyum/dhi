<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>ETKİNLİK DÜZENLE</h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
<?php echo $this->Form->create('Event',Array('encoding' => Null,'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>
<?php echo $this->Form->input('id',Array('label'=>Array('text' =>'Haber Kategorisi :','class' => 'req'),'class' => 'styled','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
<p>
	<?php echo $this->Form->input('date',Array('label'=>Array('text' =>'Etkinlik Tarihi :'),'class' => 'text date_picker','value' => str_replace('Mayıs','May',$this->Genel->tarih('gun kisaay yil',$this->data['Event']['date'])),'type' => 'text','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>                                    
<p>
	<?php echo $this->Form->input('name_tr',Array('label'=>Array('text' =>'Başlık (TR) :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('name_en',Array('label'=>Array('text' =>'Başlık (EN) :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('name_bg',Array('label'=>Array('text' =>'Başlık (BG) :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>

<p>
	<?php echo $this->Form->input('label_tr',Array('label'=>Array('text' => 'Haber Kısa Detayı (TR) :'),'autocomplete' => 'off','rows'=>3,'type' => 'textarea','onKeyUp' => 'limitText(this,this.form.countdown,250,\'countdown_tr\');','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
	<br>
	<font size="1"><span id="countdown_tr">250</span> karakter kaldı</font>
</p>
<p>
	<?php echo $this->Form->input('label_en',Array('label'=>Array('text' => 'Haber Kısa Detayı (EN) :'),'autocomplete' => 'off','rows'=>3,'type' => 'textarea','onKeyUp' => 'limitText(this,this.form.countdown,250,\'countdown_en\');','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
	<br>
	<font size="1"><span id="countdown_en">250</span> karakter kaldı</font>
</p>
<p>
	<?php echo $this->Form->input('label_bg',Array('label'=>Array('text' => 'Haber Kısa Detayı (BG) :'),'autocomplete' => 'off','rows'=>3,'type' => 'textarea','onKeyUp' => 'limitText(this,this.form.countdown,250,\'countdown_bg\');','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
	<br>
	<font size="1"><span id="countdown_bg">250</span> karakter kaldı</font>
</p>

<p>
	<?php echo $this->Form->input('value_tr',Array('label'=>Array('text' =>'Haber Detayı (TR) :','class' => 'req'),'class' => 'wysiwyg','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('value_en',Array('label'=>Array('text' =>'Haber Detayı (EN) :','class' => 'req'),'class' => 'wysiwyg','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('value_bg',Array('label'=>Array('text' =>'Haber Detayı (BG) :','class' => 'req'),'class' => 'wysiwyg','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>

<p>
	<?php echo $this->Form->input('youtube_video',Array('label'=>Array('text' =>'Youtube Video Id (Yoksa boş bırakınız):'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('has_confirm',Array('label'=>Array('text' =>' Aktif'),'class' => 'checkbox','format' => array('before', 'input', 'label', 'error', 'between', 'after'),'error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->submit('Kaydet',Array('class' => 'submit','div'=>false));?>
</p>
<?php echo $this->Form->end();?>
    				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum, target) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
		
	}
		$('#' + target).html(limitNum - limitField.value.length);
	
}
</script>