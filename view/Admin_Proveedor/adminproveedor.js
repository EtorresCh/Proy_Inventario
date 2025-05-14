var usu_id = $('#usu_idx').val();
function init(){
    $("#usuario_form").on("submit",function(e){
        e.preventDefault();
        guardaryeditar(e);
    });
}
function guardaryeditar() {
    var formData = new FormData($("#usuario_form")[0]);  
    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar", 
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            Swal.fire({
                title: "Correcto!",
                text: "El usuario se guardó correctamente!",
                icon: "success"
            }).then(() => {
                $('#usuario_data').DataTable().ajax.reload();
                $('#modalusuario').modal('hide');
            });
        },
        error: function(xhr, status, error) {
            console.error("Error AJAX:", error);
        }
    });
}

$(document).ready(function(){
    $('#proveedor_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copiar',
            },
            {
                extend: 'excelHtml5',
                text: 'Exportar Excel',
            },
            {
                extend: 'csvHtml5',
                text: 'Exportar CSV',
            }
        ],
        "ajax":{
            url: "../../controller/proveedor.php?op=listar",
            type :"post"
        },
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 15,
	    "order": [[ 0, "asc" ]],
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
});  
function editar(area_id) {
    $.post("../../controller/area.php?op=mostrar_editar",{ cat_id: cat_id},function(data) {
        data=JSON.parse(data);
        $('#cat_id').val(data.cat_id);
        $('#cat_nom').val(data.cat_nom);
        $('#modalarea').modal('hide');
    });
    $('#modalcategoria').modal('show');
    $('#lbltitulo').html('Registro de  Usuario');
}

function eliminar(usu_id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡Esta acción no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../../controller/usuario.php?op=eliminar',
                type: 'POST',
                data: { usu_id: usu_id },
                success: function(response) {
                    $('#usuario_data').DataTable().ajax.reload();
                    Swal.fire(
                        '¡Eliminado!',
                        'El usuario ha sido eliminado.',
                        'success'
                    );
                }
            });
        }
    });
}

function nuevo(){
    $('#lbltitulo').html('Nuevo Usuario');
    $('#usuario_form')[0].reset();
    combo_rol();
    $('#modalusuario').modal('show');
}
function combo_rol(){
    $.post("../../controller/rolusuario.php?op=combo", function(data){
        $('#rol_id').html(data);
    });
}
init();
