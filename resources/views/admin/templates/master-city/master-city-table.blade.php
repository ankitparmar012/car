<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{config('constants.MASTER_CITY')}} list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>

            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="category_info_table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>{{config('constants.MASTER_CITY')}} Name </th>
                            <th>Slug</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aCity as $index=>$aCityData)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $aCityData->name }}</td>
                                <td>{{ $aCityData->slug }}</td>
                                <td>
                                    @if($aCityData->status  == 'ACTIVE')
                                        <button id="ACTIVE" class="badge btn-success" onclick="changeStatus(this,'{{$aCityData->id_master_city}}');" value="ACTIVE">Active</button>
                                    @else
                                        <button id="INACTIVE" class="badge btn-danger" onclick="changeStatus(this,'{{$aCityData->id_master_city}}');"  value="INACTIVE">Deactive</button>
                                    @endif
                                </td>
                                <td> <a href="{{ route('admin.master-city.get',array( 'id' => $aCityData->id_master_city)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.master-city.delete',array( 'id' => $aCityData->id_master_city)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

