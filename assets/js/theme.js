jQuery( document ).ready(function() {
  beflexSiteHeaderInit();
});

/**
 * Fix site header to the top of screen
 */
function beflexSiteHeaderInit() {
  var navigation = jQuery( '.header-sticky' );

  if ( navigation ) {

    jQuery( '.wp-site-blocks' ).css( 'padding-top', navigation.outerHeight() );

    if ( beflexNavSticky() ) {
      jQuery( navigation ).addClass( '-sticky' );
    }

    jQuery( window ).scroll( function ( event ) {
      if ( beflexNavSticky() ) {
        jQuery( navigation ).addClass( '-sticky' );
      }
      else {
        jQuery( navigation ).removeClass( '-sticky' );
      }
    });
  }
}

/**
 * Return true if the navigation can be sticky
 *
 * @method isSticky
 * @return {Boolean}
 */
function beflexNavSticky() {
  if ( jQuery( window ).scrollTop() >= jQuery( '.header-sticky' ).height() ) {
    return true;
  }
  else {
    return false;
  }
}
