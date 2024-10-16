<?php

class CT_CtNavigationMenu_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_navigation_menu';
    protected $title = 'Navigation Menu';
    protected $icon = 'eicon-menu-bar';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"menu","label":"Select Menu","type":"select","options":{"main-menu":"Main Menu","mennu-footer-links":"Mennu Footer Links","menu-landing":"Menu Landing","menu-one-page-1":"Menu One Page 1","menu-one-page-2":"Menu One Page 2","menu-one-page-3":"Menu One Page 3","menu-secondary":"Menu Secondary","menu-services":"Menu Services"}},{"name":"style","label":"Style","type":"select","options":{"default":"Default","style1":"Style 1 (Light)"},"default":"default"},{"name":"link_color","label":"Link Color","type":"color","selectors":{"{{WRAPPER}} .ct-navigation-menu1.style1 a":"color: {{VALUE}};","{{WRAPPER}} .ct-navigation-menu1.style1 a span::before":"background-color: {{VALUE}};"},"condition":{"style":["style1"]}},{"name":"link_color_hover","label":"Link Color Hover","type":"color","selectors":{"{{WRAPPER}} .ct-navigation-menu1.style1 a:hover":"color: {{VALUE}};","{{WRAPPER}} .ct-navigation-menu1.style1 a:hover span::before":"background-color: {{VALUE}};"},"condition":{"style":["style1"]}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}