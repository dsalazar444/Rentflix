// Made by: Laura Andrea Castrillón Fajardo

function closeAlert() {
    const alert = document.getElementById('successAlert');
    if (!alert) return;
    
    alert.style.animation = 'slideIn 0.3s ease-out reverse';
    setTimeout(() => alert.remove(), 300);
}

document.addEventListener('DOMContentLoaded', function() {
    const alert = document.getElementById('successAlert');
    if (alert) {
        setTimeout(() => closeAlert(), 5000);
    }
});
