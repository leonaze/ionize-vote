<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Vote extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
 
    function index()
    {
        $this->template['title'] = 'Demo module title';
        $this->output('vote');
    }
	
	function validate($id_vote, $email)
    {
		$this->load->model('vote_view_model', 'view_model', true);

		$this->view_model->vote_validate($id_vote, $email);
		
		// $this->template[''] = ;

        $this->output('validate');
    }
}