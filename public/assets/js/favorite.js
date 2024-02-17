const favoriteBtn = document.querySelector("#favorite-btn");
const closeFavorite = document.querySelector("#close-btn")
const favoriteSection = document.querySelector("#favorite-section");
favoriteBtn.addEventListener("click", function () {
    favoriteSection.classList.toggle("hidden");
})
closeFavorite.addEventListener("click", function () {
    favoriteSection.classList.toggle("hidden");
})
