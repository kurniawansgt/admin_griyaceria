<?php
    class Mata_Pelajaran_Model extends CI_Model {
        
        private $_tbl_name = "mata_pelajaran";
        
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
            $this->db->select('*');
            $this->db->from($this->_tbl_name);
            $this->db->where("status_aktif",1);
            $query = $this->db->get();    
            return $query;
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
            if($keyword!=null){
            $this->db->where_in("kode_mapel",$keyword);
            }
            $query = $this->db->get();
            
            return $query;  
            
//            $sql = "SELECT * FROM mata_pelajaran WHERE IF(''='',TRUE,kode_mapel IN ($keyword))";
//            $rs = $this->db->query($sql);
//            
//            return $rs;
        }
    }
?>
