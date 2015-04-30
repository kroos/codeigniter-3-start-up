<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sqlitedb extends CI_Model {

	function __construct() {
		parent::__construct();
	}

#############################################################################################################################
//CRUD for sqlitedb

//SELECT
	function GetAll($limit, $offset) {
		return $this->db->get('sqlitedb', $limit, $offset);
	}

	function GetWhere($where, $limit, $offset) {
		return $this->db->get_where('sqlitedb', $where, $limit, $offset);
	}

//INSERT
	function insert($insert)	{
		return $this->db->insert('sqlitedb', $insert);
	}

//UPDATE
	function update($update, $where) {
		return $this->db->update('sqlitedb', $update, $where);
	}

//DELETE
	function delete($where) {
		return $this->db->delete('sqlitedb', $where);
	}

//TRUNCATE
	function truncate() {
		return $this->db->truncate('sqlitedb');
	}
#############################################################################################################################
}
?>