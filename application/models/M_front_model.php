<?php
class M_front_model extends CI_Model
{
    public $table_event = 'event';

    function data_event()
    {
        return $this->db->query("SELECT * FROM ".$this->table_event." WHERE status = 'AKTIF' ORDER BY id DESC")->result();

    }


}