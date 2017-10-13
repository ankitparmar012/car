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
                    <table class="display table table-bordered table-striped" id="customer_table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone No</th>
                            <th>Mobile No</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aCustomer as $index=>$aCustomerData)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $aCustomerData->customer_name }}</td>
                                <td>{{ $aCustomerData->customer_email }}</td>
                                <td>{{ $aCustomerData->area }} , {{ $aCustomerData->city }} , {{ $aCustomerData->p_code }}</td>
                                <td>{{ $aCustomerData->phone_no }}</td>
                                <td>{{ $aCustomerData->mobile_no }}</td>
                                <td>
                                    <a href="{{ route('admin.customer.get',array( 'id' => $aCustomerData->id_customer)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.customer.delete',array( 'id' => $aCustomerData->id_customer)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

