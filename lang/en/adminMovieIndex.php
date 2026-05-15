<?php 

return [
    'titlePage' => 'Administration Panel',
    'subtitle' => 'Manage movie catalog',
    'addButton' => 'Add Movie',
    'searchPlaceholder' => 'Search movies...',
    
    'tableHeaders' => [
        'movie' => 'Movie',
        'genre' => 'Genre',
        'year' => 'Year',
        'format' => 'Format',
        'price' => 'Price',
        'status' => 'Status',
        'actions' => 'Actions',
    ],
    
    'statusAvailable' => 'Available',
    'statusSoldOut' => 'Sold Out',
    'editButtonTitle' => 'Edit',
    'deleteButtonTitle' => 'Delete',
    'deleteConfirmMessage' => 'Are you sure you want to delete this movie?',

    'statusModal' => [
        'save' => [
            'title' => 'Save movie',
            'success' => 'Movie saved successfully.',
        ],
        'delete' => [
            'title' => 'Delete movie',
            'success' => 'Movie deleted successfully.',
        ],
        'update' => [
            'title' => 'Update movie',
            'success' => 'Movie updated successfully.',
        ],
        'notFound' => [
            'title' => 'Movie not found',
            'error' => 'The movie does not exist.',
        ],
    ],
];
