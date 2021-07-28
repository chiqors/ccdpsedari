<?php

    class Transaksi_model
    {
        private $db;

        public function __construct()
        {
           $this->db = new Database();
        }

        public function destroyTransaksi($id)
        {
            $this->db->query('DELETE FROM detail_transaksi where id_transaksi = :id');
            $this->db->bind(':id', $id);
            if( $this->db->execute() ){
                $this->db->query('DELETE FROM transaksi where id = :id');
                $this->db->bind(':id', $id);
                if( $this->db->execute() ){
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        // Alur Transaksi

        public function getTransaksiList()
        {
            $this->db->query('select * 
                                from transaksi t left join pengguna p on t.kasir = p.nip 
                                order by t.tanggal desc');
            return $this->db->resultSet();
        }

        public function getTransaksiById($id)
        {
            $this->db->query('select * from transaksi where id = :id');
            $this->db->bind(':id',$id);
            return $this->db->single();
        }

        public function storeTransaksiId()
        {
            $this->db->query('INSERT INTO transaksi (tanggal, sub_total, kupon, total_harga, bayar, kembalian, kasir) 
                                values (null, null, null, null, null, null, null)');

            return $this->db->resultLastId();
        }

        public function getTransaksiMenuList($id)
        {
            $this->db->query('SELECT detail_transaksi.id, menu.nama_menu, menu.harga, detail_transaksi.jumlah_beli, total_harga
                                FROM menu JOIN detail_transaksi ON menu.id = detail_transaksi.id_menu
                                WHERE detail_transaksi.id_transaksi = :id');
            $this->db->bind(':id', $id);
            return $this->db->resultSet();
        }

        public function getSubTotalTransaksi($id)
        {
            $this->db->query('SELECT sum(detail_transaksi.total_harga) AS sub_total
                                FROM detail_transaksi
                                WHERE detail_transaksi.id_transaksi = :id');
            $this->db->bind(':id', $id);
            return $this->db->single();
        }

        public function getAvailableMenu()
        {
            $this->db->query('SELECT *
                                FROM menu
                                WHERE stok > 0');
            return $this->db->resultSet();
        }

        public function storeDetailTransaksi($data)
        {
            $this->db->query('INSERT INTO detail_transaksi (id_transaksi, id_menu, jumlah_beli, total_harga) values (:id_transaksi, :id_menu, :jumlah_beli, :total_harga)');
            // Bind values
            $this->db->bind(':id_transaksi', $data['id_transaksi']);
            $this->db->bind(':id_menu', $data['id_menu']);
            $this->db->bind(':jumlah_beli', $data['jumlah_beli']);
            $this->db->bind(':total_harga', $data['total_harga']);

            // Execute
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }

        public function getAvailableKupon()
        {
            $this->db->query('SELECT * 
                                FROM kupon 
                                WHERE CURRENT_DATE >= tanggal_mulai AND 
                                    CURRENT_DATE <= tanggal_hangus');
            return $this->db->resultSet();
        }

        public function storeTransaksi($data)
        {
            $this->db->query('UPDATE transaksi SET tanggal = :tanggal, sub_total = :sub_total, kupon = :kupon, total_harga = :total_harga, bayar = :bayar, kembalian = :kembalian, kasir = :kasir WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':tanggal', $data['tanggal']);
            $this->db->bind(':sub_total', $data['sub_total']);
            $this->db->bind(':kupon', $data['kupon']);
            $this->db->bind(':total_harga', $data['total_harga']);
            $this->db->bind(':bayar', $data['bayar']);
            $this->db->bind(':kembalian', $data['kembalian']);
            $this->db->bind(':kasir', $data['kasir']);
            // Execute
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }
    }