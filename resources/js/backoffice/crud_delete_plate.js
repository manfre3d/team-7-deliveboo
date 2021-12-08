// Modale per la cancellazione di un piatto 

// button per aprire la modale del delete
const deleteButtons = document.querySelectorAll(".btn-delete");

// input nascosto a cui passare il valore del piatto, per id
const inputDeleteID = document.getElementById("delete-id");

if ( deleteButtons != null ) {

deleteButtons.forEach(
	(element) => {
		element.addEventListener("click", function() {
			inputDeleteID.value = this.getAttribute("data-id")
		});
	}
);
}