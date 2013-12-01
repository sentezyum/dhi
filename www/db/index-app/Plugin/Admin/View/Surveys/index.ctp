			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>ANKETLER</h2>
					<ul>
						<li><?=$this->Html->link('YENİ ANKET EKLE',Array('controller' => 'surveys','action' => 'add'));?></li>
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				

				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                            <th><?php echo $this->Paginator->sort('Onay','has_confirm');?></th>
                            <th><?php echo $this->Paginator->sort('Eklendiği Tarih','created');?></th>
                            <th><?php echo $this->Paginator->sort('Başlık','name');?></th>
                            <th><?php echo $this->Paginator->sort('Toplam Oy','voters_count');?></th>
                            <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($surveys as $Survey): ?>
                    <tr>
                    	<td><?php echo $this->Html->link(__($confirm[$Survey['Survey']['has_confirm']], true), array('action' => 'set_confirm', $Survey['Survey']['id'],$link[$Survey['Survey']['has_confirm']]));?>&nbsp</td>
                        <td class='date'><?php echo $this->Genel->tarih('gun kisaay yil',$Survey['Survey']['created']); ?><br><?php echo $this->Genel->tarih('saat:dakika',$Survey['Survey']['created']); ?>&nbsp;</td>
                        <td><?php echo substr($Survey['Survey']['name'],0,50) . '...'; ?>&nbsp;</td>
                        <td class='date'>
                        	<?=$Survey['Survey']['voters_count'];?>
                        	&nbsp;</td>
                        <td class="delete"><?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $Survey['Survey']['id'])); ?> | <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $Survey['Survey']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $Survey['Survey']['id'])); ?>
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