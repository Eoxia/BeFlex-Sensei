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
