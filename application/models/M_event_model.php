<?php
class M_event_model extends CI_Model
{
    public $table = 'event';
    public $table_peserta = 'peserta';

    function table() 
    {
        $this->datatables->select('*, id as id_decode, status, dari_tanggal, sampai_tanggal, nama, id');
        $this->datatables->from($this->table);
        $this->datatables->edit_column('id_decode', '$1', "aksi(id_decode)");
        $this->datatables->edit_column('status', '$1', "format_status(status)");
        $this->datatables->edit_column('dari_tanggal', '$1', "format_tanggal_indo(dari_tanggal)");
        $this->datatables->edit_column('sampai_tanggal', '$1', "format_tanggal_indo(sampai_tanggal)");
        $this->datatables->edit_column('nama', '$1', "format_aksi(nama, id, event/detail)");
        echo $this->datatables->generate();
        exit;
    }
    function peserta_table($id) 
    {
        $this->datatables->select('*, id as id_decode');
        $this->datatables->from($this->table_peserta);
        $this->datatables->where('id_event', $id);
        $this->datatables->edit_column('id_decode', '$1', "aksi(id_decode)");
        echo $this->datatables->generate();
        exit;
    }

    function save_event()
    {
        $data = $this->input->post();
        
        if(!empty($data['id_event'])){
            $response = $this->edit_event($data['id_event']);
            return $response;
        }

        if(empty($data['judul']) || empty($data['deskripsi']) || empty($data['dari_date']) || empty($data['sampai_date']) || empty($data['lokasi'])){
            $response = [
                'code' => 400,
                'message' => 'Ops, Data anda belum lengkap'
            ];
            return $response;
        }
        try {

            $inset_data = [
                'nama'              => $data['judul'],
                'deskripsi'         => $data['deskripsi'],
                'lokasi'            => $data['lokasi'],
                'status'            => $data['status'],
                'dari_tanggal'      => $data['dari_date'],
                'sampai_tanggal'    => $data['sampai_date'],
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ];

            $this->db->insert($this->table, $inset_data);
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

        return $response;
    }

    function edit_event($id)
    {
        $data = $this->input->post();
        
        if(empty($data['judul']) || empty($data['deskripsi']) || empty($data['dari_date']) || empty($data['sampai_date']) || empty($data['lokasi']) ){
            $response = [
                'code' => 400,
                'message' => 'Ops, Data anda belum lengkap'
            ];
            return $response;
        }
        try {

            $insert_data = [
                'nama'              => $data['judul'],
                'deskripsi'         => $data['deskripsi'],
                'lokasi'            => $data['lokasi'],
                'status'            => $data['status'],
                'dari_tanggal'      => $data['dari_date'],
                'sampai_tanggal'    => $data['sampai_date'],
                'updated_at'        => date('Y-m-d H:i:s')
            ];

            $this->db->where('id', $id)->update($this->table, $insert_data);

            $this->db->trans_commit();
            $response = [
                'code' => 200,
                'message' => 'Data berhasil di edit'
            ];
        } catch (Exception $e) {
            $this->db->trans_rollback();

            $response = [
                'code' => 400,
                'message' => 'Data gagal di edit'
            ];
        }

        return $response;
    }

    function edit_detail_event($id)
    {
        $data = $this->input->post();
        
        if(empty($data['nama']) || empty($data['email']) || empty($data['handphone']) || empty($data['gender'])){
            $response = [
                'code' => 400,
                'message' => 'Ops, Data anda belum lengkap'
            ];
            return $response;
        }
        try {

            $insert_data = [
                'nama'              => $data['nama'],
                'id_event'          => $data['id_event'],
                'email'             => $data['email'],
                'handphone'         => $data['handphone'],
                'gender'            => $data['gender'],
                'updated_at'        => date('Y-m-d H:i:s')
            ];

            $this->db->where('id', $id)->update($this->table_peserta, $insert_data);

            $this->db->trans_commit();
            $response = [
                'code' => 200,
                'message' => 'Data berhasil di edit'
            ];
        } catch (Exception $e) {
            $this->db->trans_rollback();

            $response = [
                'code' => 400,
                'message' => 'Data gagal di edit'
            ];
        }

        return $response;
    }

    function delete_event($id)
    {
        $id = $this->converter->decode($id);
        try {
            $this->db->where('id', $id);
            $this->db->delete($this->table);

            $this->db->trans_commit();
            $response = [
                'code' => 200,
                'message' => 'Data berhasil di hapus'
            ];
        } catch (Exception $e) {
            $this->db->trans_rollback();

            $response = [
                'code' => 400,
                'message' => 'Data gagal di hapus'
            ];
        }

        return $response;
    }

    function delete_detail_event($id)
    {
        $id = $this->converter->decode($id);
        try {
            $this->db->where('id', $id);
            $this->db->delete($this->table_peserta);

            $this->db->trans_commit();
            $response = [
                'code' => 200,
                'message' => 'Data berhasil di hapus'
            ];
        } catch (Exception $e) {
            $this->db->trans_rollback();

            $response = [
                'code' => 400,
                'message' => 'Data gagal di hapus'
            ];
        }

        return $response;
    }

    function data_event($id)
    {
        $id = $this->converter->decode($id);

        return $this->db->get_where($this->table, array('id' => $id))->result()[0];
    }
    function data_detail_event($id)
    {
        $id = $this->converter->decode($id);

        return $this->db->get_where($this->table_peserta, array('id' => $id))->result()[0];
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

    function add_event_peserta()
    {
        $data = $this->input->post();
        
        if(!empty($data['id_peserta'])){
            $response = $this->edit_detail_event($data['id_peserta']);
            return $response;
        }

        if(empty($data['nama']) || empty($data['email']) || empty($data['handphone']) || empty($data['gender'])){
            $response = [
                'code' => 400,
                'message' => 'Ops, Data anda belum lengkap'
            ];
            return $response;
        }
        try {

            $insert_data = [
                'nama'              => $data['nama'],
                'id_event'          => $data['id_event'],
                'email'             => $data['email'],
                'handphone'         => $data['handphone'],
                'gender'            => $data['gender'],
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ];

            $this->db->insert($this->table_peserta, $insert_data);
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

        return $response;
    }


}