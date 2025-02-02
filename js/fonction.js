function checkDifference(inputElement,nb) {
    var initialValue = inputElement.getAttribute('data-initial-value');
    var currentValue = inputElement.value;

    var validButton = document.querySelector('.btnValid' + nb);

    if (currentValue !== initialValue) {
        console.log("La valeur a changé : " + currentValue);
        // Rendre le bouton visible
        validButton.style.display = 'block';
    } else {
        console.log("La valeur n'a pas changé : " + currentValue);
        // Rendre le bouton invisible
        validButton.style.display = 'none';
    }
}