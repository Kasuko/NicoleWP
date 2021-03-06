<?php
/**
 * Social media functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	HEADER STYLE
---------------------------------------------------------------------------------- */
function thinkup_input_headerstyle($classes) {
global $thinkup_header_styleswitch;

global $post;
$_thinkup_meta_headerstyle = get_post_meta( $post->ID, '_thinkup_meta_headerstyle', true );

	if ( empty( $_thinkup_meta_headerstyle ) or $_thinkup_meta_headerstyle == 'option1' ) {
		if ( empty( $thinkup_header_styleswitch ) or $thinkup_header_styleswitch == 'option1' ) {
			$classes[] = 'header-style1';
		} else if ( $thinkup_header_styleswitch == 'option2' ) {	
			$classes[] = 'header-style2';
		}
	} else if ( $_thinkup_meta_headerstyle == 'option2' ) {
		$classes[] = 'header-style1';
	} else if ( $_thinkup_meta_headerstyle == 'option3' ) {
		$classes[] = 'header-style2';
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_headerstyle' );


/* ----------------------------------------------------------------------------------
	STICKY HEADER
---------------------------------------------------------------------------------- */
function thinkup_input_headersticky($classes) {
global $thinkup_header_stickyswitch;

	if ( $thinkup_header_stickyswitch == '1' ) {
		$classes[] = 'header-sticky';
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_headersticky' );


/* ----------------------------------------------------------------------------------
	HEADER IMAGE
---------------------------------------------------------------------------------- */

function thinkup_input_headerimage() {
global $thinkup_header_imageswitch;
global $thinkup_header_imagelink;
global $thinkup_header_imageurl;
global $thinkup_header_imagewidth;

$link_start   = NULL;
$link_end     = NULL;
$header_class = NULL;

	if ( $thinkup_header_imageswitch == '1' ) {

		// Determine if link should be added to image
		if ( ! empty( $thinkup_header_imageurl ) ) {
			$link_start = '<a class="header-image" href="' . $thinkup_header_imageurl . '">';
			$link_end   = '</a>';
		}

		// Determine if image should be boxed
		if ( $thinkup_header_imagewidth == '1' ) {
		$header_class = ' class="header-image-boxed"';
		}

		// Output header image
		echo '<div id="header-image"' . $header_class . '>';
		echo $link_start;
		echo '<img src="' . $thinkup_header_imagelink .'">';
		echo $link_end;
		echo '</div>';
	}
}


/* ----------------------------------------------------------------------------------
	SEARCH - DISABLE SEARCH
---------------------------------------------------------------------------------- */
function thinkup_input_headersearch() {
global $thinkup_header_searchswitch;

	if ( $thinkup_header_searchswitch == '1' ) {
		echo '<div id="pre-header-search">',
		     get_search_form(),
		     '</div>';
	}
}

/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - DISPLAY MESSAGE
---------------------------------------------------------------------------------- */

/* Message Settings */
function thinkup_input_socialmessage(){
global $thinkup_header_socialmessage;
global $thinkup_header_facebookswitch;
global $thinkup_header_twitterswitch;
global $thinkup_header_googleswitch;
global $thinkup_header_instagramswitch;
global $thinkup_header_tumblrswitch;
global $thinkup_header_linkedinswitch;
global $thinkup_header_flickrswitch;
global $thinkup_header_pinterestswitch;
global $thinkup_header_xingswitch;
global $thinkup_header_paypalswitch;
global $thinkup_header_youtubeswitch;
global $thinkup_header_vimeoswitch;
global $thinkup_header_rssswitch;
global $thinkup_header_emailswitch;

	if ( empty( $thinkup_header_facebookswitch ) 
		and empty( $thinkup_header_twitterswitch ) 
		and empty( $thinkup_header_googleswitch ) 
		and empty( $thinkup_header_instagramswitch ) 
		and empty( $thinkup_header_tumblrswitch ) 
		and empty( $thinkup_header_linkedinswitch ) 
		and empty( $thinkup_header_flickrswitch ) 
		and empty( $thinkup_header_pinterestswitch ) 
		and empty( $thinkup_header_xingswitch ) 
		and empty( $thinkup_header_paypalswitch ) 
		and empty( $thinkup_header_lastfmswitch ) 
		and empty( $thinkup_header_youtubeswitch ) 
		and empty( $thinkup_header_vimeoswitch ) 
		and empty( $thinkup_header_rssswitch ) 
		and empty( $thinkup_header_emailswitch ) ) {	
		return '';
	} else if ( ! empty( $thinkup_header_socialmessage ) ) {	
		return $thinkup_header_socialmessage;
	} else if ( empty( $thinkup_header_socialmessage ) ) {
		return '';
	}
}


/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - CUSTOM ICONS
---------------------------------------------------------------------------------- */

/* Facebook - Custom Icon */
function thinkup_input_facebookicon(){
global $thinkup_header_facebookiconswitch;
global $thinkup_header_facebookcustomicon;

	$output = NULL;

	if ( $thinkup_header_facebookiconswitch == '1' and ! empty( $thinkup_header_facebookcustomicon ) ) {
		$output .= '#pre-header-social li.facebook a,';
		$output .= '#pre-header-social li.facebook a:hover {';
		$output .= 'background: url("' . $thinkup_header_facebookcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.facebook i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Twitter - Custom Icon */
function thinkup_input_twittericon(){
global $thinkup_header_twittericonswitch;
global $thinkup_header_twittercustomicon;

	$output = NULL;

	if ( $thinkup_header_twittericonswitch == '1' and ! empty( $thinkup_header_twittercustomicon ) ) {
		$output .= '#pre-header-social li.twitter a,';
		$output .= '#pre-header-social li.twitter a:hover {';
		$output .= 'background: url("' . $thinkup_header_twittercustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.twitter i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Google+ - Custom Icon */
function thinkup_input_googleicon(){
global $thinkup_header_googleiconswitch;
global $thinkup_header_googlecustomicon;

	$output = NULL;

	if ( $thinkup_header_googleiconswitch == '1' and ! empty( $thinkup_header_googlecustomicon ) ) {
		$output .= '#pre-header-social li.google-plus a,';
		$output .= '#pre-header-social li.google-plus a:hover {';
		$output .= 'background: url("' . $thinkup_header_googlecustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.google-plus i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Instagram - Custom Icon */
function thinkup_input_instagramicon(){
global $thinkup_header_instagramiconswitch;
global $thinkup_header_instagramcustomicon;

	$output = NULL;

	if ( $thinkup_header_instagramiconswitch == '1' and ! empty( $thinkup_header_instagramcustomicon ) ) {
		$output .= '#pre-header-social li.instagram a,';
		$output .= '#pre-header-social li.instagram a:hover {';
		$output .= 'background: url("' . $thinkup_header_instagramcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.instagram i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Tumblr - Custom Icon */
function thinkup_input_tumblricon(){
global $thinkup_header_tumblriconswitch;
global $thinkup_header_tumblrcustomicon;

	$output = NULL;

	if ( $thinkup_header_tumblriconswitch == '1' and ! empty( $thinkup_header_tumblrcustomicon ) ) {
		$output .= '#pre-header-social li.tumblr a,';
		$output .= '#pre-header-social li.tumblr a:hover {';
		$output .= 'background: url("' . $thinkup_header_tumblrcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.tumblr i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* LinkedIn - Custom Icon */
function thinkup_input_linkedinicon(){
global $thinkup_header_linkediniconswitch;
global $thinkup_header_linkedincustomicon;

	$output = NULL;

	if ( $thinkup_header_linkediniconswitch == '1' and ! empty( $thinkup_header_linkedincustomicon ) ) {
		$output .= '#pre-header-social li.linkedin a,';
		$output .= '#pre-header-social li.linkedin a:hover {';
		$output .= 'background: url("' . $thinkup_header_linkedincustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.linkedin i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Flickr - Custom Icon */
function thinkup_input_flickricon(){
global $thinkup_header_flickriconswitch;
global $thinkup_header_flickrcustomicon;

	$output = NULL;

	if ( $thinkup_header_flickriconswitch == '1' and ! empty( $thinkup_header_flickrcustomicon ) ) {
		$output .= '#pre-header-social li.flickr a,';
		$output .= '#pre-header-social li.flickr a:hover {';
		$output .= 'background: url("' . $thinkup_header_flickrcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.flickr i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Pinterest - Custom Icon */
function thinkup_input_pinteresticon(){
global $thinkup_header_pinteresticonswitch;
global $thinkup_header_pinterestcustomicon;

	$output = NULL;

	if ( $thinkup_header_pinteresticonswitch == '1' and ! empty( $thinkup_header_pinterestcustomicon ) ) {
		$output .= '#pre-header-social li.pinterest a,';
		$output .= '#pre-header-social li.pinterest a:hover {';
		$output .= 'background: url("' . $thinkup_header_pinterestcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.pinterest i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Xing - Custom Icon */
function thinkup_input_xingicon(){
global $thinkup_header_xingiconswitch;
global $thinkup_header_xingcustomicon;

	$output = NULL;

	if ( $thinkup_header_xingiconswitch == '1' and ! empty( $thinkup_header_xingcustomicon ) ) {
		$output .= '#pre-header-social li.xing a,';
		$output .= '#pre-header-social li.xing a:hover {';
		$output .= 'background: url("' . $thinkup_header_xingcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.xing i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* PayPal - Custom Icon */
function thinkup_input_paypalicon(){
global $thinkup_header_paypaliconswitch;
global $thinkup_header_paypalcustomicon;

	$output = NULL;

	if ( $thinkup_header_paypaliconswitch == '1' and ! empty( $thinkup_header_paypalcustomicon ) ) {
		$output .= '#pre-header-social li.paypal a,';
		$output .= '#pre-header-social li.paypal a:hover {';
		$output .= 'background: url("' . $thinkup_header_paypalcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.paypal i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* YouTube - Custom Icon */
function thinkup_input_youtubeicon(){
global $thinkup_header_youtubeiconswitch;
global $thinkup_header_youtubecustomicon;

	$output = NULL;

	if ( $thinkup_header_youtubeiconswitch == '1' and ! empty( $thinkup_header_youtubecustomicon ) ) {
		$output .= '#pre-header-social li.youtube a,';
		$output .= '#pre-header-social li.youtube a:hover {';
		$output .= 'background: url("' . $thinkup_header_youtubecustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.youtube i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Vimeo - Custom Icon */
function thinkup_input_vimeoicon(){
global $thinkup_header_vimeoiconswitch;
global $thinkup_header_vimeocustomicon;

	$output = NULL;

	if ( $thinkup_header_vimeoiconswitch == '1' and ! empty( $thinkup_header_vimeocustomicon ) ) {
		$output .= '#pre-header-social li.vimeo-square a,';
		$output .= '#pre-header-social li.vimeo-square a:hover {';
		$output .= 'background: url("' . $thinkup_header_vimeocustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.vimeo-square i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* RSS - Custom Icon */
function thinkup_input_rssicon(){
global $thinkup_header_rssiconswitch;
global $thinkup_header_rsscustomicon;

	$output = NULL;

	if ( $thinkup_header_rssiconswitch == '1' and ! empty( $thinkup_header_rsscustomicon ) ) {
		$output .= '#pre-header-social li.rss a,';
		$output .= '#pre-header-social li.rss a:hover {';
		$output .= 'background: url("' . $thinkup_header_rsscustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.rss i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Email - Custom Icon */
function thinkup_input_emailicon(){
global $thinkup_header_emailiconswitch;
global $thinkup_header_emailcustomicon;

	$output = NULL;

	if ( $thinkup_header_emailiconswitch == '1' and ! empty( $thinkup_header_emailcustomicon ) ) {
		$output .= '#pre-header-social li.envelope a,';
		$output .= '#pre-header-social li.envelope a:hover {';
		$output .= 'background: url("' . $thinkup_header_emailcustomicon . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.envelope i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";
	}
	return $output;
}

/* Input Custom Social Media Icons */
function thinkup_input_socialicon(){

	$output = NULL;
	
	$output .= thinkup_input_facebookicon();
	$output .= thinkup_input_twittericon();
	$output .= thinkup_input_googleicon();
	$output .= thinkup_input_instagramicon();
	$output .= thinkup_input_tumblricon();
	$output .= thinkup_input_linkedinicon();
	$output .= thinkup_input_flickricon();
	$output .= thinkup_input_pinteresticon();
	$output .= thinkup_input_xingicon();
	$output .= thinkup_input_paypalicon();
	$output .= thinkup_input_youtubeicon();
	$output .= thinkup_input_vimeoicon();
	$output .= thinkup_input_rssicon();
	$output .= thinkup_input_emailicon();

	if ( ! empty( $output ) ) {
		echo    '<style type="text/css">' . "\n" . $output . '</style>';
	}
}
add_action( 'wp_head', 'thinkup_input_socialicon', 13 );


/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - OUTPUT SOCIAL MEDIA SELECTIONS
---------------------------------------------------------------------------------- */

function thinkup_input_socialmedia() {
global $thinkup_header_socialswitch;
global $thinkup_header_socialmessage;
global $thinkup_header_facebookswitch;
global $thinkup_header_facebooklink;
global $thinkup_header_twitterswitch;
global $thinkup_header_twitterlink;
global $thinkup_header_googleswitch;
global $thinkup_header_googlelink;
global $thinkup_header_instagramswitch;
global $thinkup_header_instagramlink;
global $thinkup_header_tumblrswitch;
global $thinkup_header_tumblrlink;
global $thinkup_header_linkedinswitch;
global $thinkup_header_linkedinlink;
global $thinkup_header_flickrswitch;
global $thinkup_header_flickrlink;
global $thinkup_header_pinterestswitch;
global $thinkup_header_pinterestlink;
global $thinkup_header_xingswitch;
global $thinkup_header_xinglink;
global $thinkup_header_paypalswitch;
global $thinkup_header_paypallink;
global $thinkup_header_vimeoswitch;
global $thinkup_header_vimeolink;
global $thinkup_header_youtubeswitch;
global $thinkup_header_youtubelink;
global $thinkup_header_rssswitch;
global $thinkup_header_rsslink;
global $thinkup_header_emailswitch;
global $thinkup_header_emaillink;

// Reset count values used in foreach loop
$i = 0;
$j = 0;

	if ( $thinkup_header_socialswitch == '1' ) {
	
		// Assign social media link to an array
		$social_links = array( 
			array( 'social' => 'Facebook',  'icon' => 'facebook',     'toggle' => $thinkup_header_facebookswitch,  'link' => $thinkup_header_facebooklink ),
			array( 'social' => 'Twitter',   'icon' => 'twitter',      'toggle' => $thinkup_header_twitterswitch,   'link' => $thinkup_header_twitterlink ),
			array( 'social' => 'Google+',   'icon' => 'google-plus',  'toggle' => $thinkup_header_googleswitch,    'link' => $thinkup_header_googlelink ),
			array( 'social' => 'Instagram', 'icon' => 'instagram',    'toggle' => $thinkup_header_instagramswitch, 'link' => $thinkup_header_instagramlink ),
			array( 'social' => 'Tumblr',    'icon' => 'tumblr',       'toggle' => $thinkup_header_tumblrswitch,    'link' => $thinkup_header_tumblrlink ),
			array( 'social' => 'LinkedIn',  'icon' => 'linkedin',     'toggle' => $thinkup_header_linkedinswitch,  'link' => $thinkup_header_linkedinlink ),
			array( 'social' => 'Flickr',    'icon' => 'flickr',       'toggle' => $thinkup_header_flickrswitch,    'link' => $thinkup_header_flickrlink ),
			array( 'social' => 'Pinterest', 'icon' => 'pinterest',    'toggle' => $thinkup_header_pinterestswitch, 'link' => $thinkup_header_pinterestlink ),
			array( 'social' => 'Xing',      'icon' => 'xing',         'toggle' => $thinkup_header_xingswitch,      'link' => $thinkup_header_xinglink ),
			array( 'social' => 'PayPal',    'icon' => 'paypal',       'toggle' => $thinkup_header_paypalswitch,    'link' => $thinkup_header_paypallink ),
			array( 'social' => 'Vimeo',     'icon' => 'vimeo-square', 'toggle' => $thinkup_header_vimeoswitch,     'link' => $thinkup_header_vimeolink ),
			array( 'social' => 'YouTube',   'icon' => 'youtube',      'toggle' => $thinkup_header_youtubeswitch,   'link' => $thinkup_header_youtubelink ),
			array( 'social' => 'RSS',       'icon' => 'rss',          'toggle' => $thinkup_header_rssswitch,       'link' => $thinkup_header_rsslink ),
			array( 'social' => 'Email',     'icon' => 'envelope',     'toggle' => $thinkup_header_emailswitch,     'link' => $thinkup_header_emaillink ),
		);


		// Output social media links if any link is set
		foreach( $social_links as $social ) {
			if ( ! empty( $social['link'] ) and $j == 0 ) {
				echo '<div id="pre-header-social"><ul>'; $j = 1;

				if ( ! empty ( $thinkup_header_socialmessage ) ) {
					echo '<li class="social message">' . thinkup_input_socialmessage() . '</li>';
				}
			}

			if ( ! empty( $social['link'] ) and $social['toggle'] == '1' ) {

			echo '<li class="social ' . $social['icon'] . '">',
				 '<a href="' . $social['link'] . '" data-tip="bottom" data-original-title="' . $social['social'] . '" target="_blank">',
				 '<i class="fa fa-' . $social['icon'] . '"></i>',
				 '</a>',
				 '</li>';
			}
		}

		// Close list output of social media links if any link is set
		if ( $j !== 0 ) echo '</ul></div>';
	}
}


?>