<?php namespace Manager\Http\Controllers;

use Manager\Models\Category;
use Manager\Models\Product;
use Manager\Http\Requests\ProductRequest;

class ProductController extends Controller {


    public function __construct()
    {
        /*session()->flash('title', 'Product Manager');
        session()->flash('url', url('products'));*/
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::orderBy('id', 'desc')->paginate(3);
        //$this->dispatch(new \Manager\Jobs\SendEmailJob($products->count()));

		return view('product.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
    {
		$categories=Category::orderBy('created_at', 'asc')->get();
        $catArray=array('0'=>'Select a category');
        foreach($categories as $category)
           $catArray= array_merge($catArray, array($category->id => $category->name));

        // load the view and pass the product categories
        return view('product.create')->with('categoriesArray', $catArray);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(ProductRequest $request)
	{
		$product = new Product();
        $this->saveProduct($request, $product);
		return redirect()->route('products.index')->with('message', 'Product created successfully.');
	}


    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		return view('product.show', compact('product'));
	}


    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);
        $categories=Category::orderBy('created_at', 'asc')->get();
        $catArray=array('0'=>'Select a category');
        foreach($categories as $category)
            $catArray= array_merge($catArray, array($category->id => $category->name));

        return view('product.edit', compact('product'))->with('categoriesArray', $catArray);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(ProductRequest $request, $id)
	{
		$product = Product::findOrFail($id);
        $this->saveProduct($request, $product);
        return redirect()->route('products.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id);
		$product->delete();
		return redirect()->route('products.index')->with('message', 'Item deleted successfully.');
	}

    /**
     * @param ProductRequest $request
     * @param $product
     */
    public function saveProduct(ProductRequest $request, Product $product)
    {
        $product->name = $request->input("name");
        //associate for one to one relationships,
        //attach for one to many and many to many relationships
        $product->category()->associate($request->input("category_id"));
        $product->price = $request->input("price");
        $product->save();
    }

}
