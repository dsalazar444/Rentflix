/** Made by: Samuel Martínez Arteaga */

/** Profile dropdown for logout action */
document.addEventListener("DOMContentLoaded", function () {
    var wrappers = document.querySelectorAll(".profile-menu-wrapper");

    wrappers.forEach(function (wrapper) {
        var toggleButton = wrapper.querySelector(".profile-menu-toggle");
        var menu = wrapper.querySelector(".profile-menu");

        if (!toggleButton || !menu) {
            return;
        }

        toggleButton.addEventListener("click", function (event) {
            event.stopPropagation();

            var isOpen = menu.classList.contains("is-open");

            document
                .querySelectorAll(".profile-menu.is-open")
                .forEach(function (openMenu) {
                    openMenu.classList.remove("is-open");
                    openMenu.setAttribute("aria-hidden", "true");

                    var openWrapper = openMenu.closest(".profile-menu-wrapper");
                    if (!openWrapper) {
                        return;
                    }

                    var openButton = openWrapper.querySelector(
                        ".profile-menu-toggle",
                    );
                    if (openButton) {
                        openButton.setAttribute("aria-expanded", "false");
                    }
                });

            if (!isOpen) {
                menu.classList.add("is-open");
                menu.setAttribute("aria-hidden", "false");
                toggleButton.setAttribute("aria-expanded", "true");
            } else {
                menu.classList.remove("is-open");
                menu.setAttribute("aria-hidden", "true");
                toggleButton.setAttribute("aria-expanded", "false");
            }
        });
    });

    document.addEventListener("click", function () {
        document
            .querySelectorAll(".profile-menu.is-open")
            .forEach(function (menu) {
                menu.classList.remove("is-open");
                menu.setAttribute("aria-hidden", "true");

                var wrapper = menu.closest(".profile-menu-wrapper");
                if (!wrapper) {
                    return;
                }

                var toggleButton = wrapper.querySelector(
                    ".profile-menu-toggle",
                );
                if (toggleButton) {
                    toggleButton.setAttribute("aria-expanded", "false");
                }
            });
    });

    document.addEventListener("keydown", function (event) {
        if (event.key !== "Escape") {
            return;
        }

        document
            .querySelectorAll(".profile-menu.is-open")
            .forEach(function (menu) {
                menu.classList.remove("is-open");
                menu.setAttribute("aria-hidden", "true");

                var wrapper = menu.closest(".profile-menu-wrapper");
                if (!wrapper) {
                    return;
                }

                var toggleButton = wrapper.querySelector(
                    ".profile-menu-toggle",
                );
                if (toggleButton) {
                    toggleButton.setAttribute("aria-expanded", "false");
                }
            });
    });
});
