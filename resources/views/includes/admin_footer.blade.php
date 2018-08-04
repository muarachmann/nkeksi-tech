<?php
/**
 * Created by PhpStorm.la
 * User: rachmann <muarachmann@gmail.com>
 * Date: 5/25/18
 * Time: 1:02 PM
 */
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Re-inventing</b> Technology in Africa
    </div>
    <strong>Copyright &copy; 2018 <a href="https://www.nkeksi.com">Nkeksi Tech</a>.</strong> All rights
    reserved.
</footer>

</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="{{ asset('admincss/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admincss/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('admincss/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('admincss/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('admincss/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('admincss/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<!-- date-range-picker -->
<script src="{{ asset('admincss/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admincss/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('admincss/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<!-- bootstrap time picker -->
<script src="{{ asset('admincss/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admincss/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admincss/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admincss/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset('admincss/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admincss/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admincss/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admincss/bower_components/Chart.js/Chart.js') }}"></script>
<!-- CK Editor -->
<script src="{{ asset('admincss/bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Parsley -->
<script src="{{ asset('js/parsley.min.js') }}"></script>
<!-- IziToast -->
<script src="{{ asset('js/iziToast/iziToast.min.js') }}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admincss/dist/js/demo.js') }}"></script>
<script src="{{ asset('admincss/dist/js/dashboard.js') }}"></script>
    <script>
        var token =  '{!! csrf_token() !!}';
        var urlGallery = '{{ route('gallery.store') }}';
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false,
            timeFormat: 'h:mm:ss p'
        });


        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })


        //Initialize CKEDITOR
        CKEDITOR.replace('editor1');
    });


                @if(session()->has('success'))
            iziToast.success({
            title: 'Success',
            message:'{{session()->get("success")}}',
            icon: 'fa fa-check',
            position: 'topRight'
            });
                 @endif


        @if(session()->has('error'))
        iziToast.error({
            title: 'Warning',
            message:'{{session()->get("error")}}',
            icon: 'fa fa-warning',
            position: 'topRight'
        });
            @endif
    </script>

</body>
</html>



