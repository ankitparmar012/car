<header class="panel-heading">
    Update {{config('constants.MEMBER_ROLE')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ route('admin.member-role.update',array('id' => $id->id_member_roles))}}">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="col-md-12">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Member Role</label>

                        <input class="form-control has-feedback-left" id="member_role" placeholder="Member Role"
                               name="member_role" value="{{$id->member_role}}{{ old('member_role') }}"
                               type="text">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputEmail1">Status{{$id->status}}</label>

                        <select name="status" class="form-control">
                            <option @if($id->status == "ACTIVE") selected @endif value="{{config('constants.ACTIVE')}}">{{config('constants.ACTIVE')}}</option>
                            <option @if($id->status == "INACTIVE") selected @endif value="{{config('constants.INACTIVE')}}">{{config('constants.INACTIVE')}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <br>
                        <button type="submit" class="btn btn-primary">{{config('constants.MEMBER_ROLE')}} Update</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>