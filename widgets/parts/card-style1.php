<div class="card-item">
    <div class="card-thumb">
    <img src="<?php echo esc_url($card_image['url'])?>" alt="">
        <?php if (($card_name) || ($card_icon)) : ?>
            <div class="card-data">
                <?php if($card_icon_hide == 'yes') : ?>
                    <div class="card-icon <?php echo $icon_style_layout ?>">
                        <?php \Elementor\Icons_Manager::render_icon($card_icon, ['aria-hidden' => 'true']);?>
                    </div>
                <?php endif;?>
                <?php if($card_name) : ?>
                    <h4><?php echo esc_html($card_name)?></h4>
                <?php endif;?>
            </div>
        <?php endif;?>
    </div>
</div>