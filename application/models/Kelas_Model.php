<?php
    class Kelas_Model extends CI_Model {
        
        private $_tbl_name = "kelas";
        
        function saveData($data){                      
            $this->db->insert($this->_tbl_name, $data);
            $insert_id = $this->db->insert_id();
            
            return $insert_id;
        }
        
        function updateData($id,$data){                      
            $this->db->where('id', $id);
            $this->db->update($this->_tbl_name, $data);
            $insert_id = $id;
            
            return $insert_id;
        }
        
        function deleteData($id){
            $this->db->where('id', $id);
            $this->db->delete($this->_tbl_name);                        
        }
        
        function showDataAll(){
            $sql = $this->db->get($this->_tbl_name);            
            return $sql;
        }
        
        function showDataAllOrderBy($order,$sort){
            $this->db->from($this->_tbl_name);
            $this->db->order_by($order, $sort);
            $query = $this->db->get(); 
            return $query;
        }
        
        function showDataById($id){
            $this->db->select('*');
            $this->db->from($this->_tbl_name);
            $this->db->where("id",$id);
            $query = $this->db->get();
            
            return $query;
        }
        
        function showDataByKode($keyword){
            $this->db->select('*');
            $this->db->from($this->_tbl_name);
            $this->db->like("kode_kelas",$keyword);
            $query = $this->db->get();
            
            return $query;
        }
    }
?>
