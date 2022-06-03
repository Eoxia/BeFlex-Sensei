jQuery( document ).ready(function() {
  beflexSiteHeaderInit();
  bfBlockAnimateInInit();
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

function bfBlockAnimateInInit() {
  var bfBlockToAnimate = jQuery( '.bf-block-animatein' );
  if ( bfBlockToAnimate == undefined || bfBlockToAnimate.length == 0 ) return;

  checkBlocViewport( bfBlockToAnimate );
  jQuery( window ).on( 'scroll', function() {
    checkBlocViewport( bfBlockToAnimate );
  });
}

/**
 * Check if the block is in the viewport
 *
 * @method checkBlock
 * @param  {string}
 * @return {void}
 */
function checkBlocViewport( elementObject ) {
  if ( elementObject == undefined ) return;

  for ( var i = 0; i < elementObject.length; i++ ) {
    if ( isInViewport( jQuery( elementObject[i] ) ) && ! jQuery( elementObject[i] ).hasClass( 'bf-block-animatein--animated' )  ) {
      jQuery( elementObject[i] ).addClass( 'bf-block-animatein--animated' );
    }
  }
}

/**
 * Return true if the element is in the viewport
 *
 * @method isInViewport
 * @param  {Object}
 * @return {Boolean}
 */
function isInViewport( element ) {
  if ( element == undefined ) return;

  var elementOffset = jQuery( element ).offset().top;
  var documentOffset = jQuery( window ).scrollTop() + jQuery( window ).height() * 0.75;
  if ( elementOffset <= documentOffset ) {
    return true;
  }
}
