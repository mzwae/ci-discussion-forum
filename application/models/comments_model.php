<?php

class Comments_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetch_comments($ds_id)
    {
        $query = "SELECT * FROM comments, discussions, users
              WHERE discussions.ds_id = ?
              AND comments.ds_id = discussions.ds_id
              AND comments.usr_id = users.usr_id
              AND comments.cm_is_active = 1
              ORDER BY comments.cm_created_at DESC";

        $result = $this->db->query($query, array($ds_id));

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function new_comment($data)
    {
        // Check if the email entered already exists in the users table
        $usr_email = $data['usr_email'];
        $query = "SELECT * FROM users WHERE usr_email = ?";
        $result = $this->db->query($query, array($usr_email));


        // if it does, return the primary key
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $data['usr_id'] = $row->usr_id;
            }
        } else { // if not create a new user account and return the primary key
            $password = random_string('alnum', 16);
            // $hash = $this->encrypt->sha1($passowrd);

            $user_data = array(
          'usr_email' => $data['usr_email'],
          'usr_name' => $data['usr_name'],
          'usr_is_active' => '1',
          'usr_level' => '1',
          'usr_hash' => $password
        );

            if ($this->db->insert('users', $user_data)) {
                $data['usr_id'] = $this->db->insert_id();
            }
        }

        $comment_data = array(
        'cm_body' => $data['cm_body'],
        'ds_id' => $data['ds_id'],
        'cm_is_active' => '1',
        'usr_id' => $data['usr_id'],
      );

        if ($this->db->insert('comments', $comment_data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function flag($cm_id)
    {
        $this->db->wehre('cm_id', $cm_id);
        if ($this->db->update('comments', array('cm_is_active'=>'0'))) {
            return true;
        } else {
            return false;
        }
    }
}
