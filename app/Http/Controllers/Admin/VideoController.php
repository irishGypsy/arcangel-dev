<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\VideoContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class VideoController extends BaseController
{

    /**
     * @var VideoContract
     */
    protected $VideoRepository;

    /**
     * VideoController constructor.
     * @param VideoContract $VideoRepository
     */
    public function __construct(VideoContract $VideoRepository)
    {
        $this->VideoRepository = $VideoRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $videos = $this->VideoRepository->listVideos();

        $this->setPageTitle('Videos', 'List of all videos');
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $videos = $this->VideoRepository->listVideos('id', 'asc');

        $this->setPageTitle('Videos', 'Create Video');
        return view('admin.videos.create', compact('videos'));
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
            'title'      =>  'required|max:191',
            'thumbnail'     =>  'mimes:jpg,jpeg,png|max:8000',
            'file'  =>  'mimes:mp4,avi,mov|max:10000'
        ]);

        $params = $request->except('_token');

        $video= $this->VideoRepository->createVideo($params);
        //ddd($video);
        if (!$video) {

            return $this->responseRedirectBack('Error occurred while creating video.', 'error', true, true);
        }

        return $this->responseRedirect('admin.videos.index', 'Video added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $videos = $this->VideoRepository->findVideoById($id);
//        $videos = $this->VideoRepository->treeList();

        $this->setPageTitle('Videos', 'Edit Video : '.$videos->name);
        return view('admin.videos.edit', compact('videos'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $this->validate($request, [
            'title'      =>  'required|max:191',
            'thumbnail'     =>  'mimes:jpg,jpeg,png|max:8000',
            'file'  =>  'mimes:mp4,avi,mov|max:10000'
        ]);
        //ddd($request);
        $params = $request->except('_token');

        $video = $this->VideoRepository->updateVideo($params);

        if (!$video) {
//
            return $this->responseRedirectBack('Error occurred while updating Video.', 'error', true, true);
        }
        return $this->responseRedirectBack('Video updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $video = $this->VideoRepository->deleteVideo($id);

        if (!$video) {
            return $this->responseRedirectBack('Error occurred while deleting Video.', 'error', true, true);
        }
        return $this->responseRedirect('admin.videos.index', 'Video deleted successfully' ,'success',false, false);
    }
}
