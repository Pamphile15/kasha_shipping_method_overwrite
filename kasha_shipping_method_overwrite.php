<?php
/*
Plugin name: Overwrite existing shipping methods
plugin URI: http://kasha.rw
Version: 1.0
Author: Kasha Inc. 
Author URI: http://kasha.com
Description: this plugin will allow us to load and use existing shipping methods. 
*/

add_action('init','kashaActiveShippingMethods');


class load_shipping_methods{
	public function kashaActiveShippingMethods() {
		$active_methods   = array();
		$shipping_methods = WC()->shipping->load_shipping_methods();
		$shipping_zones   = \WC_Shipping_Zones::get_zones();

		if ( isset( $shipping_zones[ 2 ] ) ) {
			foreach ( $shipping_zones[ 2 ]['shipping_methods'] as $id => $shipping_method ) {
		if ( isset( $shipping_method->enabled ) && 'yes' === $shipping_method->enabled ) {
					$active_methods[ $id ] = $shipping_method->title;

				}
			}
		}
		return $active_methods;
	}

}
