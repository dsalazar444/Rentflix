// Made by: Daniela Salazar

// Add and remove bill items in create bill modal
function addNewBillItem() {
    const select = document.getElementById("movieSelect");
    const quantityInput = document.getElementById("quantityInput");
    const movieId = select.value;
    const quantity = parseInt(quantityInput.value) || 1;
    const moviePrice = select.selectedOptions[0].dataset.price;

    if (!movieId) {
        alert("Selecciona una película");
        return;
    }

    const movieTitle = select.options[select.selectedIndex].text;
    const itemsList = document.getElementById("bill-items-list-create");

    if (itemsList.children.length === 1 && itemsList.querySelector("p")) {
        itemsList.innerHTML = "";
    }

    const itemIndex = itemsList.children.length;

    const newRow = document.createElement("div");
    newRow.className = "bill-item-row";
    newRow.innerHTML = `
        <input type="hidden" name="items[${itemIndex}][movie_id]" value="${movieId}">
        <input type="hidden" name="items[${itemIndex}][quantity]" value="${quantity}">
        <input type="hidden" name="items[${itemIndex}][price]" value="${moviePrice}">
        <span style="flex: 1;">${movieTitle} (Cantidad: ${quantity})</span>
        <button type="button" class="btn btn-danger btn-sm" onclick="removeBillItem(this)">Eliminar</button>
    `;

    itemsList.appendChild(newRow);

    select.value = "";
    quantityInput.value = "1";
}

function removeBillItem(button) {
    const itemsList = document.getElementById("bill-items-list-create");
    button.closest(".bill-item-row").remove();

    if (itemsList.children.length === 0) {
        itemsList.innerHTML =
            '<p class="bill-txt-no-items"">No hay items agregados</p>';
    }
}
