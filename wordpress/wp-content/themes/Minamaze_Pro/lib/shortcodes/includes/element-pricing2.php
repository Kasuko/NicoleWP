<?php
$title         = NULL;
$price         = NULL;
$size          = NULL;
$link          = NULL;
$width         = NULL;
$width_px      = NULL;
$width_per     = NULL;
$rows          = NULL;
$icons         = NULL;
$linktext      = NULL;
$rows_count    = NULL;
$columns_count = NULL;
$output        = NULL;
?>
	
<?php foreach((array) $groups['title'] as $increment=>$context){ ?>
<?php $columns_count = $columns_count + 1; ?>
<?php } ?>
<?php
$width    = $atts['width'];
$linktext = $atts['linktext'];


if (empty($width)) {
	$width = '100%';
	$width_px = ( ( 100 / $columns_count ) ).'%';
	$width_per = ( 100 * ( ( 100 / $columns_count ) ) / $width ) .'%';
} else if (strpos($width,'px') == false) {
	$width = $width.'px';
	$width_px = ( ( $width / $columns_count ) ).'px';
	$width_per = ( 100 * ( ( $width / $columns_count ) ) / $width ) .'%';
}

if (empty($linktext)) {
	$linktext = 'Buy Now';
}


$output .= '<div class="pricing-table style2" style="width:' . $width . '">';
?>	
	<?php foreach((array) $groups['title'] as $increment=>$context){ ?>
<?php
	$title    = $context['title'];
	$price    = $context['price'];
	$size     = $context['size'];
	$link     = $context['link'];

	$output .= '<div class="pricing-package '.$size.'" style="width:'.$width_px.';max-width:'.$width_per.';">';

		$output .= '<div class="pricing-title"><h5>'.$title.'</h5></div>';
		$output .= '<div class="pricing-price"><h3>'.$price.'</h3></div>';

		$output .= '<ul class="pricing-features">';

			$rows  = $context['rows'];	
			$icons = $context['icons'];

			if ( strpos( $rows, ','  ) ) { $rows = explode(',',$context['rows']);	}
			if ( strpos( $icons, ','  ) ) { $icons = explode(',',$context['icons']);	}

			for($i=0, $rows_count = count($rows);$i<$rows_count;$i++) {
				
				if ( is_array( $rows )  ) { $rows_input = $rows[$i]; } else { $rows_input = $rows; }
				if ( is_array( $icons )  ) { $icons_input = $icons[$i]; } else { $icons_input = $icons; }
				
				$output .= '<li class="' . $icons_input . '">' . $rows_input . '</li>';
			}

		$output .= '</ul>';

	$output .= '<div class="pricing-link"><h4><a href="' . $link . '">'.$linktext.'</a></h4></div>';
	$output .= '</div>';
?>
	<?php } ?>
<?php
$output .= '</div>';

echo $output;


?>
