<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {
    Public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'username harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'password harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'login';
            $this->load->database();
            $this->load->view('auth/login',$data);
        } else {
            // validasi sukses
            $this->_login();
        }
        
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //jika user ada
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('operator');
                } elseif ($user['role_id'] == 2) {
                    redirect('penjual');
                } elseif ($user['role_id'] == 3) {
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">password salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username tidak ada</div>');
            redirect('auth');
        }
    }

    Public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'username sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false)
        {
            $data['judul'] = 'register';
            $this->load->database();
            $this->load->view('auth/registration',$data);
        }
        else
        {
            $originalDate = htmlspecialchars($this->input->post('tanggal_lahir', true));
            $newDate = date("Y-m-d", strtotime($originalDate));

            $data1 = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
            ];

            $data2 = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'jk' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'tanggal_lahir' => $newDate,
            ];

            $data3 = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'jk' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'tanggal_lahir' => $newDate,
                'nama_toko' => htmlspecialchars($this->input->post('nama_toko', true)),
            ];
            

            $this->db->insert('user', $data1);
            if (htmlspecialchars($this->input->post('role_id', true) == 3))
            {
                $this->db->insert('pembeli', $data2);
            }   
            elseif (htmlspecialchars($this->input->post('role_id', true) == 2))
            {
                $this->db->insert('penjual', $data3);
            }        
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div role="alert">anda telah log out</div>');
        redirect('home');
    }
}