@extends('admin.layout.master-layout')

@section('styles')
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                @if(Request::route()->getName() == 'admin.job-card.index')
                    @include('admin.templates.job-card.add-job-card-form')
                @else
                    @include('admin.templates.job-card.update-job-card-form')

                @endif
            </section>
        </div>
    </div>

    @include('admin.templates.job-card.job-card-list-table')

@endsection

@section('scripts')

    <script>

    function GetServicesPrice(item)
    {
        var amount = $('#checkbox_'+item).val();
        if(!$('#checkbox_'+item).prop('checked'))
        {
           total -= parseInt(amount);
        }else{
            total += parseInt(amount);
        }
        $('#total_services_price').val(total);
    }

    function UpdateGetServicesPrice(item)
    {
        var old_total_services_price = $('#total_services_price').val();

        if(item.checked)
        {
            total += parseInt(item.id);
        }else{
          total = item.id - old_total_services_price;
          return false;

        }
        $('#total_services_price').val(total);
    }

    function totalIt() {

      var input = document.getElementsByName("select_id_services");
      var id = document.getElementById("select_id_services");
      alert(id);
      var total = 0;
      for (var i = 0; i < input.length; i++) {
        if (input[i].checked) {
          total += parseFloat(input[i].value);
          alert(total);
        }
      }
      document.getElementById("total").value = "$" + total.toFixed(2);
    }

    var total = 0;

        function test(item)
        {
            if(item.checked){
               total-= parseInt(item.value);
            }else{

                total+= parseInt(item.value);
            }

            $('#total_services_price').val(total);
        }
                function update_price(item)
                {
                 var old_price = $('#total_services_price').val();
                    if(item.checked)
                    {
                       var total =  old_price  - item.value;
                       //total-= parseInt(item.value);
                    }else{
                    var total =  +parseInt(old_price)  + +parseInt(item.value);
                        //total+= parseInt(item.value);
                    }
                    $('#total_services_price').val(total);
                    $('#old_price').val(total);
                }

                function update_minis_price(item)
                                {
                                var old_price = $('#total_services_price').val();
                                 var new_price = $('#new_price').val();

                                    if(item.checked)
                                    {
                                        var total =  +parseInt(old_price) - +parseInt(item.value);
                                        var new_price = +parseInt(new_price) - +parseInt(new_price);

                                    }else{
                                         var total =  +parseInt(old_price)  + +parseInt(item.value);
                                         var grade_total = +parseInt(total) + +parseInt(new_price);
                                    }

                                    $('#total_services_price').val(total);
                                    $('#new_price').val(new_price);
                                }



        $(".delete").on('click', function() {
        	$('.case:checkbox:checked').closest("tr").html("").remove();
        	//$('.case:checkbox:checked').parents("tr").prev().remove();
        	 /*$(this).closest("td").prev().empty();*/
            $('.check_all').prop("checked", false);
        	check();
        });


        function set_services_data_temp(co_id)
        {
            //alert(co_id);
             var old_price = $('#old_price').val();
             var new_price = $('#new_price').val();

            var id = temp_services_object[co_id]["services"]["id_services"];
            var services_name = temp_services_object[co_id]["services"]["ser_title"];
            var services_price = temp_services_object[co_id]["services"]["ser_price"];
            //alert(services_name);

            total+= parseInt(services_price);
            $('#total_services_price').val(total);

            //alert("Total = "+total);

            var data="<tr><td><input type='checkbox' onClick='test(this);' class='case' value="+services_price+"></td>";
                        data +="<td><input class='form-control' id='fk_id_job_card_services' name='fk_id_job_card_services[]' type='text' value='"+id+"' /></td>" +
                         " <td><input class='form-control' type='text' name='services_name[]' value='"+services_name+"'/></td>" +
                          "</td><td><input class='form-control' name='services_price[]'  value="+services_price+" ' type='text'/></td></tr>";

                        $('.new_add').append(data);
                        i++;
                        //alert(data);

        }

        function update_set_services_data_temp(co_id)
        {
             var old_price = $('#old_price').val();
             var new_price = $('#new_price').val();

             var id = temp_services_object[co_id]["services"]["id_services"];
             var services_name = temp_services_object[co_id]["services"]["ser_title"];
             var services_price = temp_services_object[co_id]["services"]["ser_price"];

            total+= parseInt(services_price);
            var grade_total = +parseInt(total) + +parseInt(old_price);
            //$('#total_services_price').val(total);

            $('#new_price').val(total);
            $('#total_services_price').val(grade_total);
            //alert("Total = "+total);

            var data="<tr><td><input type='checkbox' onClick='update_minis_price(this);' class='case' value="+services_price+"></td>";
                        data +="<td><input class='form-control' id='fk_id_job_card_services' name='fk_id_job_card_services[]' type='text' value='"+id+"' /></td>" +
                         " <td><input class='form-control' type='text' name='services_name[]' value='"+services_name+"'/></td>" +
                          "</td><td><input class='form-control' name='services_price[]'  value="+services_price+" ' type='text'/></td></tr>";

                        $('.new_add').append(data);
                        i++;
                        //alert(data);
        }

        initDataTable_Custom('Services_list_table');
        function changeStatus(this1, id)
        {
        /*alert($(this1).val());*/
            if (confirm('STATUS cahnge?')) {
                var value;
                if ($(this1).val() == 'ACTIVE') {
                    value = 'INACTIVE';
                }
                else
                {
                    value = 'ACTIVE';
                }
                var API_URL = "{{ route('admin.products.change_status') }}";
                $.ajax({
                    url: API_URL,
                    type: 'POST',
                    data: {'status': value, 'id': id},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        console.log(JSON.stringify(data, null, 4));
                        if (data.status == 1) {
                            location.reload();
                        }
                        else {
                            console.log("error");
                        }
                    },
                    error: function (data) {
                        alert('server unavailable');
                    }
                });
            }
        }

    </script>


@endsection