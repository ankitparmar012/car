@extends('admin.layout.master-layout')

@section('styles')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                @if(Request::route()->getName() == 'admin.user.edit')
                    @include('admin.templates.user.update-user-from')
                @else
                    @include('admin.templates.user.user-from')
                @endif

            </section>
        </div>
    </div>

    @include('admin.templates.user.user-table')

@endsection

@section('scripts')

    <script src="{{ URL::to('admin/asset/jquery_validator/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::to('admin/asset/jquery_validator/jquery-custom-validate.js') }}"></script>
    <script>




        initDataTable_Custom('user_info_table');

        $('#user_form_add').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 80,
                    lettersonly: true
                },
                email: {
                    required: true
                },
                password: {
                    required: true
                },
                designation: {
                    required: true
                }
            }, messages: {
                name: {
                    required: 'Please Enter User Name',
                    minlength: 'Please enter valid User name',
                    maxlength: 'Please enter valid User  name',
                    lettersonly: 'Only alphabet allowed'
                },
                email: {
                    required: 'Please Enter User Email Address'
                },
                password: {
                    required: 'Please Create User Password'
                },
                designation: {
                    required: 'Please Enter User Designation'
                }
            }
        });


        function changeStatus(this1, id) {
            if (confirm('STATUS cahnge?')) {
                var value;
                if ($(this1).val() == 'ACTIVE') {
                    value = 'INACTIVE';
                }
                else {
                    value = 'ACTIVE';
                }
                var API_URL = "{{ route('admin.user.change_status') }}";
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