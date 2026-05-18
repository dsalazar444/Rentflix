<?php 

return [
    'titlePage' => 'Administration Panel',
    'subtitle' => 'Manage invoice catalog',
    'addButton' => 'Add Invoice',
    'searchPlaceholder' => 'Search invoices by id...',
    
    'tableHeaders' => [
        'billId' => 'Invoice ID',
        'date' => 'Date',
        'price' => 'Price',
        'customer' => 'Customer Name',
        'items' => 'Items',
        'actions' => 'Actions',
    ],
    
    'viewItemsButton' => 'View items',
    'editButtonTitle' => 'Edit',
    'deleteButtonTitle' => 'Delete',
    'deleteConfirmMessage' => 'Are you sure you want to delete this invoice?',

    'statusModal' => [
        'save' => [
            'title' => 'Save invoice',
            'success' => 'Invoice saved successfully.',
            'error' => 'Error creating invoice. Please try again.',
        ],
        'delete' => [
            'title' => 'Delete invoice',
            'success' => 'Invoice deleted successfully.',
        ],
        'update' => [
            'title' => 'Update invoice',
            'success' => 'Invoice updated successfully.',
        ],
        'notFound' => [
            'title' => 'Invoice not found',
            'error' => 'The invoice does not exist.',
        ],
    ],
];
