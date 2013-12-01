<div class="main">
    <div class="left">
        <div class="left-colum">
                <div class="left-colum-title"><span>Haberler</span></div>
            <div class="left-colum-comment"></div>
            <div class="left-colum-footer"></div>
        </div>
    </div>
    <div class="right">
        <?php foreach ($events as $event) {?>
        <div class="events-item">
            <div class="events-item-sol">
                <p><?=$this->Genel->tarih("gun",$event['Event']['date']) ?></p>
                <span><?=$this->Genel->tarih("kisaay",$event['Event']['date'])?></span>
            </div>
            <div class="events-item-sag">
                                <div class="item-title"><p><?=$this->Html->link($event['Event']['name_' . $lang['Short']],Array('language' => $lang['Short'],'controller' => 'events','action' => 'view',$event['Event']['id']),array('title' => $event['Event']['name_' . $lang['Short']]))?></p></div>
                                <div class="item-desc"><?=$event['Event']['label_' . $lang['Short']]?></div>
                                <div class="item-read"><?=$event['Event']['seencount'] ?> Okuma</div>
                                <div class="item-link">etkinlik oku</div>
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>
<div class="paginator">
         	<?=$paginator->prev('«', null, null, array('class' => 'disabled'))?>
			<?=$paginator->numbers(); ?>
            <?=$paginator->next('»', null, null, array('class' => 'disabled'))?>
</div>
    </div>
</div>

