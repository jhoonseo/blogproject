<?php
class Main_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        //$this->load->helper('form');
        //$this->load->helper('url');
    }
    function gets()
    {
        return $this->db->query("SELECT * FROM Blog;")->result();
    }
    function get($number)
    {
        //return $this->db->query("SELECT * FROM Blog WHERE count = {$number};")->result();
        return $this->db->get_where('Blog', array('count'=>$number))->row();
    }
    function alter($count, $password, $name, $title, $content)
    {
        $password_h = $this->db->get_where('Blog', array('count'=>$count))->row()->password;
        if (password_verify($password, $password_h)) {
            $this->db->query("UPDATE Blog SET name = '{$name}', title= '{$title}', content = '{$content}' WHERE count = {$count};");
            return "수정이 완료되었습니다.";
        } else {
            return "비밀번호를 확인해주세요.";
        }
    }

    /*
    function check($count, $pass)
    {
        //$password_h = hash("sha256", $pass);
        $encrypted_passwd = password_hash($pass, PASSWORD_DEFAULT);
        $result = $this->db->query("SELECT * FROM Blog WHERE count = '{$count}' AND password = '{$encrypted_passwd}';");
        return $result;
        //return $this->db->affected_rows();
    }
    function update($name, $title, $content, $count, $pass)
    {
        //$password_h = hash("sha256", $pass);
        $encrypted_passwd = password_hash($pass, PASSWORD_DEFAULT);
        $this->db->query("UPDATE Blog SET name = '{$name}', title= '{$title}', content = '{$content}' WHERE count = {$count} AND password = '{$encrypted_passwd}';");
        return "업데이트 완료";
    }
    */
    
    function insert($name, $title, $content, $password)
    {
        if ($password && $password !== "0" && $password !== 0) {
            //$password_h = hash("sha256", $password);
            $encrypted_passwd = password_hash($password, PASSWORD_DEFAULT);
            $this->db->query("INSERT INTO Blog (name, title, content, password) VALUES('{$name}', '{$title}', '{$content}', '{$encrypted_passwd}');");
            return "completed insertion";
        } else {
            return "failed insertion <br> 비밀번호를 체크해주세요."; 
        }
    }
}
?>   