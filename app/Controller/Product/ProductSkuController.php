<?php

declare(strict_types=1);

namespace App\Controller\Product;

use App\Controller\BaseController;
use App\Model\Product\ProductSkus;
use App\Request\Product\ProductRequest;
use App\Request\Product\ProductSkuRequest;

class ProductSkuController extends BaseController
{
    public function store(ProductSkuRequest $request)
    {
        $data = $request->validated();
        ProductSkus::query()->create($data);
        return $this->response->json(responseSuccess(201));
    }

    public function update(ProductRequest $request)
    {
        $data = $request->validated();
        $productSku = ProductSkus::getFirstById($data['id']);
        $productSku->update($data);
        return $this->response->json(responseSuccess(200, '更新成功'));
    }

    public function delete(ProductRequest $request)
    {
        $id = $request->input('id');
        ProductSkus::getFirstById($id)->delete();
        return $this->response->json(responseSuccess(201, '删除成功'));
    }
}
