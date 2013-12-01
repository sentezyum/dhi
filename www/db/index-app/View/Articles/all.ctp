<div class="main">
    <div class="left">
        <div class="left-colum">
                <div class="left-colum-title"><span>Haberler</span></div>
            <div class="left-colum-comment"></div>
            <div class="left-colum-footer"></div>
        </div>
    </div>
    <div class="right">
    
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
                <?php echo $this->Session->flash(); ?>
				<table cellpadding="0" cellspacing="0" width="100%">
                    <?php foreach ($articles as $Article): ?>
                    <tr>
                        <td><?php echo $Article['User']['username']; ?>&nbsp;</td>
                        <td class='date'><?php echo $this->Genel->tarih('gun kisaay yil',$Article['Article']['created']); ?><br><?php echo $this->Genel->tarih('saat:dakika',$Article['Article']['created']); ?>&nbsp;</td>
                        <td><?php echo substr($Article['Article']['name'],0,50) . '...'; ?>&nbsp;</td>
                        <td class='date'>
                        	<?=$Article['Article']['seencount'];?>
                        	&nbsp;</td>
                        <td class="delete"> 
                            <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $Article['Article']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $Article['Article']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $Article['Article']['id'])); ?>
                        </td>
                <?php endforeach; ?>
                    </table>
<div class="paginator">
         	<?=$paginator->prev('«', null, null, array('class' => 'disabled'))?>
			<?=$paginator->numbers(); ?>
            <?=$paginator->next('»', null, null, array('class' => 'disabled'))?>
</div>
    </div>
</div>
