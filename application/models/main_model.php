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
        return $this->db->get_where('
        Blog', array('count'=>$number))->row();
    }
    function check($pass, $count)
    {
        $result = $this->db->query("SELECT * FROM Blog WHERE count = '{$count}' AND password = '{$pass}';");
        //return $result;
        return $this->db->affected_rows();
    }
    function update($name, $title, $content, $count, $pass)
    {
        $this->db->query("UPDATE Blog SET name = '{$name}', title= '{$title}', content = '{$content}' WHERE count ={$count} AND password = '{$pass}';");
        return "업데이트 완료";
    }
    function insert($name, $title, $content, $password)
    {
        //if (isset($a)) && isset($b) && isset($c){ isset( $a, $b, $c )
        //var_dump($password);
        if ($password && $password !== "0" && $password !== 0) {
            $this->db->query("INSERT INTO Blog (name, title, content, password) VALUES('{$name}', '{$title}', '{$content}', '{$password}');");
            return "completed insertion";
        } else {
            return "failed insertion <br> 비밀번호를 체크해주세요."; 
        }
    }
}
?>   