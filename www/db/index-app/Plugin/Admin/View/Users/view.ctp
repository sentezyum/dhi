<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Surname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['surname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['mail']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($user['UserType']['name'], array('controller' => 'user_types', 'action' => 'view', $user['UserType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Admin'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['admin']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Types', true), array('controller' => 'user_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Type', true), array('controller' => 'user_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles', true), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article', true), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments', true), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment', true), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Galleries', true), array('controller' => 'image_galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Gallery', true), array('controller' => 'image_galleries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images', true), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image', true), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Voters', true), array('controller' => 'survey_voters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Voter', true), array('controller' => 'survey_voters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Profiles', true), array('controller' => 'user_profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Profile', true), array('controller' => 'user_profiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Articles');?></h3>
	<?php if (!empty($user['Article'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Seencount'); ?></th>
		<th><?php __('Clickcount'); ?></th>
		<th><?php __('Label'); ?></th>
		<th><?php __('Has Comment'); ?></th>
		<th><?php __('Start Date'); ?></th>
		<th><?php __('Has Conrifm'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modify'); ?></th>
		<th><?php __('Link'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Article'] as $article):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $article['id'];?></td>
			<td><?php echo $article['name'];?></td>
			<td><?php echo $article['value'];?></td>
			<td><?php echo $article['user_id'];?></td>
			<td><?php echo $article['seencount'];?></td>
			<td><?php echo $article['clickcount'];?></td>
			<td><?php echo $article['label'];?></td>
			<td><?php echo $article['has_comment'];?></td>
			<td><?php echo $article['start_date'];?></td>
			<td><?php echo $article['has_conrifm'];?></td>
			<td><?php echo $article['created'];?></td>
			<td><?php echo $article['modify'];?></td>
			<td><?php echo $article['link'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'articles', 'action' => 'view', $article['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'articles', 'action' => 'edit', $article['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'articles', 'action' => 'delete', $article['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $article['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Article', true), array('controller' => 'articles', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Comments');?></h3>
	<?php if (!empty($user['Comment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('Has Confirm'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Article Id'); ?></th>
		<th><?php __('Image Gallery Id'); ?></th>
		<th><?php __('Post Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Comment'] as $comment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $comment['id'];?></td>
			<td><?php echo $comment['name'];?></td>
			<td><?php echo $comment['value'];?></td>
			<td><?php echo $comment['has_confirm'];?></td>
			<td><?php echo $comment['created'];?></td>
			<td><?php echo $comment['article_id'];?></td>
			<td><?php echo $comment['image_gallery_id'];?></td>
			<td><?php echo $comment['post_id'];?></td>
			<td><?php echo $comment['product_id'];?></td>
			<td><?php echo $comment['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'comments', 'action' => 'delete', $comment['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $comment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment', true), array('controller' => 'comments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Image Galleries');?></h3>
	<?php if (!empty($user['ImageGallery'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('Has Confirm'); ?></th>
		<th><?php __('Has Comment'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modify'); ?></th>
		<th><?php __('Link'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['ImageGallery'] as $imageGallery):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $imageGallery['id'];?></td>
			<td><?php echo $imageGallery['name'];?></td>
			<td><?php echo $imageGallery['value'];?></td>
			<td><?php echo $imageGallery['has_confirm'];?></td>
			<td><?php echo $imageGallery['has_comment'];?></td>
			<td><?php echo $imageGallery['created'];?></td>
			<td><?php echo $imageGallery['modify'];?></td>
			<td><?php echo $imageGallery['link'];?></td>
			<td><?php echo $imageGallery['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'image_galleries', 'action' => 'view', $imageGallery['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'image_galleries', 'action' => 'edit', $imageGallery['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'image_galleries', 'action' => 'delete', $imageGallery['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $imageGallery['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Image Gallery', true), array('controller' => 'image_galleries', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Images');?></h3>
	<?php if (!empty($user['Image'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Path'); ?></th>
		<th><?php __('Post Id'); ?></th>
		<th><?php __('Article Id'); ?></th>
		<th><?php __('Image Gallery Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Post Category Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Image'] as $image):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $image['id'];?></td>
			<td><?php echo $image['name'];?></td>
			<td><?php echo $image['path'];?></td>
			<td><?php echo $image['post_id'];?></td>
			<td><?php echo $image['article_id'];?></td>
			<td><?php echo $image['image_gallery_id'];?></td>
			<td><?php echo $image['user_id'];?></td>
			<td><?php echo $image['post_category_id'];?></td>
			<td><?php echo $image['product_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'images', 'action' => 'view', $image['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'images', 'action' => 'edit', $image['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'images', 'action' => 'delete', $image['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $image['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Image', true), array('controller' => 'images', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Posts');?></h3>
	<?php if (!empty($user['Post'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Label'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('Seencount'); ?></th>
		<th><?php __('Clickcount'); ?></th>
		<th><?php __('Start Date'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modify'); ?></th>
		<th><?php __('Has Comment'); ?></th>
		<th><?php __('Has Confirm'); ?></th>
		<th><?php __('Has Start Date Confirm'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Link'); ?></th>
		<th><?php __('Post Category Id'); ?></th>
		<th><?php __('Post Resource Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Post'] as $post):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['name'];?></td>
			<td><?php echo $post['label'];?></td>
			<td><?php echo $post['value'];?></td>
			<td><?php echo $post['seencount'];?></td>
			<td><?php echo $post['clickcount'];?></td>
			<td><?php echo $post['start_date'];?></td>
			<td><?php echo $post['created'];?></td>
			<td><?php echo $post['modify'];?></td>
			<td><?php echo $post['has_comment'];?></td>
			<td><?php echo $post['has_confirm'];?></td>
			<td><?php echo $post['has_start_date_confirm'];?></td>
			<td><?php echo $post['user_id'];?></td>
			<td><?php echo $post['link'];?></td>
			<td><?php echo $post['post_category_id'];?></td>
			<td><?php echo $post['post_resource_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'posts', 'action' => 'delete', $post['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Products');?></h3>
	<?php if (!empty($user['Product'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('Label'); ?></th>
		<th><?php __('Has Confirm'); ?></th>
		<th><?php __('Start Date'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('End Date'); ?></th>
		<th><?php __('Clickcount'); ?></th>
		<th><?php __('Seencount'); ?></th>
		<th><?php __('Has Comment'); ?></th>
		<th><?php __('Link'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Product'] as $product):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $product['id'];?></td>
			<td><?php echo $product['name'];?></td>
			<td><?php echo $product['value'];?></td>
			<td><?php echo $product['label'];?></td>
			<td><?php echo $product['has_confirm'];?></td>
			<td><?php echo $product['start_date'];?></td>
			<td><?php echo $product['price'];?></td>
			<td><?php echo $product['end_date'];?></td>
			<td><?php echo $product['clickcount'];?></td>
			<td><?php echo $product['seencount'];?></td>
			<td><?php echo $product['has_comment'];?></td>
			<td><?php echo $product['link'];?></td>
			<td><?php echo $product['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'products', 'action' => 'delete', $product['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Survey Voters');?></h3>
	<?php if (!empty($user['SurveyVoter'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Survey Id'); ?></th>
		<th><?php __('Survey Value Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['SurveyVoter'] as $surveyVoter):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $surveyVoter['id'];?></td>
			<td><?php echo $surveyVoter['user_id'];?></td>
			<td><?php echo $surveyVoter['survey_id'];?></td>
			<td><?php echo $surveyVoter['survey_value_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'survey_voters', 'action' => 'view', $surveyVoter['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'survey_voters', 'action' => 'edit', $surveyVoter['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'survey_voters', 'action' => 'delete', $surveyVoter['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $surveyVoter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Survey Voter', true), array('controller' => 'survey_voters', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related User Profiles');?></h3>
	<?php if (!empty($user['UserProfile'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Label'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['UserProfile'] as $userProfile):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $userProfile['id'];?></td>
			<td><?php echo $userProfile['label'];?></td>
			<td><?php echo $userProfile['value'];?></td>
			<td><?php echo $userProfile['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'user_profiles', 'action' => 'view', $userProfile['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'user_profiles', 'action' => 'edit', $userProfile['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'user_profiles', 'action' => 'delete', $userProfile['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userProfile['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Profile', true), array('controller' => 'user_profiles', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
