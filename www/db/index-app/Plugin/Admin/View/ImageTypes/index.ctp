			<div class="block">

				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>

					<h2>Resİm Tİplerİ</h2>
                    <ul>
						<li><?=$this->Html->link('Resİm tİpİ ekle',Array('controller' => 'image_types','action' => 'add'))?></li>
						<li><?=$this->Html->link('Resİm boyutlarI',Array('controller' => 'image_sizes','action' => 'index'))?></li>
					</ul>

				</div>		<!-- .block_head ends -->



				<div class="block_content">
                <?php echo $this->Session->flash(); ?>


				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                            <th><?php echo $this->Paginator->sort('No','id');?></th>
                            <th><?php echo $this->Paginator->sort('Adı' , 'name');?></th>
                            <th class="actions">&nbsp;</th>
                    </tr>
                    <?php foreach ($imageTypes as $imageType): ?>
                    <tr>
                        <td><?php echo $imageType['ImageType']['id']; ?>&nbsp;</td>
                        <td><?php echo $imageType['ImageType']['name']; ?>&nbsp;</td>
                        <td class="delete">
                            <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $imageType['ImageType']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $imageType['ImageType']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $imageType['ImageType']['id'])); ?>
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