document.addEventListener('DOMContentLoaded', function () {
    var moreBtnPizza = document.getElementById("moreBtnR");
    var moreBtnBoisson = document.getElementById("moreBtnBoisson");
    var moreBtnAccomp = document.getElementById("moreBtnAccomp");
    var popup = document.getElementById("IDpopup");
    var recette = document.querySelector('.popup-recette');
    var produit = document.querySelector('.popup-produit');
    var spanRecette = document.querySelector(".popup-recette .close");
    var spanProduit = document.querySelector(".popup-produit .close");

    
    spanRecette.onclick = function () {
        popup.style.display = "none";
    }
    
    spanProduit.onclick = function () {
        popup.style.display = "none";
    }


    moreBtnPizza.onclick = function () {
        popup.style.display = "block";
        recette.style.display = "block";
        produit.style.display = "none";
    }

    moreBtnBoisson.onclick = function () {
        popup.style.display = "block";
        recette.style.display = "none";
        produit.style.display = "block";
    }
    
    moreBtnAccomp.onclick = function () {
        popup.style.display = "block";
        recette.style.display = "none";
        produit.style.display = "block";
    }

    window.onclick = function (event) {
        if (event.target == popup) {
            popup.style.display = "none";
        }
    }
});