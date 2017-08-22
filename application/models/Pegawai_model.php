<?php
class Pegawai_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = "SELECT
                    *,
                    TIMESTAMPDIFF(DAY, tanggal_masuk, CURRENT_DATE) + 1 AS count_day
                FROM
                    pegawai";
        return $this->db->query($query);
    }

    public function getOne($pegawai_id)
    {
        $query = "SELECT
                    *,
                    TIMESTAMPDIFF(DAY, tanggal_masuk, CURRENT_DATE) + 1 AS count_day
                FROM
                    pegawai
                WHERE
                    id = $pegawai_id";
        return $this->db->query($query);
    }
}
