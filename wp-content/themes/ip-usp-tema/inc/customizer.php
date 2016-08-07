<?php
/**
 * _s Theme Customizer
 *
 * @package unite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function unite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $ipusp_sections = array(
	    'ipusp_theme_options' => array(
	        'title' => __('Imagem de fundo', 'ipusp'),
	        'description' => '',
	        'panel' => '',
	        'priority' => 2,
	    )
    );

    $ipusp_options = array(
	    'home_background_img' => array(
	        'label' => __('Imagem de fundo da Home', 'ipusp'),
	        'transport' => 'postMessage',
	        'type' => 'image',
	        'section' => 'ipusp_theme_options',
	        'default' => '',
	    ),
    );

    $theme_option = "ipusp_options";
    $option_type = "option";
    $capability = "edit_theme_options";

    $ipusp_sections = apply_filters('ipusp_customizer_sections', $ipusp_sections);
    $ipusp_options = apply_filters('ipusp_customizer_options', $ipusp_options);

    foreach($ipusp_sections as $id => $args){
        $wp_customize->add_section($id, $args);
    }

    foreach($ipusp_options as $id => $args){
        extract( $args );

        switch( $type ) {
    		case 'image':
                $wp_customize->add_setting($theme_option.'['.$id.']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'esc_url_raw',
                ));

                $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $id, array(
                    'label' => $label,
                    'section' => $section,
                    'settings' => $theme_option.'['.$id.']',
                )));
                break;
        }
    }
}
add_action( 'customize_register', 'unite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function unite_customize_preview_js() {
	wp_enqueue_script( 'unite_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'unite_customize_preview_js' );
