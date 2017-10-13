@extends('admin.layout.master-layout')

@section('styles')
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                @if(Request::route()->getName() == 'admin.manufacturer.index')
                    @include('admin.templates.manufacturer.add-manufacturer-form')
                @else
                    @include('admin.templates.manufacturer.update-manufacture-form')
                @endif
            </section>
        </div>
    </div>

    @include('admin.templates.manufacturer.manufacturer-table')

@endsection

@section('scripts')

    <script>
        initDataTable_Custom('Manufacturer_table');

        function changeStatus(this1, id)
        {
        alert($(this1).val());
            if (confirm('STATUS cahnge?')) {
                var value;
                if ($(this1).val() == 'ACTIVE') {
                    value = 'INACTIVE';
                }
                else {
                    value = 'ACTIVE';
                }
                var API_URL = "{{ route('admin.manufacturer.change_status') }}";
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