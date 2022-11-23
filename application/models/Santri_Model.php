<?php
    ini_set("display_errors",1);
    class Santri_Model extends CI_Model {
        
        private $_tbl_name = "santri";
        private $_tbl_name_2 = "presensi_belajar";
        
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
            //$this->db->where("status_aktif",1);
            //$this->db->where("kode_pengajar !=",'GC-ADMIN');
            $query = $this->db->get();
            return $query;
        }
        
        function showDataAllOrderBy($order,$sort){
            $this->db->from($this->_tbl_name);
            $this->db->order_by($order, $sort);
            $this->db->order_by("nis", "asc");
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
            $this->db->where("nis",$keyword);
            $query = $this->db->get();
            
            return $query;
        }
        
        function getlastnis($kode){
            $sql = "SELECT RIGHT(s.`nis`,3) nis FROM santri s
            WHERE LEFT(s.`nis`,8)='$kode' 
            ORDER BY s.`nis` DESC LIMIT 1;";
            $rs = $this->db->query($sql);
            return $rs;
        }
        
        function getCode($tahun){
            $sql = "SELECT 
            CONCAT('GC',a.`kodefikasi_tahun_ajaran`,
                    IF(
                            LENGTH(a.`periode_ajaran`)<2,
                            CONCAT('0',a.`periode_ajaran`),
                            a.`periode_ajaran`
                    )
            ) kode
            FROM tahun_ajaran a
            WHERE `periode_start`='$tahun' AND a.`status`=1";
            $rs = $this->db->query($sql);
            return $rs;
        }
        
        function showTahunAjaran(){
            $this->db->select('*');
            $this->db->from('tahun_ajaran');
            $this->db->where('status',1);
            $query = $this->db->get();
            
            return $query;
        }
        
        function showPresensi($param1,$param2,$param3){
            $sql = "SELECT * FROM presensi_belajar WHERE date(presensi_date)='$param1' 
            AND IF('0'='$param2',TRUE,kode_kelas='$param2')
            AND IF('0'='$param3',TRUE,kode_mapel='$param3') ORDER BY nis";
            $rs = $this->db->query($sql);
            return $rs;
        }
        
        function showDataByKelas($keyword){
            $sql = "SELECT * FROM santri WHERE statussantri=1 
            AND IF('0'='$keyword',TRUE,kelassantri='$keyword')                
            ORDER BY kelassantri ASC,namasantri ASC";
            $query = $this->db->query($sql);
            
            return $query;
        }
        
        function cekPresensi($param1,$param2,$param3){
            $sql = "SELECT COUNT(*) jml FROM ".$this->_tbl_name_2." WHERE kode_kelas='$param1' AND kode_mapel='$param2' AND date(presensi_date)='$param3'";
            $query = $this->db->query($sql);
            
            return $query;
        }
        
        function saveDataPresensi($data){
            $this->db->insert($this->_tbl_name_2, $data);
            $insert_id = $this->db->insert_id();
            
            return $insert_id;
        }
        
        function deletePresensi($param1,$param2,$param3){
            $sql = "DELETE FROM presensi_belajar WHERE kode_kelas='$param1' AND kode_mapel='$param2' AND date(presensi_date)='$param3'";
            $query = $this->db->query($sql);
        }
    }
?>
