document.addEventListener('DOMContentLoaded', function() {
    const hasErrors = document.getElementById('hasErrors');
    const lastFormSubmitted = document.getElementById('lastFormSubmitted');

    const cleanModalErrors = (modalId) => {
        const modal = document.getElementById(modalId);
        if (modal) {
            const inputs = modal.querySelectorAll('.is-invalid');
            inputs.forEach(input => {
                input.classList.remove('is-invalid');
            });
            const feedbacks = modal.querySelectorAll('.invalid-feedback');
            feedbacks.forEach(feedback => {
                feedback.style.display = 'none';
            });
        }
    };
    
    const movieForm = document.getElementById('movieForm');
    if (movieForm) {
        movieForm.addEventListener('submit', function() {
            lastFormSubmitted.value = 'movieForm';
        });
    }
    
    const formEdit = document.getElementById('formEdit');
    if (formEdit) {
        formEdit.addEventListener('submit', function() {
            lastFormSubmitted.value = 'formEdit';
        });
    }
    
    const movieModal = document.getElementById('movieModal');
    if (movieModal) {
        movieModal.addEventListener('show.bs.modal', function() {
            cleanModalErrors('modalEdit');
        });
    }
    
    const modalEdit = document.getElementById('modalEdit');
    if (modalEdit) {
        modalEdit.addEventListener('show.bs.modal', function() {
            cleanModalErrors('movieModal');
        });
    }
    
    if (hasErrors && hasErrors.value === '1') {
        const checkModal = setInterval(function() {
            let modalIdToOpen = 'movieModal'; 
            
            if (lastFormSubmitted.value === 'formEdit') {
                modalIdToOpen = 'modalEdit';
            } else if (lastFormSubmitted.value === 'movieForm') {
                modalIdToOpen = 'movieModal';
            }
            
            const movieModal = document.getElementById(modalIdToOpen);
            if (movieModal && typeof bootstrap !== 'undefined') {
                clearInterval(checkModal);
                var modal = new bootstrap.Modal(movieModal);
                modal.show();
            }
        }, 100);
        
        setTimeout(function() {
            clearInterval(checkModal);
        }, 5000);
    }
});
