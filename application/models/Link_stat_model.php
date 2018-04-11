<?php

class Link_stat_model extends CI_Model {

    function __construct() {
        $this->table = 'link_stats';
    }

    public function getdata() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert($data = array()) {
        $data['time'] = date("Y-m-d H:i:s");
        $insert = $this->db->insert($this->table, $data);
        if($insert){
            return $this->db->insert_id();;
        }
    }

    public function get_data_by_linkid($link_id) {
        $this->db->select('*');
        $this->db->where('link_id', $link_id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
