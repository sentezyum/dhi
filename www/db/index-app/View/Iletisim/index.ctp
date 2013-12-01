<div class="row2">
    <div class="row2-bg">
        <div class="govde">
            
<div class="contact">  
<h2>iletişim</h2>
<div class="iletisim">
<h3>İletişim Bilgisi</h3>
<?php foreach ($iletisimBilgileri as $iletisimBilgisi) { ?>
    <h4><?=$iletisimBilgisi['Contactgroup']['name']?></h4>
    <ul>
       <?php foreach ($iletisimBilgisi['Contact'] as $iletisimAyrintisi) { ?>
        <li>
            <div class="adi"><?=$iletisimAyrintisi['name']?> :</div>
            <div class="ayrinti"><?=$iletisimAyrintisi['value']?></div>
        </li>
       <?php } ?>
    </ul>
    <div class="clear"></div>
<?php } ?>
</div>
<div class="iletisim_formu">
<h3>İletişim Formu</h3>
<?php 
    echo $form->create('IletisimFormu',Array('encoding' => Null,'url' => Array('controller'=>'iletisim','action'=>'index'),'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));
    echo $form->inputs(array('legend' => false,'fieldset' => false));
    echo $form->end('Gönder');
?>
</div>
<div class="clear"></div>
</div>            
            
        </div>    
    </div>
</div>




