<?php

class user_model extends CI_Model {

    public function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function fetchPetAsc($table, $where = NULL) {

        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('pet_added_at', 'asc');
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function update($table, $data, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function delete($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

}
