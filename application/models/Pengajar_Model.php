<?php
    class Pengajar_Model extends CI_Model {
        
        private $_tbl_name = "pengajar";
        
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
        
        function updateDataSandi($kode,$data){                      
            $this->db->where('kode_pengajar', $kode);
            $this->db->update($this->_tbl_name, $data);
            $insert_id = $kode;
            
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
            $this->db->where("kode_pengajar !=",'GC-ADMIN');
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
            $this->db->where("kode_pengajar",$keyword);
            $query = $this->db->get();
            
            return $query;
        }
        
        function getTipePengajar(){
            $sql = "SELECT DISTINCT peruntukan FROM honor";
            $rs = $this->db->query($sql);
            return $rs;
        }
    }
?>
