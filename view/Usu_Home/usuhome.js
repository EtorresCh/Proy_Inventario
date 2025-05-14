var usu_id = $('#usu_idx').val();
$(document).ready(function(){
    $.post("../../controller/equipo.php?op=activo", function(data){
        data = JSON.parse(data);
        $('#lblactivo').html(data.activo);
    });
    $.post("../../controller/equipo.php?op=mantenimiento", function(data){
        data = JSON.parse(data);
        $('#lblmantenimiento').html(data.mantenimiento);
    });
    $.post("../../controller/equipo.php?op=ultimo", function(data){
        data = JSON.parse(data); 
        if (data) {
            $('#lblultimo').html(data.equi_denom);
        } else {
            $('#lblultimo').html("No se encontró el último equipo.");
        }
    });
    $.post("../../controller/equipo.php?op=total", function(data){
        data = JSON.parse(data);
        $('#lbltotal').html(data.total);
    });
    $('#equipo_data').DataTable({
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
            url: "../../controller/equipo.php?op=lista_home",
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
    $.post("../../controller/equipo.php?op=por_categoria", function(data){
        data = JSON.parse(data);
        let categorias = [];
        let cantidades = [];
        data.forEach(function(item) {
            categorias.push(item.categoria);  
            cantidades.push(item.cantidad);   
        });
        Highcharts.chart('grafico_categoria', {
            chart: {
                type: 'pie', 
                options3d: {
                    enabled: true,
                    alpha: 45, 
                    beta: 0 
                },
                marginTop: 0,  
                marginBottom: 0
            },
            title: {
                text: null 
            },
            subtitle: {
                text: null 
            },
            legend: {
                enabled: true, 
                align: 'center', 
                verticalAlign: 'bottom',
                layout: 'horizontal',  
                itemStyle: {
                    fontSize: '14px',
                    fontWeight: 'normal'
                }
            },
            plotOptions: {
                pie: {
                    innerSize: '50%',
                    depth:20, 
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y} productos'
                    }
                }
            },
            series: [{
                name: 'Cantidad de productos',
                data: categorias.map((categoria, index) => [categoria, cantidades[index]])
            }],
            colors: [
                '#2b8a3e', 
                '#0b7285', 
                '#82c91e', 
                '#15aabf', 
                '#dee2e6', 
                '#1c7ed6',
                '#495057' 
            ]
        });
    });
    $.post("../../controller/equipo.php?op=por_area", function(data) {
        data = JSON.parse(data);
        let categorias = [];
        let cantidades = [];
        data.forEach(function(item) {
            categorias.push(item.area);                      
            cantidades.push(parseInt(item.cantidad));     
        });
        Highcharts.chart('grafico_area', {
            chart: {
                type: 'line',        
                zoomType: 'x',        
                marginTop: 40,
                marginBottom: 40
            },
            title: {
                text: null 
            },
            subtitle: {
                text:  null 
            },
            xAxis: {
                categories: categorias,
                title: {
                    text: 'Áreas'
                }
            },
            yAxis: {
                title: {
                    text: 'Cantidad de Equipos Activos'
                },
                allowDecimals: false,
                min: 0
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: '{point.y} equipos'
            },
            series: [{
                name: 'Equipos',
                data: cantidades,
                color: '#1c7ed6',
                marker: {
                    radius: 5,
                    symbol: 'circle'
                }
            }]
        });
    });
});  
