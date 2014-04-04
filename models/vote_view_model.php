<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Vote_view_model extends Base_model
{
    // Author tables
    protected $_results_table = 'module_vote_result';
 
    /**
     * Model Constructor
     *
     * @access  public
     */
    public function __construct()
    {
        $this->set_table($this->_results_table);
        $this->set_pk_name('id_result');
 
        parent::__construct();
    }
	
	public function get_results($id)
    {
		$data = array();

		$where = array(
            'id_vote' => $id,
			'status' => 1
        );
		
		$query = $this->{$this->db_group}
			->select('keyword, COUNT(*) AS nb')
			->where($where)
			->group_by('keyword')
			->order_by('nb DESC')
			->get($this->_results_table)
		;

		if ( $query->num_rows() > 0 ) {
			$data = $query->result_array();
		}

		return $data;
    }
	
	public function vote_exist($id_vote, $email)
    {
		$where = array(
            'id_vote' => $id_vote,
            'email' => $email
        );
	
		$query = $this->{$this->db_group}
			->where($where)
			->get($this->_results_table)
		;
		
		if ( $query->num_rows() > 0 ) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	public function vote_validate($id_vote, $email)
    {
		$datas = array(
			'status' => 1,
			'validated' => date('Y-m-d H:i:s')
		);
	
		$where = array(
            'id_vote' => $id_vote,
            'email' => $email
        );
	
		// Update
		$this->{$this->db_group}->update($this->_results_table, $datas, $where);
		
		return TRUE;
	}
	
	public function get_client_ip()
	{

        $ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        return $ip;
    }
	
}