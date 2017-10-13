@extends('admin.layout.master-layout')

@section('styles')
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                @if(Request::route()->getName() == 'admin.master-city.get')
                    @include('admin.templates.master-city.update-master-city-form')
                @else
                    @include('admin.templates.master-city.add-master-city-form')
                @endif
            </section>
        </div>
    </div>

    @include('admin.templates.master-city.master-city-table')

@endsection

@section('scripts')

    <script>
        initDataTable_Custom('table_id');

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
                var API_URL = "{{ route('admin.master-city.change_status') }}";
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