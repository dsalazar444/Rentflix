// Made by: Laura Andrea Castrillón Fajardo

// Manages the display of validation errors in the modals for creating and editing movies.
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
        const lastForm = lastFormSubmitted.value;
        let modalIdToOpen = 'movieModal'; // por defecto
        
        if (lastForm === 'formEdit') {
            modalIdToOpen = 'modalEdit';
        } else if (lastForm === 'movieForm') {
            modalIdToOpen = 'movieModal';
        }
        
        const checkModal = setInterval(function() {
            const targetModal = document.getElementById(modalIdToOpen);
            if (targetModal && typeof bootstrap !== 'undefined') {
                clearInterval(checkModal);
                const modal = new bootstrap.Modal(targetModal);
                modal.show();
            }
        }, 50);
        
        setTimeout(function() {
            clearInterval(checkModal);
        }, 3000);
    }
});
