			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>Haberler</h2>
					<ul>
						<li><?php echo $this->Html->link('YENİ HABER',Array('controller' => 'posts','action' => 'add'));?></li>
					
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				

				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <th><?php echo $this->Paginator->sort('has_confirm','Onay');?></th>
                        <th><?php echo $this->Paginator->sort('created','Eklendiği Tarih');?></th>
                        <th><?php echo $this->Paginator->sort('name','Başlık');?></th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($posts as $Post): ?>
                    <tr>
                    	<td><?php echo @$this->Html->link(__($confirm[$Post['Post']['has_confirm']], true), array('action' => 'set_confirm', $Post['Post']['id'],$link[$Post['Post']['has_confirm']]));?>&nbsp</td>
                        <td class='date'><?php echo $this->Genel->tarih('gun kisaay yil',$Post['Post']['created']); ?><br><?php echo $this->Genel->tarih('saat:dakika',$Post['Post']['created']); ?>&nbsp;</td>
                        <td><?php echo substr($Post['Post']['name'],0,50) . '...'; ?>&nbsp;</td>
                        <td class="delete"><?php echo $this->Html->link(__('Fotoğraf(' . count($Post['Image']) . ')', true),  array('controller'=> 'images','action' => 'index','post',$Post['Post']['id'])); ?> | 
                            <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $Post['Post']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $Post['Post']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $Post['Post']['id'])); ?>
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