<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{config('constants.MEMBER_ROLE')}} list
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
                            <th>{{config('constants.MEMBER_ROLE')}} Name </th>
                            <th>Slug</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aMemberRole as $index=>$aMemberRoleData)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $aMemberRoleData->member_role }}</td>
                                <td>{{ $aMemberRoleData->slug }}</td>
                                <td>
                                    @if($aMemberRoleData->status  == 'ACTIVE')
                                        <button id="ACTIVE" class="badge btn-success" onclick="changeStatus(this,'{{$aMemberRoleData->id_member_roles}}');" value="ACTIVE">Active</button>
                                    @else
                                        <button id="INACTIVE" class="badge btn-danger" onclick="changeStatus(this,'{{$aMemberRoleData->id_member_roles}}');"  value="INACTIVE">Deactive</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.member-role.get',array( 'id' => $aMemberRoleData->id_member_roles)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.member-role.delete',array( 'id' => $aMemberRoleData->id_member_roles)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

