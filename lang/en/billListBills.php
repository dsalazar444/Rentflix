<?php

return [
    'titlePage' => 'Your Invoices',
    'subtitle' => 'Download your invoices in PDF format',
    'searchPlaceholder' => 'Search invoice by id...',

    'tableHeaders' => [
        'billId' => 'Invoice ID',
        'creationDate' => 'Creation Date',
        'download' => 'Download',
    ],

    'successTitle' => 'Success!',
    'downloadButtonTitle' => 'Download invoice',
    'sendButtonTitle' => 'Send invoice by email',
    
    'statusModal' => [
        'notFound' => [
            'error' => 'The invoice does not exist.',
        ],
        'send' => [
            'success' => 'Email sent successfully',
            'error' => 'Error sending the email. Please try again.',
        ],
    ],
];
