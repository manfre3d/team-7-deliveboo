

// funzione per aggiungere una checkbox alla selezione tipologia ristorante
document.querySelector('#add_new_rest_type').addEventListener('click', () => {

  const checkboxContainer = document.querySelector('#checkbox_container');

  const inputNewType = document.querySelector('#new_rest_type');
  const typeName = inputNewType.value;
  if ( typeName == undefined || typeName == '' ) {
    return null;
  }

  const newId = +checkboxContainer.lastElementChild.id + 1;

  const checkboxTemplate = `
    <div id="${newId}" class="custom-control custom-checkbox">
      <input name="new_restaurant_type[]" value="${typeName}" type="checkbox" 
          class="checkbox custom-control-input" id="type-${newId}">
      <label class="custom-control-label" for="type-${newId}">
          ${typeName}
      </label>
    </div>
  `;

  checkboxContainer.insertAdjacentHTML('beforeend', checkboxTemplate);
  inputNewType.value = '';

  // aggiungo listeners per evitare che vengano selezionate più di 2 checkbox 
  preventInvalidSelection();

  // scrolla in fondo
  checkboxContainer.scrollTop = checkboxContainer.scrollHeight;
});  



// funzione che conta le checkbox selezionate
const countSelectedCheckbox = () => {
  const checkboxList = document.querySelectorAll('#checkbox_container .checkbox');

  let counter = 0;
  checkboxList.forEach( elm => {
    if ( elm.checked ) {
      counter++;
    }
  });  
  return counter;
};

// blocco la possibilità di selezionare più di 2 checkbox
const preventInvalidSelection = () => {
  const checkboxList = document.querySelectorAll('#checkbox_container .checkbox');
  checkboxList.forEach( elm => {
    elm.addEventListener('click', (e) => {
      if ( countSelectedCheckbox() > 2 ) {
        e.preventDefault();
      }
    })
  });  
};

preventInvalidSelection();
