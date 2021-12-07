/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const createButton = document.getElementById("btn_create");
const typeSelect = document.getElementById("plate_type_select");
const newTypeSelect = document.getElementById("new_plate_type_select");





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





    






	
