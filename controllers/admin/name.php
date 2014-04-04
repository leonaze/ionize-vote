<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Name extends Module_Admin
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
        $this->load->model('vote_name_model', 'name_model', true);
    }
 
    /**
     * Outputs the authors list
     *
     */
    public function get_list()
    {
        $conds = array(
            'order_by' => 'id_vote ASC'
        );
 
        $this->template['names'] = $this->name_model->get_list($conds);
 
        $this->output('admin/names_list');
    }
 
    /**
     * Outputs the detail of one author
     * @param  int    ID of the author
     *
     */
    public function get($id)
    {
        $where = array(
            'id_vote' => $id
        );
        $this->template = $this->name_model->get($where);
 
        $this->output('admin/name_detail');
    }
 
    /**
     * Saves one author
     *
     */
    public function save()
    {
        // The name must be set
        if ($this->input->post('name') != '')
        {
            $id_vote = $this->name_model->save($this->input->post());
 
            // Update the authors list
            $this->update[] = array(
                'element' => 'moduleVoteNamesList',
                'url' => admin_url() . 'module/vote/name/get_list'
            );
 
            // Send the user a message
            $this->success(lang('ionize_message_operation_ok'));
        }
        else
        {
            // Send the user a message
            $this->error(lang('ionize_message_operation_nok'));
        }
    }
	
	function create()
    {
        $this->name_model->feed_blank_template($this->template);
 
        $this->output('admin/name_detail');
    }
	
	public function delete($id)
	{
		if ($this->name_model->delete($id) > 0)
		{
			// Update the authors list
			$this->update[] = array(
				'element' => 'moduleVoteNamesList',
				'url' => admin_url() . 'module/vote/name/get_list'
			);
	 
			// Send the user a message
			$this->success(lang('ionize_message_operation_ok'));
		}
		else
		{
			// Send the user a message
			$this->error(lang('ionize_message_operation_nok'));
		}
	}
}