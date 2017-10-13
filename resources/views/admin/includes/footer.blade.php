<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ URL::to('admin/asset/js/jquery.js')}}"></script>
<script class="include" type="text/javascript" src="{{ URL::to('admin/asset/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{ URL::to('admin/asset/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{ URL::to('admin/asset/js/slidebars.min.js')}}"></script>
<script src="{{ URL::to('admin/asset/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{ URL::to('admin/asset/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::to('admin/asset/js/respond.min.js')}}" ></script>
<script type="text/javascript" language="javascript"
        src="{{ URL::to('admin/asset/plugin/advanced-datatable/media/js/jquery.dataTables-latest.js')}}"></script>
<script type="text/javascript"
        src="{{ URL::to('admin/asset/plugin/data-tables/DT_bootstrap.js')}}"></script>

<script src="{{ URL::to('admin/asset/js/dynamic_table_init.js')}}"></script>
<script src="{{ URL::to('admin/asset/js/common_utility_aii.js')}}"></script>
<script src="{{ URL::to('admin/asset/js/common-scripts.js')}}"></script>
<script src="{{ URL::to('admin/asset/js/form-component.js')}}"></script>

<!--common script for all pages-->



<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, beforeSend: function() {
            //$('#loader').show();
        },
        complete: function(xhr, stat) {
            //$('#loader').show();
        }
    });

</script>