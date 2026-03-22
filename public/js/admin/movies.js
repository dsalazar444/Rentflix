document.addEventListener('DOMContentLoaded', function() {
    const tieneErrores = document.getElementById('tiene-errores');
    
    if (tieneErrores && tieneErrores.value === '1') {
        const chequearModal = setInterval(function() {
            const movieModal = document.getElementById('movieModal');
            
            if (movieModal && typeof bootstrap !== 'undefined') {
                clearInterval(chequearModal);
                var modal = new bootstrap.Modal(movieModal);
                modal.show();
            }
        }, 100);
        
        setTimeout(function() {
            clearInterval(chequearModal);
        }, 5000);
    }
});
