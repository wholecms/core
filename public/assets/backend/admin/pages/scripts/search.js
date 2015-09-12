var Search = function () {

    return {
        //master_page function to initiate the module
        init: function () {
            if (jQuery().datepicker) {
                $('.date-picker').datepicker();
            }

            Metronic.initFancybox();
        }

    };

}();