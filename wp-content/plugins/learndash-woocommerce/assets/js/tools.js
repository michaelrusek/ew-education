jQuery( document ).ready( function( $ ) {
	var LD_WC_Tools = LD_WC_Tools || {};

	LD_WC_Tools.init = function() {
		LD_WC_Tools.start_retroactive_access();
	};

	LD_WC_Tools.start_retroactive_access = function() {
		if ( LD_WC_Tools_Params.wc_version < '5.6' ) {
			$( 'a.button.learndash_retroactive_access' ).on( 'click', function(event) {
				event.preventDefault();
				/* Act on the event */
				$( this ).parent( 'td' ).append( '<p class="description" id="ld-wc-retroactive-status"></p>');
				$( '#ld-wc-retroactive-status' ).text( LD_WC_Tools_Params.text.keep_page_open + ' ' + LD_WC_Tools_Params.text.status + ': 0%' );
				$( 'a.button.learndash_retroactive_access' ).text( '' ).addClass( 'ld-wc-spinner' );
				LD_WC_Tools.process_retroactive_access();
			});	
		} else if ( LD_WC_Tools_Params.wc_version >= '5.6' ) {
			$( '.button[form="form_learndash_retroactive_access"]' ).on( 'click', function(event) {
				event.preventDefault();
				/* Act on the event */
				$( this ).blur();

				$( this ).parent( 'td' ).append( '<p class="description" id="ld-wc-retroactive-status"></p>');
				$( '#ld-wc-retroactive-status' ).text( LD_WC_Tools_Params.text.keep_page_open + ' ' + LD_WC_Tools_Params.text.status + ': 0%' );
				$( this ).val( '' ).addClass( 'ld-wc-spinner' );
				LD_WC_Tools.process_retroactive_access();
			});	
		}
	};

	LD_WC_Tools.process_retroactive_access = function( step = 1, last_order_step = 0, subscription_step = 0 ) {
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'ld_wc_retroactive_access',
				nonce: LD_WC_Tools_Params.nonce.retroactive_access,
				step: step,
				last_order_step: last_order_step,
				subscription_step: subscription_step,
			},
		}).done( function( data ) {
			console.log( data );
			if ( typeof( data ) != 'undefined' ) {
				if ( data.step !== 'complete' ) {
					$( '#ld-wc-retroactive-status' ).text( LD_WC_Tools_Params.text.keep_page_open + ' ' + LD_WC_Tools_Params.text.status + ': ' + data.percentage + '%' );
					LD_WC_Tools.process_retroactive_access( data.step, data.last_order_step, data.subscription_step );
				} else {
					// done
					if ( LD_WC_Tools_Params.wc_version < '5.6' ) {
						$( 'a.button.learndash_retroactive_access' ).text( LD_WC_Tools_Params.text.retroactive_button ).removeClass( 'ld-wc-spinner' );
					} else if ( LD_WC_Tools_Params.wc_version >= '5.6' ) {
						$( '.button[form="form_learndash_retroactive_access"]' ).val( LD_WC_Tools_Params.text.retroactive_button ).removeClass( 'ld-wc-spinner' );
					}
					
					$( '#ld-wc-retroactive-status' ).text( LD_WC_Tools_Params.text.status + ': ' + LD_WC_Tools_Params.text.complete );
				}
			}
		});
	};

	LD_WC_Tools.init();
});