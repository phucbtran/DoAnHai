<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProducerCreateRequest;
use App\Http\Requests\ProducerUpdateRequest;
use App\Repositories\ProducerRepository;
use App\Validators\ProducerValidator;

/**
 * Class ProducersController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProducersController extends Controller
{
    /**
     * @var ProducerRepository
     */
    protected $repository;

    /**
     * @var ProducerValidator
     */
    protected $validator;

    /**
     * ProducersController constructor.
     *
     * @param ProducerRepository $repository
     * @param ProducerValidator $validator
     */
    public function __construct(ProducerRepository $repository, ProducerValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $producers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $producers,
            ]);
        }

        return view('producers.index', compact('producers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProducerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProducerCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $producer = $this->repository->create($request->all());

            $response = [
                'message' => 'Producer created.',
                'data'    => $producer->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
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
        $producer = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $producer,
            ]);
        }

        return view('producers.show', compact('producer'));
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
        $producer = $this->repository->find($id);

        return view('producers.edit', compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProducerUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProducerUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $producer = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Producer updated.',
                'data'    => $producer->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
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
                'message' => 'Producer deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Producer deleted.');
    }
}
