<header class="panel-heading">
    Sample Form
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="">

            {{csrf_field()}}

            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputPassword2">Name 1:</label>

                        <input class="form-control has-feedback-left" id="name" placeholder=" category Name"
                               name="name" value="{{ old('name') }}"
                               type="text">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputEmail1">name 2:</label>

                        <input class="form-control has-feedback-left" id="slug" placeholder="slug"
                               name="slug" value="{{ old('slug') }}" type="text">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputEmail1">name 3:</label>

                        <input class="form-control has-feedback-left" id="slug" placeholder="slug"
                               name="slug" value="{{ old('slug') }}" type="text">
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="text-align: center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Name Add</button>
                </div>
            </div>
        </form>
    </div>
</div>