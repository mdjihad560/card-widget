<div class="card-item">
		<div class="card-thumb">
			<img src="<?php echo esc_url($card_image['url'])?>" alt="">
            <div class="card-data">
                <?php if($card_icon) : ?>
                <div class="card-icon">
                    <?php 
                    \Elementor\Icons_Manager::render_icon($card_icon, ['aria-hidden' => 'true']);
                    ?>
                </div>
                
                <?php endif;?>
                <?php if($card_name) : ?>
                <h4><?php echo esc_html($card_name)?></h4>
                <?php endif;?>
            </div>
		</div>
    
		<?php if (($card_name) || ($card_icon)) : ?>
        
    <?php endif;?>
</div>