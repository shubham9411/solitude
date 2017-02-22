/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		});
	});

	// Update site title color in real time
	wp.customize( 'solitude_header_color', function( value ) {
		value.bind( function( newval ) {
			$( '#header' ).css( 'border-top-color', newval );
			$( '.post' ).css( 'border-top-color', newval );
		});
	});

	//Update Border size in real time
	wp.customize( 'solitude_header_border_size', function( value ) {
		value.bind( function( newval ) {
			if ( 20 < newval ) {
				newval = 20;
			}
			$( '#header' ).css( 'border-width', newval );
		});
	});
} )( jQuery );
