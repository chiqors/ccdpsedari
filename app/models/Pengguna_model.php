<?php

    class Pengguna_model {

        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }
    
        public function addPengguna($data)
        {
            $this->db->query('INSERT INTO pengguna (nip, nama, alamat, kontak, jabatan, username, password) values (:nip, :nama, :alamat. :kontak, :jabatan, :username, :password)');
            // Bind values
            $this->db->bind(':nip', $data['nip']);
            $this->db->bind(':nama', $data['nama']);
            $this->db->bind(':alamat', $data['alamat']);
            $this->db->bind(':kontak', $data['kontak']);
            $this->db->bind(':jabatan', $data['jabatan']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);
            // Execute
            if ( $this->db->execute() ) {
                return true;
            } else {
                return false;
            }
        }
    
        public function deleteUser($nip)
        {
            $this->db->query('DELETE FROM pengguna where nip = :nip');
            // Bind values
            $this->db->bind(':nip', $nip);
        
            // Execute
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }
        
        public function login($username,$password)
        {
            $this->db->query('SELECT * from pengguna where username = :username');
            $this->db->bind(':username', $username);
            $row = $this->db->single();

            $hashed_password = $row->password;
            if ( md5($password) == $hashed_password ) {
                return $row;
            } else {
                return false;
            }
        }
    
        public function checkPassword($username,$password)
        {
            $this->db->query('SELECT * from pengguna where username = :username');
            $this->db->bind(':username', $username);
            $row = $this->db->single();
    
            $hashed_password = $row->password;
            if ( password_verify($password,$hashed_password) ) {
                return $row;
            } else {
                return false;
            }
        }

        public function getPenggunaByUsername($username)
        {
            $this->db->query('SELECT * FROM pengguna WHERE username = :username');
            // Bind values
            $this->db->bind(':username', $username);
            $this->db->single();

            // Check row
            if ( $this->db->rowCount() > 0 ) {
                return true;
            } else {
                return false;
            }
        }

        public function getPenggunaByNIP($nip)
        {
            $this->db->query('SELECT * FROM pengguna WHERE nip = :nip');
            // Bind values
            $this->db->bind(':nip', $nip);
            return $this->db->single();
        }
    
        public function updatePassword($data)
        {
            $this->db->query('UPDATE pengguna SET password = :password where username = :username');
            // Bind values
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':username', $data['username']);
            // Execute
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }
    
        public function getPenggunaList()
        {
            $this->db->query('SELECT * FROM pengguna');
            return $this->db->resultSet();
    
        }
        
    }