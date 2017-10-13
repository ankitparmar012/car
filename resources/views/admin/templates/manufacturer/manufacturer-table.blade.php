<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{config('constants.MANUFACTURER')}} list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>

            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="Manufacturer_table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>{{config('constants.MANUFACTURER')}} Logo</th>
                            <th>{{config('constants.MANUFACTURER')}} Name </th>
                            <th>Slug</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aManufacturer as $index=>$aManufacturerData)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    <a target="_blank" href="{{config('constants.MANUFACTURER_IMAGE').$aManufacturerData->img}}">
                                         <img style="height: 50px;width: 50px;border-radius: 22px;" src="{{config('constants.MANUFACTURER_IMAGE').$aManufacturerData->img}}">
                                    </a>
                                </td>
                                <td>{{ $aManufacturerData->manufacturer_by }}</td>
                                <td>{{ $aManufacturerData->slug }}</td>
                                <td>
                                    @if($aManufacturerData->status  == 'ACTIVE')
                                        <button id="ACTIVE" class="badge btn-success" onclick="changeStatus(this,'{{$aManufacturerData->id_manufacturer}}');" value="ACTIVE">Active</button>
                                    @else
                                        <button id="INACTIVE" class="badge btn-danger" onclick="changeStatus(this,'{{$aManufacturerData->id_manufacturer}}');"  value="INACTIVE">Deactive</button>
                                    @endif
                                </td>
                                <td> <a href="{{ route('admin.manufacturer.get',array( 'id' => $aManufacturerData->id_manufacturer)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.manufacturer.delete',array( 'id' => $aManufacturerData->id_manufacturer)) }}" id="delete" class="delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

