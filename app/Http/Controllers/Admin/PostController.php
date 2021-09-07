<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\PostContract;


class PostController extends BaseController
{

    /**
     * @var PostContract
     */
    protected $PostRepository;

    /**
     * PostController constructor.
     * @param PostContract $PostRepository
     */
    public function __construct(PostContract $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->PostRepository->listPosts();

        $this->setPageTitle('Posts', 'List of all Posts');
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $posts = $this->PostRepository->listPosts('id', 'asc');

        $this->setPageTitle('Posts', 'Create Post');
        return view('admin.posts.create', compact('posts'));
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
//            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $post= $this->PostRepository->createPost($params);
//        ddd($post);
        if (!$post) {

            return $this->responseRedirectBack('Error occurred while creating Post.', 'error', true, true);
        }

        return $this->responseRedirect('admin.posts.index', 'Post added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $posts = $this->PostRepository->findPostById($id);
//        $Posts = $this->PostRepository->treeList();

        $this->setPageTitle('Posts', 'Edit Post : '.$posts->name);
        return view('admin.posts.edit', compact('posts'));
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
//            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);
//      ddd($request);
        $params = $request->except('_token');
//        ddd($params);
        $Post = $this->PostRepository->updatePost($params);

        if (!$Post) {
//
            return $this->responseRedirectBack('Error occurred while updating Post.', 'error', true, true);
        }
        return $this->responseRedirectBack('Post updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $Post = $this->PostRepository->deletePost($id);

        if (!$Post) {
            return $this->responseRedirectBack('Error occurred while deleting Post.', 'error', true, true);
        }
        return $this->responseRedirect('admin.posts.index', 'Post deleted successfully' ,'success',false, false);
    }
}

