<?php
/**
 * Contact Form TagManager
 *
 */
class TagManager_Vote extends TagManager
{
    /**
     * Processes the form POST data.
     *
     * @param FTL_Binding
     *
     * @return void
     *
     */
    public static function process_data(FTL_Binding $tag)
    {
        $form_name = self::$ci->input->post('form');
 
        if (TagManager_Form::validate($form_name))
        {
            $form_name = self::$ci->input->post('form');
 
			if (TagManager_Form::validate($form_name))
			{
				self::load_model('Vote_view_model', 'vote_model');

				$posted = self::$ci->input->post();
				
				$datas = array();
				$datas['id_vote'] = $posted['id_vote'];
				$datas['keyword'] = $posted['keyword'];
				$datas['email'] = $posted['email'];
				$datas['ip'] = self::$ci->vote_model->get_client_ip();
				$datas['created'] = date('Y-m-d H:i:s');
				
				// Check vote
				if(self::$ci->vote_model->vote_exist($datas['id_vote'], $datas['email']))
				{
					TagManager_Form::set_additional_error($form_name, lang('module_vote_already_vote'));
					
					$redirect = TagManager_Form::get_form_redirect();
					if ($redirect !== FALSE)
					{
						redirect($redirect);
					}
				}
				else 
				{
					// Register vote
					self::$ci->vote_model->save($datas);
					
					// Validating email
					TagManager_Email::send_form_emails($tag, $form_name, $datas);
		 
					$message = TagManager_Form::get_form_message('success');
					TagManager_Form::set_additional_success($form_name, $message);
		 
					$redirect = TagManager_Form::get_form_redirect();
					if ($redirect !== FALSE)
					{
						redirect($redirect);
					}
				}
			}
        }
    }
}