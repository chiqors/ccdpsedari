<?php

    class Transaksi extends Controller
    {
        public function __construct()
        {
            $this->penggunaModel = $this->model('Pengguna_model');
            $this->transaksiModel = $this->model('Transaksi_model');
        }

        public function index()
        {
            $transaksiList = $this->transaksiModel->getTransaksiList();
            $data = [
                'transaksi_list' => $transaksiList
            ];
            $this->view('transaksi/index', $data);
        }

        public function show($id)
        {
            $transaksi = $this->transaksiModel->getTransaksiById($id);
            $detail_transaksi = $this->transaksiModel->getTransaksiMenuList($id);
            $data = [
                'transaksi' => $transaksi,
                'detail_transaksi' => $detail_transaksi
            ];
            $this->view('transaksi/show', $data);
        }

        public function destroy($id)
        {
            // Get existing post from model
            $transaksi = $this->transaksiModel->getTransaksiById($id);

            //Check for owner
            if( $transaksi->kasir != $_SESSION['user_nip'] ){
                flash('error', 'Transaksi hanya bisa dihapus oleh kasir yang berwenang!');
                redirect('transaksi');
            }
            if( $this->transaksiModel->destroyTransaksi($id) ){
                flash('success', 'Transaksi berhasil dihapuskan!');
                redirect('transaksi');
            } else {
                die('Something went wrong');
            }
        }

        // ALUR TRANSAKSI

        public function start()
        {
            $id_transaksi = $this->transaksiModel->storeTransaksiId();
            $_SESSION['info_alur_total_semua_harga_menu'] = 0;
            $_SESSION['info_alur_id_transaksi'] = $id_transaksi;
            redirect('transaksi/detail_transaksi');
        }

        public function detail_transaksi()
        {
            $id_transaksi = $_SESSION['info_alur_id_transaksi'];
            $data_get1 = $this->transaksiModel->getAvailableMenu();
            $data_get2 = $this->transaksiModel->getTransaksiMenuList($id_transaksi);
            $data_get3 = $this->transaksiModel->getSubTotalTransaksi($id_transaksi);
            $data = array(
                'info_menu' => $data_get1,
                'info_transaksi_menu' => $data_get2,
                'info_sub_total' => $data_get3,
                'info_transaksi' => $id_transaksi,
                'success' => 'Inisialisasi alur data transaksi telah dimulai. Mohon jangan tinggalkan halaman ini sampai alur selesai!',
                'title' => 'Alur (Detail Transaksi)'
            );
            $this->view('transaksi/form_detail_transaksi', $data);
        }

        public function store_detail_transaksi()
        {
            $data = [
                'id_transaksi' => $_POST['id_transaksi'],
                'id_menu' => $_POST['id_menu'],
                'jumlah_beli' => $_POST['jumlah_beli'],
                'total_harga' => $_POST['total_harga'],
            ];

            if ($_POST['submitForm'] == 'loop') {
                $this->transaksiModel->storeDetailTransaksi($data);
                $_SESSION['info_alur_total_semua_harga_menu'] = $_SESSION['info_alur_total_semua_harga_menu'] + $_POST['total_harga'];
                $_SESSION['info_alur_id_transaksi'] = $_POST['id_transaksi'];
                flash('success', 'Detail Transaksi berhasil didaftarkan, Silahkan ulangi proses detail transaksi sampai memenuhi');
                redirect('transaksi/detail_transaksi');
            } else {
                $this->transaksiModel->storeDetailTransaksi($data);
                $_SESSION['info_alur_total_semua_harga_menu'] = $_SESSION['info_alur_total_semua_harga_menu'] + $_POST['total_harga'];
                $_SESSION['info_alur_id_transaksi'] = $_POST['id_transaksi'];
                flash('success', 'Detail Transaksi berhasil untuk menyelesaikan pendaftaran, Silahkan Isi bagian terakhir, Transaksi');
                redirect('transaksi/transaksi_akhir');
            }
        }

        public function transaksi_akhir()
        {
            if (empty($_SESSION['info_alur_total_semua_harga_menu'])) {
                flash('error', 'Anda harus mengikuti alur transaksi secara bertahap');
                redirect('transaksi/start');
            }
            $data_get1 = $this->transaksiModel->getSubTotalTransaksi($_SESSION['info_alur_id_transaksi']);
            $info_sub_total_transaksi = $data_get1->sub_total;
            $data_get2 = $this->transaksiModel->getAvailableKupon();
            $data = array(
                'info_kupon' => $data_get2,
                'info_sub_total_transaksi' => $info_sub_total_transaksi,
                'title' => 'Alur (Transaksi Akhir)'
            );
            $this->view('transaksi/form_akhir_transaksi', $data);
        }

        public function store_transaksi($id)
        {
            $data = [
                'id' => $id,
                'tanggal' => $_POST['tanggal'],
                'sub_total' => $_POST['sub_total'],
                'kupon' => $_POST['kupon'],
                'total_harga' => $_POST['total_harga'],
                'bayar' => $_POST['bayar'],
                'kembalian' => $_POST['kembalian'],
                'kasir' => $_POST['kasir'],
            ];
            if ($this->transaksiModel->storeTransaksi($data)) {
                unset($_SESSION['info_alur_total_semua_harga_menu']);
                unset($_SESSION['info_alur_id_transaksi']);
                flash('success', 'Alur Transaksi berhasil diproses! Anda dikembalikan ke halaman beranda');
                redirect('transaksi');
            } else {
                redirect('transaksi/transaksi_akhir');
            }
        }

    }