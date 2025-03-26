<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\TaskService;

class ProductController extends Controller
{
    public function __construct(
        //dependency injection
        protected TaskService $taskService 
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(ProductService $productService)
    {
        $newProduct = [
            'id' => 4,
            'name' => 'Orange',
            'category' => 'fruit'
        ];
        $productService->insert($newProduct);
        $this->taskService->add('Add to cart');
        $this->taskService->add('Checkout');
        
        $data = [
            'products' => $productService->listProducts(), 
            'tasks' => $this->taskService->getAllTasks()
        ];

        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "This is for product create.";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductService $productService, string $id)
    {
        $product = collect($productService->listProducts())->filter(function ($item) use ($id) {
            return $item['id'] == $id;
        })->first();

        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function build()
    {
        return "This is for product build.";
    }
}
