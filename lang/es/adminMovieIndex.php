<?php 

return [
    'titlePage' => 'Panel de Administración',
    'subtitle' => 'Gestiona el catálogo de películas',
    'addButton' => 'Agregar Película',
    'searchPlaceholder' => 'Buscar películas...',
    
    'tableHeaders' => [
        'movie' => 'Película',
        'genre' => 'Género',
        'year' => 'Año',
        'format' => 'Formato',
        'price' => 'Precio',
        'status' => 'Estado',
        'actions' => 'Acciones',
    ],
    
    'statusAvailable' => 'Disponible',
    'statusSoldOut' => 'Agotada',
    'editButtonTitle' => 'Editar',
    'deleteButtonTitle' => 'Eliminar',
    'deleteConfirmMessage' => '¿Seguro que quieres eliminar esta película?',

    'statusModal' => [
        'save' => [
            'title' => 'Guardar película',
            'success' => 'La película se guardó correctamente.',
        ],
        'delete' => [
            'title' => 'Eliminar película',
            'success' => 'La película se eliminó correctamente.',
        ],
        'update' => [
            'title' => 'Actualizar película',
            'success' => 'La película se actualizó correctamente.',
        ],
        'notFound' => [
            'title' => 'Película no encontrada',
            'error' => 'La película no existe.',
        ],
    ],
];
