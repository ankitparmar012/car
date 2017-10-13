<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{config('constants.SERVICES_CATEGORY')}} list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>

            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="Services_table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>{{config('constants.SERVICES_CATEGORY')}} </th>
                            <th>Services Description</th>
                            <th>Slug</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aSerCate as $index=>$aSerCateData)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $aSerCateData->ser_cat_title }}</td>
                                <td>{{ $aSerCateData->ser_cat_desc }}</td>
                                <td>{{ $aSerCateData->slug }}</td>
                                <td>
                                    @if($aSerCateData->status  == 'ACTIVE')
                                        <button id="ACTIVE" class="badge btn-success" onclick="changeStatus(this,'{{$aSerCateData->id_services_category}}');" value="ACTIVE">Active</button>
                                    @else
                                        <button id="INACTIVE" class="badge btn-danger" onclick="changeStatus(this,'{{$aSerCateData->id_services_category}}');"  value="INACTIVE">Deactive</button>
                                    @endif
                                </td>
                                <td> <a href="{{ route('admin.services-category.get',array( 'id' => $aSerCateData->id_services_category)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.services-category.delete',array( 'id' => $aSerCateData->id_services_category)) }}" id="delete" class=" delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

