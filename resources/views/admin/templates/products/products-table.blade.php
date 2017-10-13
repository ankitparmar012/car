<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{config('constants.PRODUCTS')}} list
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
                            <th>Products Category</th>
                            <th>{{config('constants.PRODUCTS')}} </th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Slug</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aProducts as $index=>$aProductsData)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $aProductsData->ProductsCategory->pro_cat_title }}</td>
                                <td>{{ $aProductsData->pro_title }}</td>
                                <td>{{ $aProductsData->pro_price }}</td>
                                <td>{{ $aProductsData->pro_qty }}</td>
                                <td>{{ $aProductsData->slug }}</td>
                                <td>
                                    @if($aProductsData->status  == 'ACTIVE')
                                        <button id="ACTIVE" class="badge btn-success" onclick="changeStatus(this,'{{$aProductsData->id_product}}');" value="ACTIVE">Active</button>
                                    @else
                                        <button id="INACTIVE" class="badge btn-danger" onclick="changeStatus(this,'{{$aProductsData->id_product}}');"  value="INACTIVE">Deactive</button>
                                    @endif
                                </td>
                                <td> <a href="{{ route('admin.products.get',array( 'id' => $aProductsData->id_product)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.products.delete',array( 'id' => $aProductsData->id_product)) }}" id="delete" class=" delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

