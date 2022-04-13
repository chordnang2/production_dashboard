<?php
 
class Auth extends CI_Controller
 
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
 
    public function index()
    {
        $this->load->view('auth/login');
    }
 
    public function loginForm()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        if ($this->form_validation->run() == FALSE) {
 
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('index.php/auth');
         
        } else {
 
            $email = htmlspecialchars($this->input->post('email'));
            $pass = htmlspecialchars($this->input->post('password'));
            $cek_login = $this->auth_model->cek_login($email);  
 
            if($cek_login == FALSE)
            {
 
                $this->session->set_flashdata('error_login', 'Email yang Anda masukan tidak terdaftar.');
                redirect('index.php/auth');
 
            } else {
 
                if(password_verify($pass, $cek_login->password)){
                    $this->session->set_userdata('id', $cek_login->id);
                    $this->session->set_userdata('name', $cek_login->name);
                    $this->session->set_userdata('email', $cek_login->email);
                    $this->session->set_userdata('level', $cek_login->level); 
 
                    redirect('/category');
 
                } else {
 
                    $this->session->set_flashdata('error_login', 'Email atau password yang Anda masukan salah.');
                    redirect('auth');
 
                }
            }
        }
    }
 
    public function register()
    {
 
        $this->load->view('auth/register');
 
    }
 
    public function registerForm()
 
    {
 
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confrim_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('level', 'Level', 'required');
 
        if ($this->form_validation->run() == FALSE) {
 
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('auth/register');
 
        } else {
 
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $level = $this->input->post('level');
 
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $pass,
                'level' => $level
            ];
 
            $insert = $this->auth_model->register("users", $data);
 
            if($insert){
 
                $this->session->set_flashdata('success_login', 'Sukses, Anda berhasil register. Silahkan login sekarang.');
                redirect('auth');
 
            }
        }
    }
 
    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>
        
            window.location.href="'.base_url('index.php/auth').'";
            </script>';
    }
}