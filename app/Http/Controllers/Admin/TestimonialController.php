<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\TestimonialContract;
use App\Http\Controllers\BaseController;

class TestimonialController extends BaseController
{

    /**
     * @var TestimonialContract
     */
    protected $TestimonialRepository;

    /**
     * TestimonialController constructor.
     * @param TestimonialContract $TestimonialRepository
     */
    public function __construct(TestimonialContract $TestimonialRepository)
    {
        $this->TestimonialRepository = $TestimonialRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $testimonials = $this->TestimonialRepository->listTestimonials();

        $this->setPageTitle('Testimonials', 'List of all testimonials');
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $testimonials = $this->TestimonialRepository->listTestimonials('id', 'asc');

        $this->setPageTitle('Testimonials', 'Create Testimonial');
        return view('admin.testimonials.create', compact('testimonials'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//        ddd($request);
        $params = $request->except('_token');

        $testimonial= $this->TestimonialRepository->createTestimonial($params);
        //ddd($testimonial);
        if (!$testimonial) {

            return $this->responseRedirectBack('Error occurred while creating testimonial.', 'error', true, true);
        }

        return $this->responseRedirect('admin.testimonials.index', 'Testimonial added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $testimonials = $this->TestimonialRepository->findTestimonialById($id);

        $this->setPageTitle('Testimonials', 'Edit Testimonial : '.$testimonials->name);
        return view('admin.testimonials.edit', compact('testimonials'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
//        ddd($request);
        $params = $request->except('_token');

        $Testimonial = $this->TestimonialRepository->updateTestimonial($params);

        if (!$Testimonial) {
//
            return $this->responseRedirectBack('Error occurred while updating Testimonial.', 'error', true, true);
        }
        return $this->responseRedirectBack('Testimonial updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $Testimonial = $this->TestimonialRepository->deleteTestimonial($id);

        if (!$Testimonial) {
            return $this->responseRedirectBack('Error occurred while deleting Testimonial.', 'error', true, true);
        }
        return $this->responseRedirect('admin.testimonials.index', 'Testimonial deleted successfully' ,'success',false, false);
    }
}
