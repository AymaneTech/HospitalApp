document.addEventListener("DOMContentLoaded", function () {
    const modalspecialityButtons = document.querySelectorAll('[data-modal-target="edit-modal-speciality"]');
    const modalspeciality = document.getElementById("edit-modal-speciality");
    const specialityId = modalspeciality.querySelector('#specialityId');
    const specialityNameInput = modalspeciality.querySelector('#specialityName');
    const specialityDescriptionInput = modalspeciality.querySelector('#specialityDescription');

    modalspecialityButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const specialityValue = this.getAttribute("data-specialities-id");
            const specialityName = this.getAttribute("data-specialities-name");
            const specialityDescription = this.getAttribute("data-specialities-description");

            specialityId.value = specialityValue;
            specialityNameInput.value = specialityName;
            specialityDescriptionInput.value = specialityDescription;

        });
    });

});
