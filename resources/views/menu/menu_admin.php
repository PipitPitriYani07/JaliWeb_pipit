<?php
/* Dokumentasi Icon https://fontawesome.com/search Filter = Free */
$arr_menu = array(
    array(
        'text'     => 'Dashboard',
        'url'      => 'dashboard',
        'icon'     => 'fas fa-tachometer-alt',
        'has_sub'  => false,
        'sub_menu' => array()
    ),
    array(
        'text'     => 'Master',
        'url'      => '#',
        'icon'     => 'fas fa-database',
        'has_sub'  => true,
        'sub_menu' => array(
            array(
                'text'      => 'Pengguna',
                'url'       => 'pengguna',
                'icon'      => 'far fa-circle',
                'has_sub'   => false,
                'sub_menu'  => array()
            ),
            array(
                'text'      => 'Tarif',
                'url'       => 'tarif',
                'icon'      => 'far fa-circle',
                'has_sub'   => false,
                'sub_menu'  => array()
            ),
            array(
                'text'  => 'Restoran',
                'url'   => 'restoran',
                'icon'  => 'far fa-circle',
                'has_sub' => false,
                'sub_menu' => array()
            ),
        )
    ),
    array(
        'text'     => 'Transaksi',
        'url'      => '#',
        'icon'     => 'fas fa-cart-plus',
        'has_sub'  => true,
        'sub_menu' => array(
            array(
                'text'  => 'Pemesanan',
                'url'   => 'pemesanan',
                'icon'  => 'far fa-circle',
                'has_sub' => false,
                'sub_menu' => array()
            ),
            array(
                'text'  => 'Top Up',
                'url'   => 'topup',
                'icon'  => 'far fa-circle',
                'has_sub' => false,
                'sub_menu' => array()
            ),
            array(
              'text'  => 'Penarikan',
              'url'   => 'penarikan',
              'icon'  => 'far fa-circle',
              'has_sub' => false,
              'sub_menu' => array()
          ),
        )
    ),
    array(
        'text'     => 'Promosi',
        'url'      => '#',
        'icon'     => 'fas fa-book',
        'has_sub'  => true,
        'sub_menu' => array(
            array(
                'text'  => 'Potongan Harga',
                'url'   => 'potongan-harga',
                'icon'  => 'far fa-circle',
                'has_sub' => false,
                'sub_menu' => array()
            ),
            array(
                'text'  => 'Banner',
                'url'   => 'banner',
                'icon'  => 'far fa-circle',
                'has_sub' => false,
                'sub_menu' => array()
            ),
        )
    ),
    array(
        'text'     => 'Laporan',
        'url'      => '#',
        'icon'     => 'fas fa-file',
        'has_sub'  => true,
        'sub_menu' => array(
            array(
                'text'  => 'Laporan Ulasan',
                'url'   => 'laporan-ulasan',
                'icon'  => 'far fa-circle',
                'has_sub' => false,
                'sub_menu' => array()
            ),
            array(
                'text'  => 'Laporan Transaksi',
                'url'   => 'laporan-transaksi',
                'icon'  => 'far fa-circle',
                'has_sub' => false,
                'sub_menu' => array()
            ),
            // array(
            //     'text'      => 'Laporan Top Up',
            //     'url'       => 'LaporanTopUp',
            //     'icon'      => 'far fa-circle',
            //     'has_sub'   => false,
            //     'sub_menu'  => array()
            // ),
            // array(
            //     'text'      => 'Laporan Keuangan',
            //     'url'       => 'LaporanKeuangan',
            //     'icon'      => 'far fa-circle',
            //     'has_sub'   => false,
            //     'sub_menu'  => array()
            // ),
        )
    ),

    array(
        'text'     => 'Pengaturan',
        'url'      => '#',
        'icon'     => 'fas fa-cog',
        'has_sub'  => true,
        'sub_menu' => array(
            array(
                'text'      => 'Kota Layanan',
                'url'       => 'layanan',
                'icon'      => 'far fa-circle',
                'has_sub'   => false,
                'sub_menu'  => array()
            ),
            array(
                'text'      => 'Jenis Kendaraan',
                'url'       => 'kendaraan',
                'icon'      => 'far fa-circle',
                'has_sub'   => false,
                'sub_menu'  => array()
            ),
            array(
                'text'      => 'Lainnya',
                'url'       => 'lainnya',
                'icon'      => 'far fa-circle',
                'has_sub'   => false,
                'sub_menu'  => array()
            ),
        )
    ),
);
return $arr_menu;
