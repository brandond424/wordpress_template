jQuery(document).ready(function(){
	jQuery(".hamburger").click(function() {
		jQuery(this).toggleClass('open');
		jQuery("body").toggleClass('fixed');
		jQuery(".menu-mobile-menu-container").toggleClass('show');
	});

	jQuery("#menu-mobile-menu .menu-item-has-children").click(function(e) {
		if(!jQuery(this).hasClass('open')) {
			e.preventDefault();
			jQuery(".sub-menu").removeClass('open');
			jQuery("#menu-mobile-menu .menu-item-has-children").removeClass('open');
			jQuery(this).find(".sub-menu").toggleClass('open');
			jQuery(this).toggleClass('open');
		}
	});

	jQuery(".no-link a").click(function(e) {
		e.preventDefault();
	});
});
