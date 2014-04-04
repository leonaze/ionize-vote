<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Vote_name_model extends Base_model
{
    // Author tables
    protected $_name_table = 'module_vote_name';
 
    /**
     * Model Constructor
     *
     * @access  public
     */
    public function __construct()
    {
        $this->set_table($this->_name_table);
        $this->set_pk_name('id_vote');
 
        parent::__construct();
    }
	
	public function save($inputs)
    {
        // Arrays of data which will be saved
        $data = array();
 
        // Fields of the author table
        $fields = $this->list_fields();
 
        // Set the data to the posted value.
        foreach ($fields as $field)
            $data[$field] = $inputs[$field];
 
        return parent::save($data);
    }
	
	public function delete($id)
    {
        $nb_rows = parent::delete($id, $this->_name_table);
     
        return $nb_rows;
    }
	
}