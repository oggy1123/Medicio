<?php
    include '../lib/session.php';
    session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>

<?php
    class adminlogin
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_admin($AdminUser, $AdminPass){
            $AdminUser = $this->fm->validation($AdminUser);
            $AdminPass = $this->fm->validation($AdminPass);

            $AdminUser = mysqli_real_escape_string($this->db->link, $AdminUser);
            $AdminPass = mysqli_real_escape_string($this->db->link, $AdminPass);

            if(empty($AdminUser)|| empty($AdminPass)){
                $alert = "User va Pass khong nen trong";
                return $alert;
            }else{
                $query = "SELECT * FROM tbl_admin WHERE admin_user = '$AdminUser' AND admin_pass = '$AdminPass'";
                $result = $this->db->select($query);

                if($result != false){

                    $value = $result->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('id', $value['id']);
                    Session::set('admin_user', $value['admin_user']);
                    Session::set('admin_name', $value['admin_name']);
                    header('Location:index.php');

                }else{
                    $alert = "Ten nguoi dung va pass khong trung khop";
                    return $alert;
                }
            }
        }
    }
?>