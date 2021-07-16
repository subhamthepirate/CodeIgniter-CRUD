<?php
class User_model extends CI_Model{
    function create($formData)
    {
        $this->db->insert('users',$formData);
    }

    function all(){
        return $users = $this->db->get('users')->result_array();
    }

    function getUser($userId){
        $this->db->where('user_id',$userId);
        return $user = $this->db->get('users')->row_array();
    }

    function updateUser($userId,$formData){
        $this->db->where('user_id',$userId);
        $this->db->update('users',$formData);
    }

    function deleteUser($userId){
        $this->db->where('user_id',$userId);
        $this->db->delete('users');
    }
}
?>