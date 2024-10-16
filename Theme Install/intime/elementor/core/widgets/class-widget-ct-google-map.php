<?php

class CT_CtGoogleMap_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_google_map';
    protected $title = 'Google Maps';
    protected $icon = 'eicon-google-maps';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"address","label":"Address","type":"text","default":"New York, United States"},{"name":"coordinate","label":"Coordinate","type":"text","default":"40.6976684,-74.2605501"},{"name":"infoclick","label":"Click Show Info Window","type":"switcher"},{"name":"markercoordinate","label":"Marker Coordinate","type":"text","description":"Enter marker coordinate of Map, format input (latitude, longitude)","default":"40.6976684,-74.2605501"},{"name":"markericon","label":"Marker Icon","type":"media","description":"Select image icon for marker"},{"name":"infowidth","label":"Info Window Max Width","type":"text","description":"Set max width for info window"},{"name":"type","label":"Map Type","type":"select","options":{"ROADMAP":"ROADMAP","HYBRID":"HYBRID","SATELLITE":"SATELLITE","TERRAIN":"TERRAIN"},"default":"ROADMAP","description":"Select the map type."},{"name":"style","label":"Style Template","type":"select","options":{"":"Google Default","light-monochrome":"Light Monochrome","blue-water":"Blue water","midnight-commander":"Midnight Commander","paper":"Paper","red-hues":"Red Hues","hot-pink":"Hot Pink","custom":"Custom"},"default":"","description":"Select the map template."},{"name":"content","label":"Custom Template","type":"code","language":"json","description":"Get template from snazzymaps.com","condition":{"style":"custom"}},{"name":"zoom","label":"Zoom","type":"text","default":13,"description":"Set max width for info window"},{"name":"width","label":"Width","type":"text","default":"auto","description":"Width of map without pixel, default is auto"},{"name":"height","label":"Height","type":"text","default":"350px","description":"Height of map without pixel, default is 350px"},{"name":"scrollwheel","label":"Scroll Wheel","type":"switcher","description":"Height of map without pixel, default is 350px"},{"name":"pancontrol","label":"Pan Control","type":"switcher","description":"Height of map without pixel, default is 350px"},{"name":"zoomcontrol","label":"Zoom Control","type":"switcher","description":"Height of map without pixel, default is 350px"},{"name":"scalecontrol","label":"Scale Control","type":"switcher","description":"Height of map without pixel, default is 350px"},{"name":"maptypecontrol","label":"Map Type Control","type":"switcher","description":"Height of map without pixel, default is 350px"},{"name":"streetviewcontrol","label":"Street View Control","type":"switcher","description":"Height of map without pixel, default is 350px"},{"name":"overviewmapcontrol","label":"Over View Map Control","type":"switcher","description":"Height of map without pixel, default is 350px"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'maps-googleapis','custom-gm-widget-js' );
}