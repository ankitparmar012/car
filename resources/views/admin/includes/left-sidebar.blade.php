<div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">

        <li>
            <a  href="">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

         <li><a  href="{{route('admin.user.index')}}"><i class="fa fa-won"></i><span>User</span></a></li>

        <li class="sub-menu">

            <a  href="javascript:void(0);">
                <i class="fa fa-won"></i>
                <span>Product</span>
            </a>
            <ul class="sub">
                <li><a href="{{route('admin.products-category.index')}}">Product Category</a></li>
                <li><a href="{{route('admin.products.index')}}">Products</a></li>
            </ul>
        </li>

        <li><a  href="{{route('admin.customer.index')}}"><i class="fa fa-user"></i><span>Customer</span></a></li>

        <li class="sub-menu">

            <a  href="javascript:void(0);">
                <i class="fa fa-stack-exchange"></i>
                <span>Services</span>
            </a>
            <ul class="sub">
                <li><a href="{{route('admin.services-category.index')}}">Services Category</a></li>
                <li><a href="{{route('admin.services.index')}}">Services</a></li>
            </ul>
        </li>

        <li class="sub-menu">

            <a  href="javascript:void(0);">
                <i class="fa fa-bell"></i>
                <span>Cars</span>
            </a>
            <ul class="sub">
                <li><a href="{{route('admin.manufacturer.index')}}">Manufacturer</a></li>
                <li><a href="{{route('admin.car-model.index')}}">Car Model</a></li>
            </ul>
        </li>

        <li class="sub-menu">

            <a  href="javascript:void(0);">
                <i class="fa fa-bell"></i>
                <span>Job card</span>
            </a>
            <ul class="sub">
                <li><a href="{{route('admin.job-card.index')}}">Add Job Card</a></li>
                <li><a href="">Job Card List</a></li>
            </ul>
        </li>

    </ul>
    <!-- sidebar menu end-->
</div>