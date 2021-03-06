<?php
/**
*
* fieldconfig for thinkupshortcodes/Images
*
* @package Thinkupshortcodes
* @author Think Up Themes Ltd contact@thinkupthemes.com
* @license GPL-2.0+
* @link www.thinkupthemes.com
* @copyright 2016 Think Up Themes Ltd
*/


$group = array(
	'label' => __('Images','thinkupshortcodes'),
	'id' => '13111014141',
	'master' => 'image',
	'fields' => array(
		'image'	=>	array(
			'label'		=> 	__('Image URL','thinkupshortcodes'),
			'caption'	=>	__('Select images from your media library.','thinkupshortcodes'),
			'type'		=>	'image',
			'default'	=> 	'',
		),
	),
	'scripts'	=> array(
		'image-modal.js',
	),
	'multiple'	=> true,
);

