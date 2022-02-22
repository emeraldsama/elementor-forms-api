// Send a custom WebHook. Copy and paste this code into your theme's functions.php file, below your other code like child theme files and other hooks

add_action( 'elementor_pro/forms/new_record', function( $record, $handler ) {
    //make sure its our form - 
    $form_name = $record->get_form_settings( 'form_name' );

    // Replace MY_FORM_NAME with the name you gave your form - use the forn naem in the form fields tab, NOT the form ID under advanced tab in elementor
    if ( 'MY_FORM_NAME' !== $form_name ) {
        return;
    }
// gets the field id key and user response value pairings for each field
    $raw_fields = $record->get( 'fields' );
    $fields = [];
    foreach ( $raw_fields as $id => $field ) {
        $fields[ $id ] = $field['value'];
    }
	
$id_token = 'YOUR_API_KEY_OR_TOKEN_HERE';
	
			//Send data to your external API ex. https://api.example.com/api/contact
			wp_remote_post( 'YOUR_API_ENDPOINT_URL_HERE', array(
				'method'      => 'POST',
		    	'timeout'     => 85,
		    	'httpversion' => '1.0',
		    	'blocking'    => false,
		    	'headers'     => [
	            	'accept' => 'application/json',
                 // the next line combines (appends) the authentication type with your api key. change 'Bearer ' to whatever you need; ex. 'Basic ', blank, etc. The 3rd party developer docs will tell you somewhere
				      	'Authorization' => 'Bearer ' . $id_token,
		    		'Content-Type' => 'application/json',
		    	],
				'body'        => json_encode( $fields )
				)
			);
}, 10, 2 );
