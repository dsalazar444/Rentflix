function fillEditModal(event) {
    const movie = JSON.parse(event.relatedTarget.dataset.movie);
    const form = document.getElementById('formEdit');

    form.querySelector('[name="title"]').value          = movie.title;
    form.querySelector('[name="director"]').value       = movie.director;
    form.querySelector('[name="genre"]').value          = movie.genre;
    form.querySelector('[name="format"]').value         = movie.format;
    form.querySelector('[name="location"]').value       = movie.location;
    form.querySelector('[name="price"]').value          = movie.price;
    form.querySelector('[name="quantity"]').value       = movie.quantity;
    form.querySelector('[name="year"]').value           = movie.year;
    form.querySelector('[name="classification"]').value = movie.classification;
    form.querySelector('[name="trailer_link"]').value      = movie.trailer_link;

    const posterPreview = document.getElementById('posterPreview');
    posterPreview.src = `/storage/${movie.file_name}`;
    posterPreview.style.display = 'block';

    document.getElementById('movie_image_edit').value = '';
    document.getElementById('fileNameDisplay').textContent = '';

    form.action = `/admin/movies/${movie.id}`;
}

function handleFileSelect() {
    const fileInput = document.getElementById('movie_image_edit');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const posterPreview = document.getElementById('posterPreview');

    if (fileInput.files.length > 0) {
        const fileName = fileInput.files[0].name;
        fileNameDisplay.textContent = `Archivo seleccionado: ${fileName}`;
        posterPreview.style.display = 'none';
    } else {
        fileNameDisplay.textContent = '';
        posterPreview.style.display = 'block';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('modalEdit').addEventListener('show.bs.modal', fillEditModal);
});