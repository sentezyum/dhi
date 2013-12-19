<?php if ($result) { ?> 
	<p align="center">Mesajınız İletildi En Kısa Sürede Size Geri Dönülecektir</br>
	İlginiz İçin Teşekkür Ederiz</p>
<?php } else { ?>
	<p align="center">Mesajınız İletilemedi Lütfen Tekrar Deneyiniz</p>
<?php } ?>

</br>
</br>

<strong>
<?=$this->Html->link('Geri Dönmek İçin Tıklayınız',Array('action' => 'index'));?>
</strong>
</p>