<?php
    class Login_Model extends CI_Model {
        
        private $_table = "pengajar";
	function cek_login($where){		
            return $this->db->get_where($this->_table,$where);
	}
    }
?>
