<?php

return [
    'swal' => [
        'title' => [
            'confirm' => 'Are you sure :first :second ?',
            'success' => 'Success',
            'error' => 'Error',
            'warning' => 'Warning',
        ],
        'text' => [
            'delete' => 'Delete data :first <b>:second</b>'
        ],
        'html' => [
            'delete' => 'Delete data'
        ],
        'button' => [
            'ok' => 'OK',
            'yes' => 'Yes',
            'no' => 'No',
        ]
    ],

    'donor' => [
        'cekal' => 'Donor Data Status is Blocked',
    ],

    'biodata' => [
        'kebangsaan' => 'Nationality',
        'no_hp' => 'Mobile Phone Number',
        'no_telpon' => 'Telephone Number',
        'no_telpon_kantor' => 'Office Phone Number',
    ],

    'input' => [
        'pilih' => 'Choose',
        'kuesioner' => 'Questionnaire',
        'tidak_tahu' => "Don't know",
        'positif' => 'Positive',
        'negatif' => 'Negative',
    ],

    'wilayah' => [
        'prov' => 'Province',
        'kab' => 'Regency',
        'kec' => 'Sub-district',
        'kel' => 'Village',
    ],

    'error' => [
        'printer' => [
            'fail' => 'Printer Connection Failed',
            'closed' => 'Printer Connection Closed',
            'not_set' => 'Printer Connection Setting Not Set',
            'init' => 'Printer Connection not Initialized',
            'not_found' => 'Printer Not Found',
            'type_error' => 'Error Type Argument',
            'args_error' => 'Error Arguments',
        ]
    ],
    'text' => [
        'register_ask_old_title' => 'Have you registered before?',
        'register_ask_old_text' => 'If you have registered before, please click the <b>:first</b> button and enter your donor number.',

        'register_ask_antrian_title' => 'Do you want to print the queue number?',
        'register_ask_antrian_text' => 'Please click the <b>:first</b> button to go to the print page.',

        'antrian_ask_old_title' => 'Have you registered?',
        'antrian_ask_old_text' => 'If so, please click the <b>:first</b> button to print the queue number, if not, please register first.',
    ],
    'register' => [
        'success' => 'Registration process successful<br> Donor No. : <b>:no_donor</b> <br> Register No. : <b>:no_daftar</b> <br>Thank you for donating',
        'failed' => 'Registration process failed',
        'already_registered_today' => 'Donors have registered today',
        'alert_next_date' => "You can't donate yet, because it's not <b>:date_pass</b> days since your previous donation! <br> Please come back later on <b>:next_date_remaining</b>",
        'no_print_only_update_register' => 'Update Registration Number & Queue Number successful!',
    ]
];
