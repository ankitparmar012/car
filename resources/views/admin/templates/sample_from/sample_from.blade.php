@extends('admin.layout.master-layout')

@section('styles')
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">

                @include('admin.templates.sample_from.sample_from_content')

                {{--@if(Request::route()->getName() == 'admin.category.edit')
                    @include('admin.templates.category.category-update')
                @else
                    @include('admin.templates.category.category-content')
                @endif--}}

            </section>
        </div>
    </div>

    @include('admin.templates.sample_from.sample_table')

@endsection

@section('scripts')

    <script>
        initDataTable_Custom('table_id');
    </script>

@endsection