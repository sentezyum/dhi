			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>Haber KAtegorİlerİ</h2> 
                    <ul> 
						<li><?=$this->Html->link('Yenİ haber kategorİsİ ekle',Array('action' => 'add'))?></li> 
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				
					
				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                            <th><?php echo $this->Paginator->sort('Menü','has_confirm');?></th>
							<th><?php echo $this->Paginator->sort('Alt Sayfa','has_main');?></th>
                            <th><?php echo $this->Paginator->sort('Adı' , 'name');?></th>
                            <th><?php echo $this->Paginator->sort('Link' , 'link');?></th>
                            <th class="actions">&nbsp;</th>
                    </tr>
                    <?php foreach ($postCategories as $postCategory): ?>
                    <tr>
                        <td><?php echo $this->Html->link(__($confirm[$postCategory['PostCategory']['has_confirm']], true), array('action' => 'set_confirm', $postCategory['PostCategory']['id'],$link[$postCategory['PostCategory']['has_confirm']]));?>&nbsp</td>
                        <td><?php echo $this->Html->link(__($confirm[$postCategory['PostCategory']['has_main']], true), array('action' => 'set_main', $postCategory['PostCategory']['id'],$link[$postCategory['PostCategory']['has_main']]));?>&nbsp</td>
                        <td><?php echo $postCategory['PostCategory']['name']; ?>&nbsp;</td>
                        <td><?php echo $postCategory['PostCategory']['link']; ?>&nbsp;</td>
                        <td class="delete">
                            <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $postCategory['PostCategory']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $postCategory['PostCategory']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $postCategory['PostCategory']['id'])); ?>
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