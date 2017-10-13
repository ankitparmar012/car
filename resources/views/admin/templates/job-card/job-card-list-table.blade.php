<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{config('constants.JOB_CARD')}} list
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
                            <th>Customer Name</th>
                            <th>Car Model</th>
                            <th>Services List</th>
                            <th>Services Price</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aJobCard as $index=>$aJobCardData)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $aJobCardData->fk_id_customer }}</td>
                                <td>{{ $aJobCardData->CarModel->model_name }}</td>
                                <td>
                                @foreach($aJobCardData->GetSelectedServices as $index=>$aServicesDataName)
                                 @foreach($aServicesList as $index=>$aServicesData)
                                    @if($aServicesDataName->fk_id_job_card_services == $aServicesData->id_services)
                                        {{$aServicesData->ser_title}}  {{$aServicesData->ser_price}},<br>
                                        @endif
                                   @endforeach
                                @endforeach
                                </td>
                                <td>{{ $aJobCardData->total_services_price }}</td>

                                <td>
                                    <a href="{{ route('admin.job-card.get',array( 'id' => $aJobCardData->id_job_card)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    {{--<a href="{{ route('admin.services.delete',array( 'id' => $aJobCardData->id_job_card)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>--}}
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

