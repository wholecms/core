<div class="page-footer">
    <div class="page-footer-inner">
        {{ date("Y") }} &copy; Whole CMS
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>


<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{!! Html::script('assets/backend/global/plugins/respond.min.js') !!}
{!! Html::script('assets/backend/global/plugins/excanvas.min.js') !!}
<![endif]-->
{!! Html::script('assets/backend/global/plugins/jquery.min.js') !!}
{!! Html::script('assets/backend/global/plugins/jquery-migrate.min.js') !!}
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{!! Html::script('assets/backend/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/backend/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/backend/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') !!}
{!! Html::script('assets/backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!! Html::script('assets/backend/global/plugins/jquery.blockui.min.js') !!}
{!! Html::script('assets/backend/global/plugins/jquery.cokie.min.js') !!}
{!! Html::script('assets/backend/global/plugins/uniform/jquery.uniform.min.js') !!}
{!! Html::script('assets/backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
<!-- END CORE PLUGINS -->
@yield('include_js')
{!! Html::script('assets/backend/global/scripts/metronic.js') !!}
{!! Html::script('assets/backend/admin/layout4/scripts/layout.js') !!}
{!! Html::script('assets/backend/admin/layout4/scripts/demo.js') !!}
{!! Html::script('assets/backend/admin/pages/scripts/table-managed.js') !!}

<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
//        UINestable.init();
        TableManaged.init({lengthMenu:[
            [15, 25, 50, -1],
            [15, 25, 50, "All"] // change per page values here
        ],pageLength:"15",search:" {{ trans('whole::tr.layouts.search_table') }}: ",order:[0,'desc']});

        $("a[data-method='delete']").click(function(){
            var d = confirm("{{ trans('whole::tr.layouts.want_to_delete') }}");
            if (d == false) {
                return false;
            }
            method($(this).attr("href"), {_method: 'DELETE',_token: $('meta[name="csrf-token"]').attr('content') });
            return false;
        });

    });

    function method(path, params, method) {
        method = method || "post"; // Set method to post by default if not specified.

        // The rest of this code assumes you are not using a library.
        // It can be made less wordy if you use one.
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for(var key in params) {
            if(params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }
</script>
@yield('footer')
{!! Html::script('assets/backend/js/custom.js') !!}
<!-- END JAVASCRIPTS -->
