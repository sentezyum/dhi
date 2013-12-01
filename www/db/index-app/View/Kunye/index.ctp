<div class="contact">  
<h2>Künye</h2>
<div class="iletisim">
<h3>Künye Bilgisi</h3>
<?php foreach ($kunyeBilgileri as $kunyeBilgisi) { ?>
    <h4><?=$kunyeBilgisi['Imprintgroup']['name']?></h4>
    <ul>
       <?php foreach ($kunyeBilgisi['Imprint'] as $kunyeAyrintisi) { ?>
        <li>
            <div class="adi"><?=$kunyeAyrintisi['name']?> :</div>
            <div class="ayrinti"><?=$kunyeAyrintisi['value']?></div>
        </li>
       <?php } ?>
    </ul>
    <div class="clear"></div>
<?php } ?>
</div>




