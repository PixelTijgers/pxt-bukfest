$(document).on('click', '.delete-item-form button', function(e){

    e.preventDefault();
    var form = $(this).parent('form');

    Swal.fire({
        title: 'Item verwijderen',
        text: "Als het item eenmaal verwijderd is, kun je het niet meer terughalen.",
        icon: 'warning',
        confirmButtonColor: '#05a34a',
        confirmButtonText: 'Ja, verwijder item',
        showCancelButton: true,
        cancelButtonText: 'Annuleren',
    })
    .then((result) => {
        if (result.value)
            form.submit();
    })
});
