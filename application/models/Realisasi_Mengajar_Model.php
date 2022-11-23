<?php
    class Realisasi_Mengajar_Model extends CI_Model {
        
        private $_tbl_name = "realisasi_kbm";
        
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
        
        function showDataAllOrderBy($keyword,$order,$sort){
//            $this->db->from($this->_tbl_name);            
//            $this->db->order_by($order, $sort);
//            $query = $this->db->get(); 
//            return $query;
            
            $sql = "SELECT * FROM realisasi_kbm 
            WHERE IF(''='$keyword',TRUE,kode_pengajar='$keyword')
            ORDER BY $order $sort";
            $rs = $this->db->query($sql);
            
            return $rs;
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
            $this->db->like("kode_produk",$keyword);
            $query = $this->db->get();
            
            return $query;
        }
        
        function rptRealisasiKbm($bulan,$tahun){
            $sql = "SELECT b.*,(total_jam*b.nilai_honor) total_honor
            FROM
            (
            SELECT a.nama_pengajar,a.nama_mapel,a.tipe_honor,MONTH(a.tgl_kbm) bulan,YEAR(a.tgl_kbm) tahun,
            ROUND(SUM((TIME_TO_SEC(TIMEDIFF(a.jam_keluar,a.jam_masuk))/60)/40)) AS total_jam,h.`nilai_honor`
            FROM
            (
            SELECT a.`kode_pengajar`,b.`nama_pengajar`,a.`kode_mapel`,c.`nama_mapel`,b.`tipe_honor`,a.`tgl_kbm`,
            DATE_FORMAT(a.`jam_masuk_kbm`,'%H:%i') jam_masuk,DATE_FORMAT(a.`jam_keluar_kbm`,'%H:%i') jam_keluar
            FROM realisasi_kbm a 
            INNER JOIN pengajar b ON a.`kode_pengajar`=b.`kode_pengajar`
            INNER JOIN mata_pelajaran c ON a.`kode_mapel`=c.`kode_mapel`
            WHERE b.`tipe_honor`='Pengajar' AND (a.`tgl_kbm` BETWEEN CONCAT($tahun,'-',$bulan,'-01') AND CONCAT($tahun,'-',$bulan,'-31'))
            ) AS a
            INNER JOIN honor h ON h.peruntukan=a.tipe_honor 
            AND h.`tahun_ajaran`='2021/2022' AND h.`is_aktif`=1
            GROUP BY a.kode_pengajar,a.kode_mapel ORDER BY a.kode_mapel
            ) AS b
            UNION ALL
            SELECT bb.*,(bb.nilai_honor) total_honor
            FROM
            (
            SELECT a.nama_pengajar,a.nama_mapel,a.tipe_honor,MONTH(a.tgl_kbm) bulan,YEAR(a.tgl_kbm) tahun,
            '-' AS total_jam,h.`nilai_honor`
            FROM
            (
            SELECT a.`kode_pengajar`,b.`nama_pengajar`,a.`kode_mapel`,c.`nama_mapel`,b.`tipe_honor`,a.`tgl_kbm`,
            DATE_FORMAT(a.`jam_masuk_kbm`,'%H:%i') jam_masuk,DATE_FORMAT(a.`jam_keluar_kbm`,'%H:%i') jam_keluar
            FROM realisasi_kbm a 
            INNER JOIN pengajar b ON a.`kode_pengajar`=b.`kode_pengajar`
            INNER JOIN mata_pelajaran c ON a.`kode_mapel`=c.`kode_mapel`
            WHERE b.`tipe_honor` IN ('Pembimbing 1','Pembimbing 2','Pembimbing 3','Pembimbing 4','Pembimbing 5','PJ Tahfidz')
            AND (a.`tgl_kbm` BETWEEN CONCAT($tahun,'-',$bulan,'-01') AND CONCAT($tahun,'-',$bulan,'-31'))
            ) AS a
            INNER JOIN honor h ON h.peruntukan=a.tipe_honor 
            AND h.`tahun_ajaran`='2021/2022' AND h.`is_aktif`=1
            GROUP BY a.kode_pengajar,a.kode_mapel ORDER BY h.peruntukan
            ) AS bb;";
            return $this->db->query($sql);
        }
    }
?>
