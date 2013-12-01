<div class="main">
    <div class="left">
        <div class="left-colum">
                <div class="left-colum-title"><span>Haberler</span></div>
            <div class="left-colum-comment"></div>
            <div class="left-colum-footer"></div>
        </div>
    </div>
    <div class="right">
        <?php foreach ($posts as $post) {?>
        <div class="post">
			<?php if (isset($post['Image'])) { ?>
            <div class="postImg"><?=$this->Html->image($post['Image']['Main']['kucuk'],Array('title' => $post['Post']['name_' . $lang['Short']]))?></div>
			<?php } ?>
            <div class="postRight">
            	<div class="title"><?=$this->Html->link($post['Post']['name_' . $lang['Short']],Array('language' => $lang['Short'],'controller' => 'posts','action' => 'view',$post['Post']['id']),array('title' => $post['Post']['name_' . $lang['Short']]))?></div>
                                <div class="desc"><?=$post['Post']['label_' . $lang['Short']]?></div>
                                <div class="read"><?=$post['Post']['seencount'] ?> Okuma</div>
                                <div class="link"><a href="view/<?=$post['Post']['id']?>">Haber Oku</a></div>
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
