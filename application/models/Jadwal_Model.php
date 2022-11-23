<?php
    class Jadwal_Model extends CI_Model {
        
        private $_table = "jadwal_mengajar";
	function cek_jadwal($where){            
            return $this->db->get_where($this->_table,$where);            
	}
    }
?>
