<?php

class Link_model extends CI_Model {

    function __construct() {
        $this->table = 'links';
    }

    public function getdata() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert($data = array()) {
        $data['expired'] = date("Y-m-d H:i:s", time() + 86400);
        $data['created'] = date("Y-m-d H:i:s");
        $insert = $this->db->insert($this->table, $data);
        if($insert){
            return $this->db->insert_id();;
        }
    }
}
