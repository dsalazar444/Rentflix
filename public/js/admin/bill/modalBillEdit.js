// Made by: Daniela Salazar

function fillEditModal(event) {
    const bill = JSON.parse(event.relatedTarget.dataset.bill);
    const form = document.getElementById("formBillEdit");

    const itemsList = form.querySelector("#bill-items-list");
    itemsList.innerHTML = "";
    bill.items.forEach((item, idx) => {
        itemsList.innerHTML += `
            <div class="bill-item-row movie-row">
                <input type="hidden" name="items[${idx}][id]" value="${item.id}">
                <span>${item.movie.title}</span>
                <input type="number" class="bill-input-number" name="items[${idx}][quantity]" value="${item.quantity}" min="1" style="width:60px;">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeItemRow(this)">Eliminar</button>
            </div>
        `;
    });

    // Asigne action atributte to form
    form.action = window.movieUpdateRoute.replace(":id", bill.id);
}

function removeItemRow(button) {
    button.closest(".bill-item-row").remove();
}

document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("modalBillEdit")
        .addEventListener("show.bs.modal", fillEditModal);
});
