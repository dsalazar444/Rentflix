// Made by: Laura Andrea Castrillón Fajardo

document.addEventListener('DOMContentLoaded', function () {
    const externalTitle = document.getElementById('external_title');
    const hiddenTitle = document.getElementById('title');
    const movieForm = document.getElementById('movieForm');

    if (!externalTitle || !hiddenTitle || !movieForm) {
        return;
    }

    const syncTitle = function () {
        hiddenTitle.value = externalTitle.value;
    };

    externalTitle.addEventListener('input', syncTitle);
    movieForm.addEventListener('submit', syncTitle);
    syncTitle();

    const movieImageInput = document.getElementById('movie_image');
    const posterPreview = document.getElementById('posterPreview');
    const noImagePlaceholder = document.getElementById('noImagePlaceholder');
    const fileNameInput = document.getElementById('file_name');

    const bindPreview = function(inputEl, previewId, placeholderId, fileNameId) {
        inputEl.addEventListener('change', function (e) {
            const file = e.target.files && e.target.files[0];
            if (!file) {
                // no file selected: restore placeholder
                const p = document.getElementById(previewId);
                const ph = document.getElementById(placeholderId);
                const fn = document.getElementById(fileNameId);
                if (p) p.hidden = true;
                if (ph) ph.hidden = false;
                if (fn) fn.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (ev) {
                const url = ev.target.result;
                const img = document.getElementById(previewId);
                const ph = document.getElementById(placeholderId);
                const fn = document.getElementById(fileNameId);
                if (img) {
                    img.src = url;
                    img.hidden = false;
                }
                if (ph) ph.hidden = true;
                if (fn) fn.value = file.name;
            };
            reader.readAsDataURL(file);
        });
    };

    if (movieImageInput) {
        bindPreview(movieImageInput, 'posterPreview', 'noImagePlaceholder', 'file_name');
    }

    const movieImageEditInput = document.getElementById('movie_image_edit');
    if (movieImageEditInput) {
        // edit modal uses same preview id by default; bind similarly
        bindPreview(movieImageEditInput, 'posterPreview', 'noImagePlaceholder', 'file_name');
    }
});
