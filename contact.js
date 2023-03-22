// Sélectionnez le formulaire et la section des avis
const form = document.querySelector('#form1');
const avisSection = document.querySelector('#avis-section');

// Ajoutez un événement de soumission de formulaire
form.addEventListener('submit', function(e) {
  e.preventDefault(); // Empêcher la soumission du formulaire

  // Sélectionnez les valeurs des champs de formulaire
  const nom = document.querySelector('#fname1').value;
  const message = document.querySelector('#subject1').value;

  // Créez un élément HTML pour afficher les avis
  const avisDiv = document.createElement('div');
  avisDiv.classList.add('avis');

  // Ajoutez les valeurs des champs de formulaire à l'élément HTML des avis
  avisDiv.innerHTML = `
    <h3>${nom}:</h3>
    <p>${message}</p>
  `;

  // Ajoutez l'élément HTML des avis à la section des avis
  avisSection.appendChild(avisDiv);

  // Réinitialisez les valeurs des champs de formulaire
  form.reset();
});





