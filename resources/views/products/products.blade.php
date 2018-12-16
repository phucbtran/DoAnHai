@extends('layouts.templates')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Danh sách sản phẩm</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>E-commerce</a>
            </li>
            <li class="active">
                <strong>Product List</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
    <?php
    if (Session::has('message')) {
        echo "<div class='ibox-content'><div class='alert alert-success'>". Session::get("message") ."</div></div>";
    }
    ?>
</div>
<div class="row wrapper border-bottom white-bg page-heading"><br>
    <div class="col-lg-10"><a type="button" class="btn btn-primary" href="{{route('products.create')}}">Thêm</a></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh sách sản phẩm</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên SP</th>
                                <th>Đơn Giá</th>
                                <th>Mô Tả</th>
                                <th>Số lượng Còn Lại</th>
                                <th>Hành Động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <?php
                                $subDes = '';
                                if(strlen($product->MoTa) >= 50) {
                                    $subDes = substr($product->MoTa, 0, 50);
                                } else {
                                    $subDes = $product->MoTa;
                                }
                            ?>
                            <tr class="gradeX">
                                <td>{{$product->id}}</td>
                                <td>{{$product->TenSP}}</td>
                                <td>{{$product->DonGia}}</td>
                                <td class="center">{{$subDes}} [...]</td>
                                <td class="center">{{$product->SoLuongTon}}</td>
                                <td class="center">
                                    <a type="button" class="btn btn-primary btn-xs" href="{{route('products.edit', $product->id)}}">Sửa</a>
                                    <form action="{{action('ProductsController@destroy', $product->id)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-xs" type="submit">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên SP</th>
                                <th>Đơn Giá</th>
                                <th>Mô Tả</th>
                                <th>Số lượng Còn Lại</th>
                                <th>Hành Động</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection