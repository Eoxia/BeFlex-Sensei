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
