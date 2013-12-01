			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>YAZILAR</h2>
					<ul>
						<li><?=$this->Html->link('YENİ YAZI EKLE',Array('controller' => 'articles','action' => 'add'));?></li>
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				

				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                            <th><?php echo $this->Paginator->sort('Onay','has_confirm');?></th>
                            <th><?php echo $this->Paginator->sort('Yazar','user_id');?></th>
                            <th><?php echo $this->Paginator->sort('Eklendiği Tarih','created');?></th>
                            <th><?php echo $this->Paginator->sort('Başlık','name');?></th>
                            <th><?php echo $this->Paginator->sort('Okunma','seencount');?></th>
                            <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($articles as $Article): ?>
                    <tr>
                    	<td><?php echo $this->Html->link(__($confirm[$Article['Article']['has_confirm']], true), array('action' => 'set_confirm', $Article['Article']['id'],$link[$Article['Article']['has_confirm']]));?>&nbsp</td>
                        <td><?php echo $Article['User']['name'] . ' ' . $Article['User']['surname']; ?>&nbsp;</td>
                        <td class='date'><?php echo $this->Genel->tarih('gun kisaay yil',$Article['Article']['created']); ?><br><?php echo $this->Genel->tarih('saat:dakika',$Article['Article']['created']); ?>&nbsp;</td>
                        <td><?php echo substr($Article['Article']['name'],0,50) . '...'; ?>&nbsp;</td>
                        <td class='date'>
                        	<?=$Article['Article']['seencount'];?>
                        	&nbsp;</td>
                        <td class="delete"><?php echo $this->Html->link(__('Fotoğraf(' . count($Article['Image']) . ')', true),  array('controller'=> 'images','action' => 'index','article',$Article['Article']['id'])); ?> | 
                            <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $Article['Article']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $Article['Article']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $Article['Article']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    </table>

                    <div class="pagination right">
		<?php echo $this->Paginator->prev('&laquo;', array('escape' => false), null, array('class'=>'link','escape' => false));?>
			<?php echo $this->Paginator->numbers(array('separator' => Null));?>
		<?php echo $this->Paginator->next('&raquo;', array('escape' => false), null, array('class' => 'link','escape' => false));?>
	</div>
					
				</div>		<!-- .block_content ends --> 
				
				<div class="bendl"></div> 
				<div class="bendr"></div> 
			</div>		<!-- .block ends --> 