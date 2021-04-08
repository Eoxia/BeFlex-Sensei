/**
 * Main javascript file for the theme
 *
 */
jQuery( document ).ready(function() {

	beflexNavigationInit();
	beflexSearchInit();
	beflexFlexibleGalleryInit();

});

/**
 * Javascript of Flexible Gallery
 *
 */

function beflexFlexibleGalleryInit() {
	var i = 0;
	var lightbox = [];

	var args = {
		showCounter: false,
		navText    : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
		closeText  : '<i class="fas fa-times"></i>'
	};

	/** Block Gallery */
	jQuery('.wp-block-gallery').each(function() {
		var content = jQuery(this).find('.blocks-gallery-item a');
		lightbox[i] = content.simpleLightbox( args );
		i++;
	});

	/** Widget Gallery */
	jQuery( '.widget_media_gallery .gallery' ).each(function() {
		var content = jQuery(this).find('.gallery-item a');
		lightbox[i] = content.simpleLightbox( args );
		i++;
	});
}

/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */

function beflexNavigationInit() {
	/**
	 * Burger Navigation
	 */
	jQuery( '#page' ).on( 'click', '#masthead .menu-toggle', function( e ){
		e.preventDefault();
		jQuery( 'body' ).toggleClass( 'active-burger' );
	});

	jQuery( '#page' ).on( 'click', '#burger-menu .navigation-overlay', function( e ){
		e.preventDefault();
		jQuery( 'body' ).removeClass( 'active-burger' );
	});

	jQuery( '#page' ).on( 'click', '#burger-menu .close-burger', function( e ){
		e.preventDefault();
		jQuery( 'body' ).removeClass( 'active-burger' );
	});

	jQuery(document).keyup(function(e) {
		if (e.keyCode === 27) {
			jQuery( 'body').removeClass( 'active-burger' );
		}   // esc
	});


	/** Affiche une classe dans le body si la navigation est sticky */
	if ( jQuery( '#masthead' ).hasClass('sticky') ) {
		jQuery( 'body' ).addClass( 'sticky-nav' );
	}

	/**
	 * Sticky Navigation
	 */
	 if ( isSticky() ) {
		 jQuery( '#masthead.sticky' ).addClass( '-scroll' );
	 }

	 jQuery( window ).scroll( function ( event ) {
		 if ( isSticky() ) {
			 jQuery( '#masthead.sticky' ).addClass( '-scroll' );
		 }
		 else {
			 jQuery( '#masthead.sticky' ).removeClass( '-scroll' );
		 }
	 });
}

/**
 * Return true if the navigation can be sticky
 *
 * @method isSticky
 * @return {Boolean}
 */
function isSticky() {
	if ( jQuery( window ).scrollTop() >= jQuery( '.site-header.sticky' ).height() ) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * File search.js
 *
 */
function beflexSearchInit() {
	jQuery('#page').on('click', '#masthead .js-search', function(e){
		e.preventDefault();
		jQuery('body').toggleClass('search-active');
		jQuery('#search-area .search-field').focus();
	});

	jQuery('#page').on('click', '#search-area .search-overlay', function(e){
		e.preventDefault();
		jQuery('body').removeClass('search-active');
	});

	jQuery(document).keyup(function(e) {
		if (e.keyCode === 27) {
			jQuery('body').removeClass('search-active');
		}   // esc
	});
}
