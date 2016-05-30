<?php
$icon    = NULL;
$title   = NULL;
$link    = NULL;
$button  = NULL;

$link_class = NULL;
$link_icon  = NULL;

$icon   = $atts['icon'];
$title  = $atts['title'];
$link   = $atts['link'];
$button = $atts['button'];

if ( ! empty( $link ) ) {
	
	if ( empty( $button ) ) {
		$button = 'Read More';
	}
	
	$link_class = ' iconlink';
	$link_icon  = '<p class="iconurl"><a href="' . $link . '">' . $button . '</a></p>';
}

echo '<div class="iconfull style1' . $link_class . '">',
	 '<div class="iconimage"><img src="' . get_template_directory_uri() . '/images/icons/color/' . $icon . '.png" alt=""></div>',
	 '<div class="iconmain">',
	 '<h3>' . $title . '</h3>',
	 '<p>' . $content . '</p>',
	 $link_icon,
	 '</div>',
	 '</div>';


?>