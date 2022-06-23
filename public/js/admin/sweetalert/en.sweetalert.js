$(document).on('click', '.delete-item-form button', function(e){

    e.preventDefault();
    var form = $(this).parent('form');

    Swal.fire({
        title: 'Remove item',
        text: "Once deleted, you can't get it back anymore.",
        icon: 'warning',
        confirmButtonColor: '#fc3869',
        confirmButtonText: 'Yes, remove item',
        showCancelButton: true,
        cancelButtonText: 'Cancel',
    })
    .then((result) => {
        if (result.value)
            form.submit();
    })
});
