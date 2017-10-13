<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{config('constants.USERS')}} list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="user_info_table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>{{config('constants.USER')}} Name </th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>User Type </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aUser as $index=>$oUser)
                            <tr>
                                <td>{{ $index +1 }}</td>
                                <td>{{ $oUser->name }}</td>
                                <td>{{ $oUser->email }}</td>
                                <td>{{ $oUser->mobile_no }}</td>
                                <td>{{ $oUser->user_type }}</td>

                                <td> <a href="{{ route('admin.user.edit',array( 'id' => $oUser->id)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.user.delete',array( 'id' => $oUser->id)) }}" id="delete" class="delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

