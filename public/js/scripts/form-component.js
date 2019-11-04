// Form-Component.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
$(document).ready(function() {


    // PANEL WITH BUTTONS - LOADING OVERLAY
    // =================================================================
    // Require Nifty Admin Javascript
    // http://www.themeon.net/
    // =================================================================
    $('.demo-panel-ref-btn').jasmineOverlay().on('click', function() {
        var $el = $(this),
            relTime;
        $el.jasmineOverlay('show');

        // Do something...



        relTime = setInterval(function() {
            // Hide the screen overlay
            $el.jasmineOverlay('hide');

            clearInterval(relTime);
        }, 2000);
    });


    // FULLSCREEN PANEL
    // =================================================================
    // Require Nifty Admin Javascript
    // http://www.themeon.net/
    // =================================================================

    $("[data-click=panel-expand]").click(function(e) {
        e.preventDefault();
        var t = $(this).closest(".panel");
        if ($("body").hasClass("panel-expand") && $(t).hasClass("panel-expand")) {
            $("body, .panel").removeClass("panel-expand");
            $(".panel").removeAttr("style")
        } else {
            $("body").addClass("panel-expand");
            $(this).closest(".panel").addClass("panel-expand")
        }
        $(window).trigger("resize")
    });


    // COLLAPSE PANEL
    // =================================================================
    // Require Nifty Admin Javascript
    // http://www.themeon.net/
    // =================================================================

    $("[data-click=panel-collapse]").click(function(e) {
        e.preventDefault();
        $(this).closest(".panel").find(".panel-body").slideToggle()
    });


    // RELOAD PANEL
    // =================================================================
    // Require Nifty Admin Javascript
    // http://www.themeon.net/
    // =================================================================


    $("[data-click=panel-reload]").click(function(e) {
        e.preventDefault();
        var t = $(this).closest(".panel");
        if (!$(t).hasClass("panel-loading")) {
            var n = $(t).find(".panel-body");
            var r = '<div class="panel-loader"><span class="spinner-small"></span></div>';
            $(t).addClass("panel-loading");
            $(n).prepend(r);
            setTimeout(function() {
                $(t).removeClass("panel-loading");
                $(t).find(".panel-loader").remove()
            }, 2000)
        }
    });


    // JQUERY TAG IT - COMPONENT
    // =================================================================
    // Require Jquery Tag It 
    // https://github.com/aehlke/tag-it
    // =================================================================

    $("#jquery-tagIt-default").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-inverse").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-white").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-primary").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-info").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-success").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-warning").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-danger").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    })



    // CHOSEN
    // =================================================================
    // Require Chosen
    // http://harvesthq.github.io/chosen/
    // =================================================================
    $('.chosen-select').chosen({
        width: '100%'
    });
    $('.demo-cs-multiselect').chosen({
        width: '100%'
    });



    // ION.RANGESLIDER
    // =================================================================
    // Require Ion.RangeSlider
    // https://github.com/IonDen/ion.rangeSlider
    // =================================================================


    $("#default_rangeSlider").ionRangeSlider({
        min: 0,
        max: 5e3,
        type: "double",
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        grid: true
    });
    $("#customRange_rangeSlider").ionRangeSlider({
        min: 1e3,
        max: 1e5,
        from: 3e4,
        to: 9e4,
        type: "double",
        step: 500,
        postfix: " €",
        grid: true
    });
    $("#customValue_rangeSlider").ionRangeSlider({
        values: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        type: "single",
        grid: true
    })




    // BOOTSTRAP TIMEPICKER
    // =================================================================
    // Require Bootstrap Timepicker
    // http://jdewit.github.io/bootstrap-timepicker/
    // =================================================================
    $('#demo-tp-com').timepicker();



    // BOOTSTRAP TIMEPICKER - COMPONENT
    // =================================================================
    // Require Bootstrap Timepicker
    // http://jdewit.github.io/bootstrap-timepicker/
    // =================================================================
    $('#demo-tp-textinput').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
    });


    // BOOTSTRAP DATEPICKER
    // =================================================================
    // Require Bootstrap Datepicker
    // http://eternicode.github.io/bootstrap-datepicker/
    // =================================================================
    $('#demo-dp-txtinput input').datepicker();


    // BOOTSTRAP DATEPICKER WITH AUTO CLOSE
    // =================================================================
    // Require Bootstrap Datepicker
    // http://eternicode.github.io/bootstrap-datepicker/
    // =================================================================
    $('#calendar-datepicker .input-group.date').datepicker({
        autoclose: true
    });


    // BOOTSTRAP DATEPICKER WITH RANGE SELECTION
    // =================================================================
    // Require Bootstrap Datepicker
    // http://eternicode.github.io/bootstrap-datepicker/
    // =================================================================
    $('#calendar-range .input-daterange').datepicker({
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });


    // BOOTSTRAP DATEPICKER WITH RANGE SELECTION
    // =================================================================
    // Require Bootstrap Datepicker
    // http://eternicode.github.io/bootstrap-datepicker/
    // =================================================================

    $('#calendar-month').datepicker( {
		closeText: 'Cerrar',
		prevText: '<Ant',
		nextText: 'Sig>',
		currentText: 'Hoy',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'MM yy',
                onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
            });


    // INLINE BOOTSTRAP DATEPICKER
    // =================================================================
    // Require Bootstrap Datepicker
    // http://eternicode.github.io/bootstrap-datepicker/
    // =================================================================
    $('#demo-dp-inline div').datepicker({
        format: "MM dd, yyyy",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });



    // DROPZONE.JS
    // =================================================================
    // Require Dropzone
    // http://www.dropzonejs.com/
    // =================================================================
    Dropzone.options.demoDropzone = { // The camelized version of the ID of the form element
        // The configuration we've talked about above
        autoProcessQueue: false,
        //uploadMultiple: true,
        //parallelUploads: 25,
        //maxFiles: 25,

        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;
            //  Here's the change from enyo's tutorial...
            //  $("#submit-all").click(function (e) {
            //  e.preventDefault();
            //  e.stopPropagation();
            //  myDropzone.processQueue();
            //
            //}
            //    );

        }

    }



    // SUMMERNOTE
    // =================================================================
    // Require Summernote
    // http://hackerwins.github.io/summernote/
    // =================================================================
    $('#demo-summernote').summernote({
        height: 250
    });




    // MASKED INPUT
    // =================================================================
    // Require Masked Input
    // http://digitalbush.com/projects/masked-input-plugin/
    // =================================================================


    // Initialize Masked Inputs
    // a - Represents an alpha character (A-Z,a-z)
    // 9 - Represents a numeric character (0-9)
    // * - Represents an alphanumeric character (A-Z,a-z,0-9)
    $('#demo-msk-date').mask('99/99/9999');
    $('#demo-msk-date2').mask('99-99-9999');
    $('#demo-msk-phone').mask('(999) 999-9999');
    $('#demo-msk-taxid').mask('99-9999999');
    $('#demo-msk-ssn').mask('999-99-9999');
    $('#demo-msk-pkey').mask('aaaa*-aaaa*-aaaa*-aaaa*-aaaa*');
    $('#demo-msk-currency').mask('$ 999,999,999.99');
    $('#demo-msk-ipv6').mask('9999:9999:9999:9:999:9999:9999:9999');
    $('#demo-msk-ipv4').mask('999.999.999.999');
    $('#demo-msk-isbn2').mask('999/99/999/9999/9');
    $('#demo-msk-isbn1').mask('999-99-999-9999-9');



});