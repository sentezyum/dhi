<div class="grid_12 content">
	<div class="grid_3 alpha">
		<ul class="left_menu" style="margin-top:40px;">
			<li class="menu_header">ÜRÜNLER</li>
			<?php foreach ($productGroups as $productItem) { ?>
				<li <?php echo $this->request->params["id"] == $productItem["Productgroup"]["id"] ? "class='active'" : ""; ?>>
					<?php echo $this->Html->link($productItem["Productgroup"]["name" . $langPrefix], array('id' => $productItem["Productgroup"]["id"], "slug" => $this->Genel->seo_tr($productItem["Productgroup"]["name"])), array('class' => 'core_animation_fast')); ?>
					<?php if (!empty($productItem['ChildrenGroups'])) { ?>
						<ul>
							<?php foreach ($productItem['ChildrenGroups'] as $productSubItem) { ?>
								<li <?php echo $this->request->params["id"] == $productSubItem["id"] ? "class='active'" : ""; ?>>
									<?php echo $this->Html->link($productSubItem["name" . $langPrefix], array('id' => $productSubItem["id"], "slug" => $this->Genel->seo_tr($productSubItem["name"])), array('class' => 'core_animation_fast')); ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>
	</div>

	<div class="grid_9 omega product" style="margin-top:40px;">
		<?php echo $this->Html->link('&laquo; ' . $product['Productgroup']['name' . $langPrefix], array('controller' => 'productgroups', 'id' => $product['Productgroup']['id'], 'slug' => $this->Genel->seo_tr($product['Productgroup']['name' . $langPrefix])), array('escape' => false)); ?>
		<h3><?php echo $product["Product"]["name" . $langPrefix]; ?></h3>
		
		<?php if (isset($product["Image"]["Main"]["normal"])) { ?>
			<div class="image"><?php echo $this->Html->image($product["Image"]["Main"]["normal"], array("title" => $product["Product"]["name" . $langPrefix])); ?></div>
		<?php } ?>
		<p>
			<?php echo $product["Product"]["value" . $langPrefix]; ?>
		</p>
		<?php if(isset($product["Document"])) {?>
			<?php foreach ($product["Document"] as $document) { ?>
				<?php echo $this->Html->link($document["name" . $langPrefix], $document['path'], array('target' => '_new')); ?>
			<?php } ?>
		<?php } ?>


	</div>
</div>