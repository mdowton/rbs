<?php

function wpv_shortcode_icon( $atts, $content = null ) {
	$raw_atts = $atts;
	$atts = shortcode_atts( array(
		'name'       => '',
		'style'      => '',
		'color'      => '',
		'size'       => '',
		'lheight'    => 1,
		'link_hover' => true,
	), $atts );

	$icon_char = wpv_get_icon( $atts['name'] );

	$collection = strpos( $atts['name'], 'theme-' ) === 0 ? 'theme' : '';
	$color      = wpv_sanitize_accent( $atts['color'] );
	$style      = '';

	if ( ! empty( $color ) ) {
		$style = "color:$color;";

		if ( $atts['style'] === 'inverted-colors' ) {
			$less_source = "
				.readable-color($color);
				background: $color;
			";

			$l = new WpvLessc();

			$l->importDir = '.';
			$l->setFormatter( "compressed" );

			$style = $l->compile( WpvTemplates::readable_color_mixin() . $less_source );
		}
	}

	$style .= ( ( int ) $atts['lheight'] !== 1 && ( int )$atts['lheight'] !== ( int ) $atts['size'] ) ? "line-height:{$atts['lheight']};" : '';

	if ( ! empty( $atts['size'] ) ) {
		if ( substr( $atts['size'], -2 ) !== 'em' ) {
			$atts['size'] .= 'px';
		}

		$style .= "font-size:{$atts['size']} !important;";
	}

	$class = array( $collection, $atts['style'] );

	if ( $atts['link_hover'] ) {
		$class[] = 'use-hover';
	}

	$class = implode( ' ', $class );

	return "<span class='icon shortcode $class' style='{$style}'>$icon_char</span>";
}
add_shortcode( 'icon', 'wpv_shortcode_icon' );

function wpv_all_icons( $atts, $content = null ) {
	$icons = array_keys( wpv_get_icons_extended() );

	ob_start();

	echo '<table class="vamtam-styled"><tr>';
	foreach ( $icons as $i => $icon ) {
		echo do_shortcode( '<td>[icon name="' . $icon . '" size="24"]</td><td>' . $icon . '</td>' ); // xss ok
		if ( $i % 3 === 2 )
			echo '</tr><tr>';
	}
	echo '</tr></table>';

	return ob_get_clean();
}
add_shortcode( 'all_vamtam_icons', 'wpv_all_icons' );