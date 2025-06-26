<?php

return [
    'swal' => [
        'title' => [
            'confirm' => 'Apakah anda yakin :first :second ?',
            'success' => 'Sukses',
            'error' => 'Error',
            'warning' => 'Peringatan',
        ],
        'text' => [
            'delete' => 'Delete data :first <b>:second</b>'
        ],
        'html' => [
            'delete' => 'Menghapus data'
        ],
        'button' => [
            'ok' => 'OK',
            'yes' => 'Ya',
            'no' => 'Tidak',
        ]
    ],

    'donor' => [
        'cekal' => 'Status Data Pendonor Cekal',
    ],

    'biodata' => [
        'kebangsaan' => 'Kebangsaan',
        'no_hp' => 'No HP',
        'no_telpon' => 'No Telpon',
        'no_telpon_kantor' => 'No Telpon Kantor',
    ],

    'input' => [
        'pilih' => 'Pilih',
        'kuesioner' => 'Kuesioner',
        'tidak_tahu' => 'Tidak Tahu',
        'positif' => 'Positif',
        'negatif' => 'Negatif',
    ],

    'wilayah' => [
        'prov' => 'Provinsi',
        'kab' => 'Kabupaten',
        'kec' => 'Kecamatan',
        'kel' => 'Kelurahan',
        'kodepos' => 'Kodepos',
    ],

    'error' => [
        'printer' => [
            'fail' => 'Koneksi Printer Gagal',
            'closed' => 'Koneksi Printer ditutup',
            'not_set' => 'Pengaturan Koneksi Printer Belum Diatur',
            'init' => 'Koneksi Printer Tidak Diinisialisasi',
            'not_found' => 'Printer Tidak Ditemukan',
            'type_error' => 'Error Tipe Argument',
            'args_error' => 'Error Arguments',
        ]
    ],
    'text' => [
        'register_ask_old_title' => 'Apakah Anda sudah pernah mendaftar sebelumnya?',
        'register_ask_old_text' => 'Jika Anda sudah pernah mendaftar sebelumnya, silahkan klik tombol <b>:first</b> dan masukkan nomor donor Anda.',

        'register_ask_antrian_title' => 'Apakah Anda ingin mencetak nomor antrian?',
        'register_ask_antrian_text' => 'Silahkan klik tombol <b>:first</b> untuk ke halaman cetak.',

        'antrian_ask_old_title' => 'Apakah Anda sudah melakukan pendaftaran?',
        'antrian_ask_old_text' => 'Jika sudah, silahkan klik tombol <b>:first</b> untuk cetak nomor antrian, jika belum mohon untuk melakukan pendaftaran terlebih dahulu.',
    ],
    'register' => [
        'success' => 'Proses registrasi berhasil<br> No. Donor : <b>:no_donor</b> <br> No. Daftar : <b>:no_daftar</b> <br>Terimakasih telah donor',
        'failed' => 'Proses registrasi gagal',
        'already_registered_today' => 'Pendonor sudah melakukan pendaftaran hari ini',
        'alert_next_date' => "Anda belum bisa donor, karena belum <b>:date_pass</b> hari setelah donor sebelumnya! <br> Silahkan kembali lagi pada tanggal <b>:next_date_remaining</b>",
        'no_print_only_update_register' => 'Update No Registrasi & No Antrian berhasil!',
    ]
];
