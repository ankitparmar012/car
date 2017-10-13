<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{config('constants.CAR_MODEL')}} list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>

            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="car_modelTabel">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Manufacturer by </th>
                            <th>{{config('constants.CAR_MODEL')}} Name </th>
                            <th>Slug</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aCarModel as $index=>$aCityData)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $aCityData->Manufacture->manufacturer_by}}</td>
                                <td>{{ $aCityData->model_name }}</td>
                                <td>{{ $aCityData->slug }}</td>
                                <td>
                                    @if($aCityData->status  == 'ACTIVE')
                                        <button id="ACTIVE" class="badge btn-success" onclick="changeStatus(this,'{{$aCityData->id_car_model}}');" value="ACTIVE">Active</button>
                                    @else
                                        <button id="INACTIVE" class="badge btn-danger" onclick="changeStatus(this,'{{$aCityData->id_car_model}}');"  value="INACTIVE">Deactive</button>
                                    @endif
                                </td>
                                <td> <a href="{{ route('admin.car-model.get',array( 'id' => $aCityData->id_car_model)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.car-model.delete',array( 'id' => $aCityData->id_car_model)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

