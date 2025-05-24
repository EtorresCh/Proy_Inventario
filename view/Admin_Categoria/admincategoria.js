var usu_id = $('#usu_idx').val();
function init(){
    $("#categoria_form").on("submit",function(e){
        guardaryeditar(e);
    });
}
function guardaryeditarobjeto(e) {
    e.preventDefault();
     var formData = new FormData($("#categoria_form")[0]);  
    $.ajax({
        url: "../../controller/categoria.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            var response = JSON.parse(data);
            if (response.success) {
                $('#categoria_data').DataTable().ajax.reload();
                $('#modalcategoria').modal('hide');

                Swal.fire({
                    title: 'Correcto!',
                    text: 'Se registró correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: response.message, 
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            Swal.fire({
                title: 'Error!',
                text: 'Hubo un error al procesar la solicitud.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });
}


$(document).ready(function(){
    var table = $('#categoria_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
        ],
        "ajax":{
            url: "../../controller/categoria.php?op=listar",
            type :"post"
        },
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": parseInt($('#cantidad_registros').val()),
	    "order": [[0, "desc"]],
	    "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando  registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de  un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
		},
	});
    $('#cantidad_registros').on('input change', function () {
        let val = parseInt($(this).val());
        if (isNaN(val) || val < 1) {
            val = 1;
        } else if (val > 25) {
            val = 25;
        }
        $(this).val(val);
        table.page.len(val).draw();
    });
    
    $('#buscar_registros').on('input', function () {
        table.search(this.value).draw();
    });  
     /*Eliminar todo los registros con checkbox*/
    $('#cat_id_all').on('change', function () {
        let isChecked = $(this).is(':checked');
        $('.categoria-checkbox').prop('checked', isChecked);
    });
    

}); 
/* Contador de check*/ 
function actualizarContadorSeleccionados() {
    let total = $('.categoria-checkbox:checked').length;
    if ($('#cat_id_all').is(':checked')) {
        total = total - 1;
    }
    if (total < 0) total = 0;
    $('#contador_valor').text(total);
    let textoAntes = '';
    let textoDespues = '';

    if (total === 0) {
        textoAntes = 'Se encontraron ';
        textoDespues = 'elementos';
    } else if (total === 1) {
        textoAntes = 'Se encontró ';
        textoDespues = 'elemento';
    } else {
        textoAntes = 'Se encontraron ';
        textoDespues = 'elementos';
    }
    $('#contador_seleccionados').contents().filter(function() {
        return this.nodeType === 3;
    }).each(function(i, el) {
        if (i === 0) el.nodeValue = textoAntes;
        if (i === 1) el.nodeValue = textoDespues;
    });
}

$(document).on('change', '.categoria-checkbox', function () {
    actualizarContadorSeleccionados();
});
$('#cat_id_all').on('change', function () {
    $('.categoria-checkbox').prop('checked', this.checked);
    actualizarContadorSeleccionados();
}); 


function editar(cat_id) {
    $.post("../../controller/categoria.php?op=mostrar",{ cat_id: cat_id},function(data) {
        data=JSON.parse(data);
        $('#cat_id').val(data.cat_id);
        $('#cat_nom').val(data.cat_nom);
        $('#modalcategoria').modal('hide');
    });
    $('#modalcategoria').modal('show');
}

function eliminar(cat_id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡Esta acción no se puede deshacer!",
        imageUrl: '../../static/gif/advertencia.gif',
        imageWidth: 100,
        imageHeight: 100,
        showCancelButton: true,
        confirmButtonColor: 'rgb(243, 18, 18)', 
        cancelButtonColor: '#000', 
        confirmButtonText: 'Sí, eliminarlo',
        backdrop: true,
        didOpen: () => {
        const swalBox = Swal.getPopup();
        const topBar = document.createElement('div');
        topBar.id = 'top-progress-bar';
        topBar.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                height: 5px;
                width: 0%;
                background-color:rgb(243, 18, 18);
                transition: width 0.4s ease;
            `;
            swalBox.appendChild(topBar);

            setTimeout(() => {
                topBar.style.width = '40%';
            }, 300);
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
              url: '../../controller/categoria.php?op=eliminar',
                type: 'POST',
               data: { cat_id: cat_id },
                success: function (response) {
                    $('#categoria_data').DataTable().ajax.reload();
                    Swal.fire({
                        title: '¡Eliminado!',
                        html: `
                            <p>La categoria ha sido eliminado correctamente.</p>
                            <div id="top-progress-bar-final" style="
                                position: absolute;
                                top: 0;
                                left: 0;
                                height: 5px;
                                width: 0%;
                                background-color:rgb(243, 18, 18);
                                transition: width 0.6s ease;
                            "></div>
                        `,
                        imageUrl: '../../static/gif/verified.gif',
                        imageWidth: 100,
                        imageHeight: 100,
                        showConfirmButton: true,
                        confirmButtonColor: 'rgb(243, 18, 18)',
                        backdrop: true,
                        didOpen: () => {
                            const bar = document.getElementById('top-progress-bar-final');
                            setTimeout(() => {
                                bar.style.width = '100%';
                            }, 100);
                        }
                    });
                },
                error: function () {
                    Swal.fire('Error', 'No se pudo eliminar el usuario.', 'error');
                }
            });
        }
    });
}

$('#eliminar_categorias').on('click', function () {
    let seleccionados = [];
    $('.categoria-checkbox:checked').each(function () {
        seleccionados.push($(this).val());
    });
    if (seleccionados.length === 0) {
        Swal.fire({
            title: '¡Atención!',
            text: 'Debes seleccionar al menos una categoría para continuar.',
            imageUrl: '../../static/gif/tarjeta.gif',
            imageWidth: 100,
            imageHeight: 100,
            confirmButtonText: 'Entendido',
            confirmButtonColor: 'rgb(243, 18, 18)', 
        });
        return;
    }
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esto eliminará las categorías seleccionadas.',
        imageUrl: '../../static/gif/advertencia.gif',
        imageWidth: 100,
        imageHeight: 100,
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        confirmButtonColor: 'rgb(243, 18, 18)', 
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#000',
        didOpen: () => {
        const swalBox = Swal.getPopup();
        const topBar = document.createElement('div');
        topBar.id = 'top-progress-bar';
        topBar.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                height: 5px;
                width: 0%;
                background-color:rgb(243, 18, 18);
                transition: width 0.4s ease;
            `;
            swalBox.appendChild(topBar);

            setTimeout(() => {
                topBar.style.width = '40%';
            }, 300);
        } 
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../../controller/categoria.php?op=eliminar_grupo',
                type: 'POST',
                data: { ids: seleccionados },
                success: function (response) {
                    Swal.fire({
                        title: 'Eliminadas',
                        html: `
                            <p>Las categorías fueron eliminadas correctamente.</p>
                            <div id="top-progress-bar-final" style="
                                position: absolute;
                                top: 0;
                                left: 0;
                                height: 5px;
                                width: 0%;
                                background-color:rgb(243, 18, 18);
                                transition: width 0.6s ease;
                            "></div>
                        `,
                        imageUrl: '../../static/gif/verified.gif',
                        imageWidth: 100,
                        imageHeight: 100,
                        confirmButtonText: 'Entendido',
                        confirmButtonColor: 'rgb(243, 18, 18)',
                        backdrop: true,
                        didOpen: () => {
                            const bar = document.getElementById('top-progress-bar-final');
                            setTimeout(() => {
                                bar.style.width = '100%';
                            }, 100);
                        } 
                    });
                    $('#categoria_data').DataTable().ajax.reload();
                },
                error: function () {
                    Swal.fire('Error', 'No se pudieron eliminar.', 'error');
                }
            });
        }
    });
});


function nuevo(){ 
    $('#categoria_form')[0].reset();
    $('#cat_id').val(''); 
    $('#modalcategoria').modal('show');
}
init();
