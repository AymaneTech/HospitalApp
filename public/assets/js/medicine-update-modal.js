document.addEventListener("DOMContentLoaded", function () {
    const modalMedicineButtons = document.querySelectorAll('[data-modal-target="edit-modal-medicine"]');
    const modalMedicine = document.getElementById("edit-modal-medicine");
    const medicineId = modalMedicine.querySelector('#medicineId');
    const medicineNameInput = modalMedicine.querySelector('#medicineName');
    const medicineDescriptionInput = modalMedicine.querySelector('#medicineDescription');
    const medicinePriceInput = modalMedicine.querySelector("#medicinePrice");
    const medicineImageInput = modalMedicine.querySelector("#medicineImage");

    modalMedicineButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const medicineValue = this.getAttribute("data-medicine-id");
            const medicineName = this.getAttribute("data-medicine-name");
            const medicineDescription = this.getAttribute("data-medicine-description");
            const medicinePrice = this.getAttribute("data-medicine-price");
            const medicineImage = this.getAttribute("data-medicine-image"); 

            medicineId.value = medicineValue;
            medicineNameInput.value = medicineName;
            medicineDescriptionInput.value = medicineDescription;
            medicinePriceInput.value = medicinePrice;
            medicineImageInput.src = medicineImage;

        });
    });
});