jQuery( function() {
	
	jQuery( '.tbpl-input-color' )
		.click(function () {
		
			jQuery( '.tbpl-colorpicker' ).hide(); 
			jQuery( '#tbpl-colorpicker-' + this.id ).show();
			jQuery.farbtastic( '#tbpl-colorpicker-' + this.id ).linkTo( this );
			
		})
		.each(function () { 
		
			jQuery.farbtastic( '#tbpl-colorpicker-' + this.id ).linkTo( this ); 
			
		})
		
	jQuery(document).mousedown(function() {
        
		jQuery( '.tbpl-colorpicker' ).each(function() {
		
            var display = jQuery( this ).css( 'display' );
            if ( display == 'block' ) jQuery( this ).fadeOut();
			
        });
		
    });
});