<?php
$default_settings = [
    'wg_title' => '',
    'portfolio_content' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="ct-portfolio-detail">
    <?php if(!empty($wg_title)) : ?>
        <h3 class="wg-title"><?php echo esc_attr($wg_title); ?></h3>
    <?php endif; ?>
    <?php if(isset($portfolio_content) && !empty($portfolio_content) && count($portfolio_content)): ?>
        <ul>
            <?php foreach ($portfolio_content as $key => $value):
                $label = isset($value['label']) ? $value['label'] : '';
                $content = isset($value['content']) ? $value['content'] : '';
                $icon_key = $widget->get_repeater_setting_key( 'ct_icon', 'icons', $key );
                $has_icon = ! empty( $value['ct_icon'] );
                $widget->add_render_attribute( $icon_key, [
                    'class' => $value['ct_icon'],
                    'aria-hidden' => 'true',
                ] );
                ?>
                <li>
                    <?php
                        if($is_new):
                            \Elementor\Icons_Manager::render_icon( $value['ct_icon'], [ 'aria-hidden' => 'true' ] );
                    ?>
                    <?php else: ?>
                        <i <?php ct_print_html($widget->get_render_attribute_string( $icon_key )); ?>></i>
                    <?php endif; ?>
                    <?php if(!empty($label)) : ?>
                        <label><?php echo esc_attr($label); ?></label>
                    <?php endif; ?>
                    <?php if(!empty($content)) : ?>
                        <span><?php echo esc_attr($content); ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>