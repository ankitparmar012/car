<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{config('constants.PRODUCTS_CATEGORY')}} list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>

            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="table_id">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>{{config('constants.PRODUCTS_CATEGORY')}} </th>
                            <th>Slug</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aProCate as $index=>$aProCatData)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $aProCatData->pro_cat_title }}</td>
                                <td>{{ $aProCatData->slug }}</td>
                                <td>
                                    @if($aProCatData->status  == 'ACTIVE')
                                        <button id="ACTIVE" class="badge btn-success" onclick="changeStatus(this,'{{$aProCatData->id_product_category}}');" value="ACTIVE">Active</button>
                                    @else
                                        <button id="INACTIVE" class="badge btn-danger" onclick="changeStatus(this,'{{$aProCatData->id_product_category}}');"  value="INACTIVE">Deactive</button>
                                    @endif
                                </td>
                                <td> <a href="{{ route('admin.products-category.get',array( 'id' => $aProCatData->id_product_category)) }}" class=" btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.products-category.delete',array( 'id' => $aProCatData->id_product_category)) }}" id="delete" class=" delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

