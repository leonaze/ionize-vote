<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class View extends Module_Admin
{
    /**
     * Constructor
     *
     * @access  public
     * @return  void
     */
    public function construct()
    {
        // Loads the model as 'author_model'
        $this->load->model('vote_view_model', 'view_model', true);
		$this->load->model('vote_name_model', 'name_model', true);
    }
 
    public function results($id)
    {
		$where = array(
            'id_vote' => $id
        );
        $this->template['vote'] = $this->name_model->get($where);
        $this->template['results'] = $this->view_model->get_results($id);
	
		$this->output('admin/view_results');
    }
 
}