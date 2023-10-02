</div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('js/metisMenu.min.js')}}"></script>

         <!-- DataTables JavaScript -->
         <script src="{{asset('js/dataTables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/dataTables/dataTables.bootstrap.min.js')}}"></script>
      
        <!-- Custom Theme JavaScript -->
        <script src="{{asset('js/startmin.js')}}"></script>
       
        <script>
            $(document).ready(function(){
                $(".datepicker").datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    startDate: new Date()
                }).on('changeDate', function (selected) {
                    var minDate = new Date(selected.date.valueOf());
                    $('.enddatepicker').datepicker('setStartDate', minDate);
                });

                $(".enddatepicker").datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                }).on('changeDate', function (selected) {
                        var minDate = new Date(selected.date.valueOf());
                        $('.datepicker').datepicker('setEndDate', minDate);
                });
            
                
                $('#dataTables-example').DataTable({
                        responsive: true
                });
              
                $('.datepicker1').datepicker({
                    format: 'dd-mm-yyyy',
                });
            });
        </script>

    </body>
</html>
