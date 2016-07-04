<?php

namespace Satalite\Products\Controllers\Product;

use Illuminate\Http\Request;

use Satalite\Products\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Satalite\Products\Requests\ProductCreateRequest;
use Satalite\Products\Requests\ProductUpdateRequest;
use Satelite\Products\Repositories\ProductRepository;
use Satelite\Products\Validators\ProductValidator;


class ProductsController extends Controller
{

    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var ProductValidator
     */
    protected $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
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
        $mdls = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $mdls,
            ]);
        }

        return view('mdls.index', compact('mdls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $mdl = $this->repository->create($request->all());

            $response = [
                'message' => 'Product created.',
                'data'    => $mdl->toArray(),
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
        $mdl = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $mdl,
            ]);
        }

        return view('mdls.show', compact('mdl'));
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

        $mdl = $this->repository->find($id);

        return view('mdls.edit', compact('mdl'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $mdl = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Product updated.',
                'data'    => $mdl->toArray(),
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
                'message' => 'Product deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Product deleted.');
    }
}
