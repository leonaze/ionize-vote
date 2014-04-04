<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
|--------------------------------------------------------------------------
| Theme Forms configuration
|--------------------------------------------------------------------------
|
| This forms config array will be merged with /application/config/forms.php
| You can overwrite standard forms definition by creating your own deifnition
| for the form you wish to overwrite.
|
*/
$config['forms'] = array
(
	// Vote form
	'vote' => array
    (
        'process' => 'TagManager_Vote::process_data',
        'redirect' => 'referer',
        'messages' => array(
            'success' => 'vote_form_message_success',
            'error' => 'vote_form_message_error',
        ),
		'emails' => array
        (
            array
            (
                'email' => 'form',
                'subject' => 'mail_vote_subject',
                'view' => 'mail/vote',
            ),
        ),
        'fields' => array
        (
			'id_vote' => array
            (
                'rules' => 'trim|required|xss_clean',
                'label' => '',
            ),
			'keyword' => array
            (
                'rules' => 'trim|required|xss_clean',
                'label' => '',
            ),
            'email' => array(
                'rules' => 'trim|required|valid_email|xss_clean',
                'label' => 'vote_form_label_email',
            )
        )
    )
);