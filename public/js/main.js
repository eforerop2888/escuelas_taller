$('.form-eliminar').on('click', function(e){
	e.preventDefault();
	var form = $(this);
	swal({
	  title: '¿Estas seguro?',
	  text: 'El elemento será eliminado',
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonText: "Si eliminar",
	  cancelButtonText: 'No, Cancelar!',
	}).then(function () {
	  form.submit();
	})
});	