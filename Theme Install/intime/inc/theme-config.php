<?php
if(!function_exists('intime_configs')){
    function intime_configs($value){
         
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'intime').' ('.intime_get_opt('primary_color', '#c20b0b').')', 
                    'value' => intime_get_opt('primary_color', '#c20b0b')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'intime').' ('.intime_get_opt('secondary_color', '#191919').')', 
                    'value' => intime_get_opt('secondary_color', '#191919')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'intime').' ('.intime_get_opt('third_color', '#ff4b16').')', 
                    'value' => intime_get_opt('third_color', '#ff4b16')
                ],
                'dark'   => [
                    'title' => esc_html__('Dark', 'intime').' ('.intime_get_opt('dark_color', '#000').')', 
                    'value' => intime_get_opt('dark_color', '#000')
                ]
            ],
            'link' => [
                'color' => intime_get_opt('link_color', ['regular' => '#c20b0b'])['regular'],
                'color-hover'   => intime_get_opt('link_color', ['hover' => '#880c0c'])['hover'],
                'color-active'  => intime_get_opt('link_color', ['active' => '#880c0c'])['active'],
            ],
            'gradient' => [
                'color-from' => intime_get_opt('gradient_color', ['from' => '#fb5850'])['from'],
                'color-to' => intime_get_opt('gradient_color', ['to' => '#ffa200'])['to'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('intime_inline_styles')) {
    function intime_inline_styles() {  
        
        $theme_colors      = intime_configs('theme_colors');
        $link_color        = intime_configs('link');
        $gradient_color        = intime_configs('gradient');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  intime_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            } 
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s-rgb: %2$s;', $color, intime_hex_rgb($value));
            }
        echo '}';

        return ob_get_clean();
         
    }
}
 