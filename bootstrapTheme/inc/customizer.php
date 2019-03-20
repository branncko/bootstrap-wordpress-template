<?php 


function bs4wp_customizer_register($wp_customize) {
    //Rodapé
    $wp_customize -> add_section('footer', array(
    	'title' => __('Rodapé', 'BS4WP'),
    	'description' => sprintf(__('Opções para o rodapé', 'BS4WP')),
    	'priority' => 20

    ));

    $wp_customize -> add_setting('footer_title', array(
        'default' => _x('Meu primeiro tema Wordpress', 'BS4WP'),
        'type' => 'theme_mod'
    ));

    $wp_customize -> add_control('footer_title', array(
    	'label' => __('Titulo do rodapé'),
    	'section' => 'footer',
    	'priority' => 1
    ));

    $wp_customize -> add_setting('footer_text', array(
        'default' => _x('Feito por mim com muita dedicação e esforço', 'BS4WP'),
        'type' => 'theme_mod'
    ));

    $wp_customize -> add_control('footer_text', array(
    	'label' => __('Texto do rodapé'),
    	'section' => 'footer',
    	'priority' => 2
    ));

    $wp_customize -> add_section('header', array(
    	'title' => __('Cabeçalho', 'BS4WP'),
    	'description' => sprintf(__('Opções para o cabeçalho', 'BS4WP')),
    	'priority' => 20

    ));

    $wp_customize -> add_setting('header_title', array(
        'default' => _x('BS4WP', 'BS4WP'),
        'type' => 'theme_mod'
    ));

    $wp_customize -> add_control('header_title', array(
    	'label' => __('Titulo do cabeçalho'),
    	'section' => 'header',
    	'priority' => 1
    ));

    $wp_customize -> add_setting('header_text', array(
        'default' => _x('Meu primeiro tema com wordpress e bootstrap', 'BS4WP'),
        'type' => 'theme_mod'
    ));

    $wp_customize -> add_control('header_text', array(
    	'label' => __('Texto do cabeçalho'),
    	'section' => 'header',
    	'priority' => 2
    ));
}

add_action('customize_register', 'bs4wp_customizer_register');
?>