    <div class="grid_12 showcase">
        <a href="<?php echo Router::url(array('language' => $this->Session->read('Config.language'), 'controller' => 'product_groups', 'id' => 3, 'slug' => 'yer_ekipmanlari')); ?>">
            <div class="grid_6 alpha omega yer_hizmetleri">
                <div class="image core_animation_fast">&nbsp;</div>
                <div class="button core_animation_fast">&nbsp;</div>
                <div class="content">
                    <h3>YER HİZMETLERİ EKİPMANLARI</h3>
                    <p>DHI  with  its  experiences since 1972 responding all needs of airport ground services as well as transport industry. DHI  with  its  experiences since 1972 responding all needs of airport ground services as well as transport industry.</p>
                </div>
            </div>
        </a>
        <a href="<?php echo Router::url(array('language' => $this->Session->read('Config.language'), 'controller' => 'product_groups', 'id' => 4, 'slug' => 'led_ekipmanlari')); ?>">
            <div class="grid_6 alpha omega led_urunler">
                <div class="image core_animation_fast">&nbsp;</div>
                <div class="button core_animation_fast">&nbsp;</div>
                <div class="content">
                    <h3>ENDÜSTRİYEL LED AYDINLATMA</h3>
                    <p>DHI  with  its  experiences since 1972 responding all needs of airport ground services as well as transport industry. DHI  with  its  experiences since 1972 responding all needs of airport ground services as well as transport industry.</p>
                </div>
            </div>
        </a>
    </div>
    <div class="grid_12 content">
        <div class="grid_6 alpha news">
            <h5><?php echo __('DUYURU & HABERLER'); ?></h5>
            <?php foreach ($posts as $post) { ?>
                <div class="node">
                    <div class="header"><?php echo $post['Post']['name' . $langPrefix]; ?></div>
                    <div class="content">
                        <?php echo $post['Post']['label' . $langPrefix]; ?>
                    </div>
                    <div class="link">
                        <a href="<?php echo Router::url(array('language' => $this->Session->read('Config.language'), 'controller' => 'posts')) . '#post_' . $post['Post']['id']; ?>"><?php echo __('devamı'); ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="grid_6 omega new-products">
            <h5><?php echo __('YENİ ÜRÜNLER'); ?></h5>
            <?php foreach ($products as $product) { ?>
                <a href="<?php echo Router::url(array('controller' => 'product', 'id' => $product['Product']['id'], 'slug' => $this->Genel->seo_tr($product['Product']['name' . $langPrefix]))); ?>" class="product">
                    <div class="image" style='padding-bottom:0px;'>
                        <?php if(isset($product["Image"]['Main'])) { $cursor = 1;?>
                            <?php echo $this->Html->image($product["Image"]['Main']["medium"]); ?>
                        <?php } ?>
                    </div>
                    <div class="shadow">&nbsp;</div>
                    <div class="header"><?php echo $product['Product']['name'. $langPrefix]; ?></div>
                </a>
            <?php } ?>
        </div>
    </div>
