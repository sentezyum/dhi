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
		<h3><?php echo $productGroup["Productgroup"]["name" . $langPrefix]; ?></h3>
		
		<?php if (isset($productGroup["Image"]["Main"]["normal"])) { ?>
			<div class="image"><?php echo $this->Html->image($productGroup["Image"]["Main"]["normal"], array("title" => $productGroup["Productgroup"]["name" . $langPrefix])); ?></div>
		<?php } ?>
		<p <?php if (!empty($products)) { echo "style='border-bottom:thin gray solid;margin-bottom:0px;padding-bottom:20px;'";}?>>
			<?php echo $productGroup["Productgroup"]["value" . $langPrefix]; ?>
		</p>
		<?php if (!empty($products)) { ?>
			<?php foreach ($products as $product) { ?>
				<div style="border-bottom:thin solid; border-bottom-color:gray; clear:both; float:left; width:100%;">
					<div class="detail_left">
						<h3><?php echo $product["Product"]["name" . $langPrefix]; ?></h3>
						<p style="margin-bottom:10px;"><?php echo $product["Product"]["label" . $langPrefix]; ?></p>
					</div>

					<div class="detail_right">
					<?php if(isset($product["Image"])) { $cursor = 1;?>
						<?php foreach ($product["Image"]["All"] as $images) { ?>
							<?php echo $this->Html->image($images["small"]); ?>
						<?php if ($cursor == 3) {break;} $cursor++;} ?>
					<?php } ?>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>