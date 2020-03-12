<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->type == 1) {
            $products = $this->productRepository->all();
        } else {
            $products = $this->productRepository->all(['user_id' => auth()->user()->id]);
            // dd($products);
        }

        return view('backend.products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        // $input = $request->all();
        // dd(auth()->user()->id);
        $input = [
            'pro_name' => $request->name,
            'pro_price' => $request->price,
            'category_id' => $request->category,
            'stock'      => $request->stock,
            'pro_info'   =>  $request->description,
            'user_id'   => auth()->user()->id,
            'image'     =>  $request->image
        ];
        $product = $this->productRepository->create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (auth()->user()->type == 1) {
            $product = $this->productRepository->find($id);
        } else {
            $product = $this->productRepository->allQuery(['id' => $id, 'user_id' => auth()->user()->id])->where('id',$id)->first();
            // dd($products);
        }
        // dd($product);
        if (empty($product->toArray())) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }

        return view('backend.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }

        if (!auth()->user()->can('edit-prodcut', $product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }

        $categories = Category::get();
        return view('backend.products.edit')->with(['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {

        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        if (!auth()->user()->can('edit-prodcut', $product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }
        $input = [
            'pro_name' => $request->name,
            'pro_price' => $request->price,
            'category_id' => $request->category,
            'stock' => $request->stock,
            'pro_info' =>  $request->description,
            'photo' =>  $request->image,
        ];
        $product = $this->productRepository->update($input, $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }

        if (!auth()->user()->can('edit-prodcut', $product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }

    public function status()
    {
        $product = $this->productRepository->find(request()->id);
       // dd($product);
        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }

        if (!auth()->user()->can('edit-prodcut', $product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }
        $status = 0;
        if($product->status == 0){
            $status = 1;
        }
        // dd($status);
        // $input = ['status'=>1];
        $prodcut =  Product::where('id',$product->id)->update(['status'=>$status]);
        if($prodcut == 1){
           $status =  $status == 0 ?  'active' : 'unactive';
            Flash::success('prodcut status '.$status);
        }

        return redirect(route('products.index'));
    }
}
