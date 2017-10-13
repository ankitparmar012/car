<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{config('constants.SERVICES')}} list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>

            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="ser_table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Services Category</th>
                            <th>{{config('constants.SERVICES')}} </th>
                            <th>Price</th>
                            <th>Slug</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aServices as $index=>$aServicesData)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $aServicesData->ServicesCategory->ser_cat_title }}</td>
                                <td>{{ $aServicesData->ser_title }}</td>
                                <td>{{ $aServicesData->ser_price }}</td>
                                <td>{{ $aServicesData->slug }}</td>
                                <td>
                                    @if($aServicesData->status  == 'ACTIVE')
                                        <button id="ACTIVE" class="badge btn-success" onclick="changeStatus(this,'{{$aServicesData->id_services}}');" value="ACTIVE">Active</button>
                                    @else
                                        <button id="INACTIVE" class="badge btn-danger" onclick="changeStatus(this,'{{$aServicesData->id_services}}');"  value="INACTIVE">Deactive</button>
                                    @endif
                                </td>
                                <td> <a href="{{ route('admin.services.get',array( 'id' => $aServicesData->id_services)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.services.delete',array( 'id' => $aServicesData->id_services)) }}" id="delete" class="delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

