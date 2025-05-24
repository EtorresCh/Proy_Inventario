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
    $('#rol_id').select2({
        dropdownParent: $('#modalusuario')
    });
    combo_rol();
    $('#usuario_data').DataTable({
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
            url: "../../controller/usuario.php?op=listar",
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
function editar(usu_id) {
    $.post("../../controller/usuario.php?op=mostrar_editar",{ usu_id: usu_id},function(data) {
        data=JSON.parse(data);
        $('#usu_id').val(data.usu_id);
        $('#usu_nom').val(data.usu_nom);
        $('#usu_apep').val(data.usu_apep);
        $('#usu_apem').val(data.usu_apem);
        $('#usu_corr').val(data.usu_corr);   
        $('#usu_pass').val(data.usu_pass); 
        $('#usu_sex').val(data.usu_sex).trigger('change');   
        $('#telefono').val(data.telefono);
        $('#rol_id').val(data.rol_id).trigger('change');  
        $('#usu_dni').val(data.usu_dni); 
        $('#modalusuario').modal('hide');
    });
    $('#modalusuario').modal('show');
    $('#lbltitulo').html('Registro de  Usuario');
}


function eliminar(usu_id)  {
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
              url: '../../controller/usuario.php?op=eliminar',
                type: 'POST',
                data: { usu_id: usu_id },
                success: function (response) {
                    $('#usuario_data').DataTable().ajax.reload();
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
