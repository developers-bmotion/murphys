<?php

$map_id = 'cl_map_' . uniqid();

$lat_lon = codeless_get_mod( 'google_lat_lon', '' );
$api_key = codeless_get_mod( 'google_api_key', '' );

if( ! isset($lat_lon) || empty($lat_lon) || strpos($lat_lon, ',') === false )
	return;

$lat_lon = explode(',', $lat_lon);
$lat = trim($lat_lon[0]);
$lon = trim($lat_lon[1]);

wp_enqueue_script( 'google-maps-api', esc_url( add_query_arg( array( 'key' => $api_key, 'callback' => 'initGMAP' ), '//maps.googleapis.com/maps/api/js' ) ), array('codeless-main'), false, true );
?>

<div id="<?php echo esc_attr( $map_id ) ?>" class="cl_map cl-footer-google_map" data-lat="<?php echo esc_attr( $lat ) ?>" data-lon="<?php echo esc_attr( $lon ) ?>" data-zoom="14" data-style="ultra_light_labels">
	<div class="cl-map-element"></div>
</div>  