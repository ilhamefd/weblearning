<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Form_validation extends CI_Form_validation
{

    public function __construct($rules = array())
    {
        parent::__construct($rules);
    }




    public function unique_user_name(){
    	$kddosen = $this->session->userdata('username');
        $kddosen = $this->CI->input->post('firstname');
        $kdmku = $this->CI->input->post('lastname');
        $kdprodi = $this->CI->input->post('lastname');
        $offr = $this->CI->input->post('lastname');

        $check = $this->CI->db->get_where('users', array('firstname' => $firstname, 'lastname' => $lastname), 1);
        if ($check->num_rows() > 0) {

            $this->set_message('unique_user_name', 'This name already exists in our database');

            return FALSE;
        }

        return TRUE;
    }
}
?>