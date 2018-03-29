<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard_fetch_comments()
    {
        $query = "SELECT * FROM comments, users WHERE comments.usr_id = users.usr_id AND cm_is_active = '0'";
        $result = $this->db->query($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function dashboard_fetch_discussions()
    {
        $query = "SELECT * FROM discussions, users WHERE discussions.usr_id = users.usr_id AND ds_is_active = '0'";
        $result = $this->db->query($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function update_comments()
    {
    }

    public function update_discussions()
    {
    }

    public function does_user_exist($email)
    {
        $this->db->where('usr_email', $email);
        $query = $this->db->get('users');
        return $query;
    }
}
