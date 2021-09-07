<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\FaqContract;
use App\Http\Controllers\BaseController;

class FaqController extends BaseController
{

    /**
     * @var FaqContract
     */
    protected $FaqRepository;

    /**
     * FaqController constructor.
     * @param FaqContract $FaqRepository
     */
    public function __construct(FaqContract $FaqRepository)
    {
        $this->FaqRepository = $FaqRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $faqs = $this->FaqRepository->listFaqs();

        $this->setPageTitle('Faqs', 'List of all faqs');
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $faqs = $this->FaqRepository->listFaqs('id', 'asc');

        $this->setPageTitle('Faqs', 'Create Faq');
        return view('admin.faqs.create', compact('faqs'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//
        $this->validate($request, [

        ]);

        $params = $request->except('_token');

        $faq = $this->FaqRepository->createFaq($params);
        //ddd($faq);
        if (!$faq) {

            return $this->responseRedirectBack('Error occurred while creating faq.', 'error', true, true);
        }

        return $this->responseRedirect('admin.faqs.index', 'Faq added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $faqs = $this->FaqRepository->findFaqById($id);
//        $faqs = $this->FaqRepository->treeList();

        $this->setPageTitle('Faqs', 'Edit Faq : ' . $faqs->name);
        return view('admin.faqs.edit', compact('faqs'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $params = $request->except('_token');

        $faq = $this->FaqRepository->updateFaq($params);

        if (!$faq) {
//
            return $this->responseRedirectBack('Error occurred while updating Faq.', 'error', true, true);
        }
        return $this->responseRedirectBack('Faq updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $faq = $this->FaqRepository->deleteFaq($id);

        if (!$faq) {
            return $this->responseRedirectBack('Error occurred while deleting Faq.', 'error', true, true);
        }
        return $this->responseRedirect('admin.faqs.index', 'Faq deleted successfully', 'success', false, false);
    }
}
