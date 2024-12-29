<script src="{{ asset('admin_asset/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_asset/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin_asset/plugins/mapplic/js/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('admin_asset/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('admin_asset/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="
https://cdn.jsdelivr.net/npm/chart.js@4.4.6/dist/chart.umd.min.js
"></script>
@yield('custom_script')
<script src="{{ asset('admin_asset/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('admin_asset/js/form_layouts.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('admin_asset/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('admin_asset/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}"
    type="text/javascript"></script>
<script type="text/javascript"
    src="{{ asset('admin_asset/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
<script src="{{ asset('admin_asset/pages/js/pages.js') }}"></script>
<script src="{{ asset('admin_asset/js/scripts.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin_asset/js/modal.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.menu-button-sidebar').click(function() {
            $('body').toggleClass('menu-pin');
        });
    });
</script>
