<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\ProductReviewContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class ProductReviewController extends BaseController
{

    /**
     * @var ProductReviewContract
     */
    protected $ProductReviewRepository;

    /**
     * ProductReviewController constructor.
     * @param ProductReviewContract $ProductReviewRepository
     */
    public function __construct(ProductReviewContract $ProductReviewRepository)
    {
        $this->ProductReviewRepository = $ProductReviewRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $productreviews = $this->ProductReviewRepository->listProductReviews();

        $this->setPageTitle('ProductReviews', 'List of all productreviews');
        return view('admin.productreviews.index', compact('productreviews'));
    }

    public function getReviewsByProductId($id)
    {
        $productreviews = DB::table('product_reviews')
            ->join('users','product_reviews.user_id','=','users.id')
            ->where('product_reviews.product_id','=',$id)
            ->get();
        $this->setPageTitle('ProductReviews', 'List of all product reviews');
        return view('admin.productreviews.index', compact('productreviews'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display()
    {
        $productreviews = $this->ProductReviewRepository->listProductReviews();

        return view('site.test', compact('productreviews'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $productreviews = $this->ProductReviewRepository->listProductReviews('id', 'asc');

        $this->setPageTitle('ProductReviews', 'Create ProductReview');
        return view('admin.productreviews.create', compact('productreviews'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $params = $request->except('_token');

        $productreview= $this->ProductReviewRepository->createProductReview($params);

        if (!$productreview) {

            return $this->responseRedirectBack('Error occurred while creating productreview.', 'error', true, true);
        }

        return $this->responseRedirect('admin.productreviews.index', 'ProductReview added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $productreviews = $this->ProductReviewRepository->findProductReviewById($id);

        $this->setPageTitle('ProductReviews', 'Edit ProductReview : '.$productreviews->name);
        return view('admin.productreviews.edit', compact('productreviews'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $params = $request->except('_token');

        $ProductReview = $this->ProductReviewRepository->updateProductReview($params);

        if (!$ProductReview) {
//
            return $this->responseRedirectBack('Error occurred while updating ProductReview.', 'error', true, true);
        }
        return $this->responseRedirectBack('ProductReview updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $ProductReview = $this->ProductReviewRepository->deleteProductReview($id);

        if (!$ProductReview) {
            return $this->responseRedirectBack('Error occurred while deleting ProductReview.', 'error', true, true);
        }
        return $this->responseRedirect('admin.productreviews.index', 'ProductReview deleted successfully' ,'success',false, false);
    }
}
