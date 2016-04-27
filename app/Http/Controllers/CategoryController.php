<?php


namespace Manager\Http\Controllers;


use Manager\Http\Requests\CategoryRequest;
use Manager\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$categories = Category::orderBy('id', 'desc')->paginate(10);

		return view('category.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(CategoryRequest $request)
	{
		$category = new Category();

		$category->name = $request->input("name");

		$category->save();

		return redirect()->route('categories.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::findOrFail($id);

		return view('category.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::findOrFail($id);
		return view('category.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(CategoryRequest $request, $id)
	{
		$category = Category::findOrFail($id);

		$category->name = $request->input("name");

		$category->save();

		return redirect()->route('categories.index')->with('message', 'Category updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::findOrFail($id);
		$category->delete();
		return redirect()->route('categories.index')->with('message', 'Item deleted successfully.');
	}
}
