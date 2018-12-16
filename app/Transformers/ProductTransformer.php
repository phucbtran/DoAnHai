<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Product;

/**
 * Class ProductTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{
    /**
     * Transform the Product entity.
     *
     * @param \App\Entities\Product $model
     *
     * @return array
     */
    public function transform(Product $model)
    {
        return [
            'id'         => (int) $model->id,
            'TenSP' => $model->TenSP,
            'DonGia' => (int) $model->DonGia,
            'NgayCapNhat' => $model->NgayCapNhat,
            'MoTa' => $model->MoTa,
            'HinhAnh' => $model->HinhAnh,
            'SoLuongTon' => (int) $model->SoLuongTon,
            'LuotXem' => (int) $model->LuotXem,
            'LuotBinhChon' => (int) $model->LuotBinhChon,
            'LuotBinhLuan' => (int) $model->LuotBinhLuan,
            'SoLanMua' => (int) $model->SoLanMua,
            'Moi' => (int) $model->Moi,
            'MaNCC' => (int) $model->MaNCC,
            'MaNSX' => (int) $model->MaNSX,
            'MaLoaiSP' => (int) $model->MaLoaiSP,
            'DaXoa' => (int) $model->DaXoa,
            'ThongTinSanPham' => $model->ThongTinSanPham,
            'HinhAnh1' => $model->HinhAnh1,
            'HinhAnh2' => $model->HinhAnh2,
            'HinhAnh3' => $model->HinhAnh3,
            'HinhAnh4' => $model->HinhAnh4,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
