<?php

class admin_model extends CI_Model {

    public function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    function getinfo($table, $where = NULL) {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function fetchCount($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    public function fetchjoin($table, $join = NULL, $on = NULL, $where = NULL) {
        //$join must be array('pet.user_id = user.user_id');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!(empty($join) || empty($on))) {
            $this->db->join($join, $on, "left outer");
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }
    
    public function fetchjointhree($table, $join = NULL, $on = NULL, $join2 = NULL, $on2 = NULL, $where = NULL) {
        //$join must be array('pet.user_id = user.user_id');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!(empty($join) || empty($on))) {
            $this->db->join($join, $on, "left outer");
        }
        if (!(empty($join2) || empty($on2))) {
            $this->db->join($join2, $on2, "left outer");
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function insert($table, $data) {
        $this->db->insert_batch($table, $data);
        return $this->db->affected_rows();
    }

    public function singleinsert($table, $data) {
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
    
    function fetchAllLimit($table, $limit, $offset, $where = NULL){
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get($table); // Select * from item_tbl;
        return $query->result();
    }
    
    function fetchAllLimitJoin($table, $limit, $offset, $join = NULL, $on = NULL, $where = NULL){
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!(empty($join) || empty($on))) {
            $this->db->join($join, $on, "left outer");
        }
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get($table); // Select * from item_tbl;
        return $query->result();
    }
    function fetchAllLimitJoinThree($table, $limit, $offset, $join = NULL, $on = NULL, $join2 = NULL, $on2 = NULL, $where = NULL){
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!(empty($join) || empty($on))) {
            $this->db->join($join, $on, "left outer");
        }
        if (!(empty($join2) || empty($on2))) {
            $this->db->join($join2, $on2, "left outer");
        }
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get($table); // Select * from item_tbl;
        return $query->result();
    }
    public function getLastRow($table){
        $this->db->order_by("cms_id","DESC");
        $this->db->limit(1);
        $query = $this->db->get($table); // Select * from item_tbl;
        return $query->result();
    }
}
