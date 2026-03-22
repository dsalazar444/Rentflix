/** Made by: Samuel Martínez Arteaga */

/**
 * Authentication Panel Switcher
 * Handles toggling between login and register panels
 */

document.addEventListener('DOMContentLoaded', function () {
    const switchButtons = document.querySelectorAll('.auth-switch-btn');
    const panels = document.querySelectorAll('.auth-panel');

    switchButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const targetPanelId = button.getAttribute('data-panel');

            switchButtons.forEach(function (btn) {
                btn.classList.remove('is-active');
            });

            panels.forEach(function (panel) {
                panel.classList.remove('is-active');
                panel.setAttribute('aria-hidden', 'true');
            });

            button.classList.add('is-active');

            const targetPanel = document.getElementById(targetPanelId);
            if (targetPanel) {
                targetPanel.classList.add('is-active');
                targetPanel.setAttribute('aria-hidden', 'false');
            }
        });
    });
});
