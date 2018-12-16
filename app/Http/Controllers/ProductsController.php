<?php

namespace App\Http\Controllers;

use App\Repositories\ProducerRepository;
use App\Repositories\ProductTypeRepository;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $repository;
    protected $productTypeRepository;
    protected $producerRepository;
    protected $supplierRepository;

    /**
     * @var ProductValidator
     */
    protected $validator;

    /**
     * ProductsController constructor.
     *
     * @param ProductRepository $repository
     * @param ProductValidator $validator
     * @param ProductTypeRepository $productTypeRepository
     * @param ProducerRepository $producerRepository
     * @param SupplierRepository $supplierRepository
     */
    public function __construct(ProductRepository $repository, ProductValidator $validator,
                                ProductTypeRepository $productTypeRepository, ProducerRepository $producerRepository,
                                SupplierRepository $supplierRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->productTypeRepository = $productTypeRepository;
        $this->producerRepository = $producerRepository;
        $this->supplierRepository = $supplierRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $products = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'products' => $products,
            ]);
        }

        return view('products.products', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $product = $this->repository->create($request->all());

            $response = [
                'message' => 'Thêm sản phẩm thành công.',
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect('products')->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $product,
            ]);
        }

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->find($id);
        $producers  = $this->producerRepository->all();
        $productTypes = $this->productTypeRepository->all();
        $suppliers = $this->supplierRepository->all();

        return view('products.edit', compact('product', 'producers', 'productTypes', 'suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producers  = $this->producerRepository->all();
        $productTypes = $this->productTypeRepository->all();
        $suppliers = $this->supplierRepository->all();

        return view('products.create', compact( 'producers', 'productTypes', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $product = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Cập nhật sản phẩm thành công',
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect('products')->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Xóa sản phẩm thành công',
                'deleted' => $deleted,
            ]);
        }

        return redirect('products')->with('message', 'Xóa sản phẩm thành công');
    }
}
