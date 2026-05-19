<?php

return [
    'titlePage' => 'Panel de Administración',
    'subtitle' => 'Gestiona el catálogo de facturas',
    'addButton' => 'Agregar Factura',
    'searchPlaceholder' => 'Buscar facturas por id...',

    'tableHeaders' => [
        'billId' => 'ID Factura',
        'date' => 'Fecha',
        'price' => 'Precio',
        'customer' => 'A nombre de',
        'items' => 'Items',
        'actions' => 'Acciones',
    ],

    'viewItemsButton' => 'Ver items',
    'editButtonTitle' => 'Editar',
    'deleteButtonTitle' => 'Eliminar',
    'deleteConfirmMessage' => '¿Seguro que quieres eliminar esta factura?',

    'statusModal' => [
        'save' => [
            'title' => 'Guardar factura',
            'success' => 'La factura se guardó correctamente.',
            'error' => 'Error al crear la factura. Por favor, intenta de nuevo.',
        ],
        'delete' => [
            'title' => 'Eliminar factura',
            'success' => 'La factura se eliminó correctamente.',
        ],
        'update' => [
            'title' => 'Actualizar factura',
            'success' => 'La factura se actualizó correctamente.',
        ],
        'notFound' => [
            'title' => 'Factura no encontrada',
            'error' => 'La factura no existe.',
        ],
    ],
];
