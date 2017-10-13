<header class="panel-heading">
    {{config('constants.USER')}} Update
</header>
<div class="panel-body">
    <div class="row">
            <form action="{{route('admin.user.update',array('id'=>$id->id))}}" method="POST" id="user_form_add">
            {{csrf_field()}}
            {{ method_field('PATCH') }}

            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">{{config('constants.USER')}} Name *</label>
                        <input class="form-control has-feedback-left" id="name" placeholder="Category Name"
                               name="name" value="{{ $id->name }}"
                               type="text">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputEmail1">Email *:</label>

                        <input class="form-control has-feedback-left" id="slug" placeholder="Enter email address.."
                               name="email" value="{{ $id->email  }}" type="email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputPassword2">User Password *:</label>

                        <input class="form-control has-feedback-left" id="password" placeholder="Enter user password"
                               name="password" value="{{ $id->password_text }}"
                               type="text">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputPassword2">Mobile No :</label>

                        <input class="form-control has-feedback-left" id="mobile_no" placeholder=""
                               name="mobile_no" value="{{ $id->mobile_no }}{{ old('mobile_no') }}"
                               type="text">
                    </div>
                </div>
             <div class="col-md-4">
                   <div class="form-group">
                       <label class="sr-input" for="exampleInputEmail1">User Type</label>
                       <select name="user_type" id="user_type" class="form-control">
                           <option @if($id->user_type == 'ADMIN' ) SELECTED @endif  value="ADMIN">Admin</option>
                           <option @if($id->user_type == 'INPECTER' ) SELECTED @endif value="INPECTER">Inpecter</option>
                       </select>
                   </div>
               </div>
            </div>




            <div class="col-md-12" style="text-align: center">
                <div class="form-group">
                    <button type="submit" value="{{ $id->id }}" name="selected_id" class="btn btn-primary">
                        Update {{config('constants.USER')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


