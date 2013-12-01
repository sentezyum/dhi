<?php
if ($prefLang['Short'] != $lang['Short']) {
?>
<div>Görünütlenen içeriğin kendi dilinizde çevirisi olmadığından <strong><?=$prefLang['Long']?></strong> dilinde gösteriliyor</div>
<?php } ?>
    <div class="main">
        <div class="left">
                        <div class="left-colum">
                                <div class="left-colum-title"><?=__('Haberler');?></span></div>
                        <div class="left-colum-comment"></div>
                        <div class="left-colum-footer"></div>
                        </div>
        </div>
        <div class="right">

        <?php
        if ($prefLang['Short'] != $lang['Short']) {
        ?>
            <div class="hata">Görünütlenen içeriğin kendi dilinizde çevirisi olmadığından <strong><?=$prefLang['Long']?></strong> dilinde gösteriliyor</div>
        <?php } ?>

        <?=$page['Staticpage']['value_' . $prefLang['Short']]?>

        </div>
