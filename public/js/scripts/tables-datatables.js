// Tables-DataTables.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
$(document).ready(function() {


    // DATA TABLES
    // =================================================================
    // Require Data Tables
    // -----------------------------------------------------------------
    // http://www.datatables.net/
    // =================================================================

    $.fn.DataTable.ext.pager.numbers_length = 5;


    // Basic Data Tables with responsive plugin
    // -----------------------------------------------------------------
    $('#demo-dt-basic').dataTable({
        "responsive": true,
        "language": {
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        }
    });




    // Row selection (single row)
    // -----------------------------------------------------------------
    var rowSelection = $('#demo-dt-selection').DataTable({
        "responsive": true,
        "language": {
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        }
    });

    $('#demo-dt-selection').on('click', 'tr', function() {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            rowSelection.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });




    // Row selection and deletion (multiple rows)
    // -----------------------------------------------------------------
    var rowDeletion = $('#demo-dt-delete').DataTable({
        "responsive": true,
        "language": {
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        },
        "dom": '<"toolbar">frtip'
    });
    $('#demo-custom-toolbar').appendTo($("div.toolbar"));

    $('#demo-dt-delete tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected');
    });

    $('#demo-dt-delete-btn').click(function() {
        rowDeletion.row('.selected').remove().draw(false);
    });




    // My Table Asc
    // -----------------------------------------------------------------
    var t = $('#asc-data-table').DataTable({
        "responsive": true,
		"pageLength": 15,
        "order": [[0,'asc']],		
        "language": {
		    "emptyTable": "No existen datos para mostrar",
			"info": "Mostrando del _START_ al _END_ de _TOTAL_ filas",
			"infoEmpty": "Mostrando del 0 al 0 de 0 filas",
			"infoFiltered": "(filtrado de un total de _MAX_ filas)",
			"search": "Buscar:",
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        },

        "dom": '<"newtoolbar">frtip'
    });
    $('#custom-toolbar').appendTo($("div.newtoolbar"));

    // My Table Asc Large
    // -----------------------------------------------------------------
    var t = $('#asc-data-table-lg').DataTable({
        "responsive": true,
        "pageLength": 30,
        "order": [[0,'asc']],       
        "language": {
            "emptyTable": "No existen datos para mostrar",
            "info": "Mostrando del _START_ al _END_ de _TOTAL_ filas",
            "infoEmpty": "Mostrando del 0 al 0 de 0 filas",
            "infoFiltered": "(filtrado de un total de _MAX_ filas)",
            "search": "Buscar:",
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        },

        "dom": '<"newtoolbar">frtip'
    });
    $('#custom-toolbar').appendTo($("div.newtoolbar"));
	
	// My Table Desc
    // -----------------------------------------------------------------
    var t = $('#desc-data-table').DataTable({
        "responsive": true,
		"pageLength": 15,
        "order": [[0,'desc']],		
        "language": {
		    "emptyTable": "No existen datos para mostrar",
			"info": "Mostrando del _START_ al _END_ de _TOTAL_ filas",
			"infoEmpty": "Mostrando del 0 al 0 de 0 filas",
			"infoFiltered": "(filtrado de un total de _MAX_ filas)",
			"search": "Buscar:",
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        },

        "dom": '<"newtoolbar">frtip'
    });
    $('#custom-toolbar').appendTo($("div.newtoolbar"));

    // My Table Desc Large
    // -----------------------------------------------------------------
    var t = $('#desc-data-table-lg').DataTable({
        "responsive": true,
        "pageLength": 30,
        "order": [[0,'desc']],      
        "language": {
            "emptyTable": "No existen datos para mostrar",
            "info": "Mostrando del _START_ al _END_ de _TOTAL_ filas",
            "infoEmpty": "Mostrando del 0 al 0 de 0 filas",
            "infoFiltered": "(filtrado de un total de _MAX_ filas)",
            "search": "Buscar:",
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        },

        "dom": '<"newtoolbar">frtip'
    });
    $('#custom-toolbar').appendTo($("div.newtoolbar"));

    // My Store Table Desc
    // -----------------------------------------------------------------
    var t = $('#store-data-table').DataTable({
        "responsive": true,
        "pageLength": 30,
        "order": [[2,'desc'],[0,'asc']],      
        "language": {
            "emptyTable": "No existen datos para mostrar",
            "info": "Mostrando del _START_ al _END_ de _TOTAL_ filas",
            "infoEmpty": "Mostrando del 0 al 0 de 0 filas",
            "infoFiltered": "(filtrado de un total de _MAX_ filas)",
            "search": "Buscar:",
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        },

        "dom": '<"newtoolbar">frtip'
    });
    $('#custom-toolbar').appendTo($("div.newtoolbar"));

    // My Store Table Desc
    // -----------------------------------------------------------------
    var t = $('#data-table-three').DataTable({
        "responsive": true,
        "pageLength": 30,
        "order": [[2,'desc']],       
        "language": {
            "emptyTable": "No existen datos para mostrar",
            "info": "Mostrando del _START_ al _END_ de _TOTAL_ filas",
            "infoEmpty": "Mostrando del 0 al 0 de 0 filas",
            "infoFiltered": "(filtrado de un total de _MAX_ filas)",
            "search": "Buscar:",
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        },

        "dom": '<"newtoolbar">frtip'
    });
    $('#custom-toolbar').appendTo($("div.newtoolbar"));


    // My Store Table Desc
    // -----------------------------------------------------------------
    var t = $('#order-data-table').DataTable({
        "responsive": true,
        "pageLength": 30,
        "order": [[0,'desc'], [1,'desc']],       
        "language": {
            "emptyTable": "No existen datos para mostrar",
            "info": "Mostrando del _START_ al _END_ de _TOTAL_ filas",
            "infoEmpty": "Mostrando del 0 al 0 de 0 filas",
            "infoFiltered": "(filtrado de un total de _MAX_ filas)",
            "search": "Buscar:",
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        },

        "dom": '<"newtoolbar">frtip'
    });
    $('#custom-toolbar').appendTo($("div.newtoolbar"));


    // My VIP Table Desc
    // -----------------------------------------------------------------
    var t = $('#vip-data-table').DataTable({
        "responsive": true,
        "pageLength": 30,
        "order": [[2,'desc']],       
        "language": {
            "emptyTable": "No existen datos para mostrar",
            "info": "Mostrando del _START_ al _END_ de _TOTAL_ filas",
            "infoEmpty": "Mostrando del 0 al 0 de 0 filas",
            "infoFiltered": "(filtrado de un total de _MAX_ filas)",
            "search": "Buscar:",
            "paginate": {
                "previous": '<i class="fa fa-angle-left"></i>',
                "next": '<i class="fa fa-angle-right"></i>'
            }
        },

        "dom": '<"newtoolbar">frtip'
    });
    $('#custom-toolbar').appendTo($("div.newtoolbar"));

});