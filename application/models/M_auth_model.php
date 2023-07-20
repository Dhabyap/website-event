<?php
class M_auth_model extends CI_Model
{
    public $table_admin = 'admin';

    public function save_register()
    {
        $data = $this->input->post();
        $this->db->trans_begin();
        try {

            $data_admin = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => md5($data['password']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->db->insert($this->table_admin, $data_admin);
            $this->db->trans_commit();

            $response = [
                'code' => 200,
                'message' => 'Data berhasil di simpan'
            ];
        } catch (Exception $e) {
            $this->db->trans_rollback();

            $response = [
                'code' => 400,
                'message' => 'Data gagal di simpan'
            ];
        }

        $response = [
            'code' => 200,
            'message' => 'Data berhasil di simpan'
        ];

        return $response;
    }

    public function check_auth()
    {
        $data = $this->input->post();

        $email      = $data['email'];
        $password   = $data['password'];
        $check = $this->check_admin($email, md5($password));
        if($check != NULL){
            $this->session->set_userdata('masuk',true);
            $response = [
                'code' => 200,
                'message' => 'Login Berhasil'
            ];
        } else {
            $response = [
                'code' => 400,
                'message' => 'Email atau Password Anda Salah!'
            ];
        }

        return $response;
    }

    private function check_admin($email, $password)
    {
        $query = $this->db->get_where($this->table_admin, array('email' => $email, 'password' => $password));
        return $query->row();
    }


}