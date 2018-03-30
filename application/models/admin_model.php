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

    public function update_comments($is_active, $id)
    {
        if ($is_active == 1) {//Allow Comment to be displayed
            $query = "UPDATE comments SET cm_is_active = ? WHERE cm_id = ?";
            if ($this->db->query($query, array($is_active, $id))) {
                return true;
            } else {
                return false;
            }
        } else { // Disallow comment and delete it from database
            $query = "DELETE FROM comments WHERE cm_id = ?";
            if ($this->db->query($query, array($id))) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function update_discussions($is_active, $id)
    {
        if ($is_active == 1) {
            $query = "UPDATE discussions SET ds_is_active = ? WHERE ds_id = ?";
            if ($this->db->query($query, array($is_active, $id))) {
                return true;
            } else {
                return false;
            }
        } else {
            $query = "DELETE FROM discussions WHERE ds_id = ?";
            if ($this->db->query($query, array($id))) {
                $query = "DELETE FROM comments WHERE ds_id = ?";
                if ($this->db->query($query, array($id))) {
                    return true;
                }
            } else {
                return false;
            }
        }
    }

    public function does_user_exist($email)
    {
        $this->db->where('usr_email', $email);
        $query = $this->db->get('users');
        return $query;
    }
}
