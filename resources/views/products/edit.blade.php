@extends('layouts.templates')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cập nhật sản phẩm</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>E-commerce</a>
            </li>
            <li class="active">
                <strong>Product edit</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-2"> Data</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-2" class="tab-pane active">
                        <div class="panel-body">
                            <form method="post" action="{{action('ProductsController@update', $product->id)}}">
                                @csrf
                                <input name="_method" type="hidden" value="PATCH">
                            <fieldset class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Tên SP:</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Tên Sản Phẩm" name="TenSP" value="{{$product->TenSP}}" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Đơn Giá:</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Đơn Giá" name="DonGia" value="{{$product->DonGia}}" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Mô Tả:</label>
                                    <div class="col-sm-10"><textarea class="form-control" placeholder="Mô Tả" name="MoTa" required>{{$product->MoTa}}</textarea></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Số Lượng:</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Số Lượng" name="SoLuongTon" value="{{$product->SoLuongTon}}" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nhà Cung Cấp:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="MaNCC">
                                            @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}" <?php
                                                if($supplier->id == $product->MaNCC) echo "selected"
                                                ?>>{{$supplier->TenNCC}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nhà Sản Xuất:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="MaNSX">
                                            @foreach($producers as $producer)
                                                <option value="{{$producer->id}}" <?php
                                                    if($producer->id == $product->MaNSX) echo "selected"
                                                    ?>>{{$producer->TenNSX}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Loại Sản Phẩm:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="MaLoaiSP">
                                            @foreach($productTypes as $productType)
                                                <option value="{{$productType->id}}" <?php
                                                    if($productType->id == $product->MaLoaiSP) echo "selected"
                                                    ?>>{{$productType->TenLoai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6"></div>
                                    <div class="">
                                        <input type="submit" class="btn btn-primary" value="Sửa">
                                        <input type="reset" class="btn btn-default" value="Reset">
                                    </div>
                                </div>
                            </fieldset>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection