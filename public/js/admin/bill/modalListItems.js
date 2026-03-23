// Made by: Daniela Salazar
function showItemsModal(button) {
    const itemsJson = button.getAttribute("data-items");
    const items = JSON.parse(itemsJson);
    console.log("items recibidos:", items);
    const list = document.getElementById("itemsList");
    list.innerHTML = "";

    if (!items || items.length === 0) {
        list.innerHTML = '<p class="bill-txt-no-items">No hay items</p>';
    } else {
        items.forEach((item) => {
            const title =
                item.movie && item.movie.title
                    ? item.movie.title
                    : "Sin título";
            list.innerHTML += `<div class="bill-item-row-solo-txt"><span>${item.quantity}</span><span>${title}</span></div>`;
        });
    }

    const modalElement = document.getElementById("itemsModal");
    let modal = bootstrap.Modal.getInstance(modalElement);
    if (!modal) {
        modal = new bootstrap.Modal(modalElement);
    }
    modal.show();
}

function closeItemsModal() {
    const modal = bootstrap.Modal.getInstance(
        document.getElementById("itemsModal"),
    );
    if (modal) {
        modal.hide();
    }
}
