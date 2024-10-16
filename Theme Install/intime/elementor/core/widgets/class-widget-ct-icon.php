<?php

class CT_CtIcon_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_icon';
    protected $title = 'Icons';
    protected $icon = 'eicon-alert';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_icon","label":"Icons","tab":"content","controls":[{"name":"icons","label":"Icons","type":"repeater","controls":[{"name":"ct_icon","label":"Icon","type":"icons","fa4compatibility":"icon","default":{"value":"fas fa-star","library":"fa-solid"}},{"name":"icon_link","label":"Icon Link","type":"url","label_block":true},{"name":"icon_color","label":"Icon Color","type":"color"},{"name":"icon_color_hover","label":"Icon Color Hover","type":"color"}]},{"name":"style","label":"Style","type":"select","options":{"style1":"Style 1"},"default":"style1"},{"name":"align","label":"Alignment","type":"choose","control_type":"responsive","options":{"left":{"title":"Left","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"right":{"title":"Right","icon":"eicon-text-align-right"}},"selectors":{"{{WRAPPER}} .ct-icon1":"text-align: {{VALUE}};"}},{"name":"icon_color","label":"Link Color","type":"color","default":"","selectors":{"{{WRAPPER}} .ct-icon1 a":"color: {{VALUE}};"}},{"name":"icon_color_hover","label":"Link Color Hover","type":"color","default":"","selectors":{"{{WRAPPER}} .ct-icon1 a:hover":"color: {{VALUE}};"}},{"name":"icon_typography","label":"Icon Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-icon1 a"},{"name":"icon_space","label":"Icon Spacer","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .ct-icon1 a":"margin-right: {{SIZE}}{{UNIT}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}