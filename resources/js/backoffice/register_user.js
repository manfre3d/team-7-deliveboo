

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
const checkboxList = document.querySelectorAll('#checkbox_container .checkbox');
checkboxList.forEach( elm => {
  elm.addEventListener('click', (e) => {
    if ( countSelectedCheckbox() > 2 ) {
      e.preventDefault();
    }
  })
});  
