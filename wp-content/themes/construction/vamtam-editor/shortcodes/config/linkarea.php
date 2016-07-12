<?php
return array(
	'name' => __( 'Box with a Link', 'construction' ) ,
	'desc' => __( 'You can set a link, background color and hover color to a section of the website and place your content there.' , 'construction' ),
	'icon' => array(
		'char' => WPV_Editor::get_icon( 'link5' ),
		'size' => '30px',
		'lheight' => '40px',
		'family' => 'vamtam-editor-icomoon',
	),
	'value' => 'linkarea',
	'controls' => 'size name clone edit delete',
	'options' => array(
		array(
			'name' => __( 'Background Color', 'construction' ) ,
			'id' => 'background_color',
			'default' => '',
			'prompt' => __( 'No background', 'construction' ),
			'options' => array(
				'accent1' => __( 'Accent 1', 'construction' ),
				'accent2' => __( 'Accent 2', 'construction' ),
				'accent3' => __( 'Accent 3', 'construction' ),
				'accent4' => __( 'Accent 4', 'construction' ),
				'accent5' => __( 'Accent 5', 'construction' ),
				'accent6' => __( 'Accent 6', 'construction' ),
				'accent7' => __( 'Accent 7', 'construction' ),
				'accent8' => __( 'Accent 8', 'construction' ),
			),
			'type' => 'select'
		) ,
		array(
			'name' => __( 'Hover Color', 'construction' ) ,
			'id' => 'hover_color',
			'default' => 'accent1',
			'prompt' => __( 'No background', 'construction' ),
			'options' => array(
				'accent1' => __( 'Accent 1', 'construction' ),
				'accent2' => __( 'Accent 2', 'construction' ),
				'accent3' => __( 'Accent 3', 'construction' ),
				'accent4' => __( 'Accent 4', 'construction' ),
				'accent5' => __( 'Accent 5', 'construction' ),
				'accent6' => __( 'Accent 6', 'construction' ),
				'accent7' => __( 'Accent 7', 'construction' ),
				'accent8' => __( 'Accent 8', 'construction' ),
			),
			'type' => 'select'
		) ,

		array(
			'name' => __( 'Link', 'construction' ) ,
			'id' => 'href',
			'default' => '',
			'type' => 'text',
		) ,

		array(
			"name" => __( "Target", 'construction' ) ,
			"id" => "target",
			"default" => '_self',
			"options" => array(
				"_blank" => __( 'Load in a new window', 'construction' ) ,
				"_self" => __( 'Load in the same frame as it was clicked', 'construction' ) ,
			) ,
			"type" => "select",
		) ,

		array(
			'name' => __( 'Contents', 'construction' ) ,
			'id' => 'html-content',
			'default' => __('This is Photoshop’s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.', 'construction'),
			'type' => 'editor',
			'holder' => 'textarea',
		) ,

		array(
			'name' => __( 'Icon', 'construction' ) ,
			'desc' => __( 'This option overrides the "Image" option.', 'construction' ),
			'id' => 'icon',
			'default' => '',
			'type' => 'icons',
		) ,
		array(
			"name" => __( "Icon Color", 'construction' ) ,
			"id" => "icon_color",
			"default" => 'accent6',
			"prompt" => '',
			"options" => array(
				'accent1' => __( 'Accent 1', 'construction' ),
				'accent2' => __( 'Accent 2', 'construction' ),
				'accent3' => __( 'Accent 3', 'construction' ),
				'accent4' => __( 'Accent 4', 'construction' ),
				'accent5' => __( 'Accent 5', 'construction' ),
				'accent6' => __( 'Accent 6', 'construction' ),
				'accent7' => __( 'Accent 7', 'construction' ),
				'accent8' => __( 'Accent 8', 'construction' ),
			) ,
			"type" => "select",
		) ,
		array(
			'name' => __( 'Icon Size', 'construction' ),
			'id' => 'icon_size',
			'type' => 'range',
			'default' => 62,
			'min' => 8,
			'max' => 100,
		),

		array(
			'name' => __( 'Image', 'construction' ) ,
			'desc' => __( 'The image will appear above the content.<br/><br/>', 'construction' ),
			'id' => 'image',
			'default' => '',
			'type' => 'upload',
		) ,

		array(
			'name'    => __( 'Element Animation (optional)', 'construction' ) ,
			'id'      => 'column_animation',
			'default' => 'none',
			'type'    => 'select',
			'options' => array(
				'none'        => __( 'No animation', 'construction' ),
				'from-left'   => __( 'Appear from left', 'construction' ),
				'from-right'  => __( 'Appear from right', 'construction' ),
				'from-top'    => __( 'Appear from top', 'construction' ),
				'from-bottom' => __( 'Appear from bottom', 'construction' ),
				'fade-in'     => __( 'Fade in', 'construction' ),
				'zoom-in'     => __( 'Zoom in', 'construction' ),
			),
		) ,
	) ,
);
