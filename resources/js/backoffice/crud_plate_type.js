

// select toggle per aggiungere categorie di piatti
const createButton = document.getElementById("btn_create");
const typeSelect = document.getElementById("plate_type_select");
const newTypeSelect = document.getElementById("new_plate_type_select");

if ( createButton != null ) {
  createButton.addEventListener("click", function() {
      if(newTypeSelect.hasAttribute("disabled")){

          newTypeSelect.removeAttribute("disabled");
          typeSelect.setAttribute("disabled", "");
          typeSelect.value="";
      }else{

          typeSelect.removeAttribute("disabled");
          newTypeSelect.setAttribute("disabled", "");
          newTypeSelect.value="";
      }
  });
}