<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\UserContract;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{

    /**
     * @var UserContract
     */
    protected $UserRepository;

    /**
     * UserController constructor.
     * @param UserContract $UserRepository
     */
    public function __construct(UserContract $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->UserRepository->listUsers();

        $this->setPageTitle('Users', 'List of all users');
        return view('admin.users.index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $users = $this->UserRepository->listUsers('id', 'asc');

        $this->setPageTitle('Users', 'Create User');
        return view('admin.users.create', compact('users'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $params = $request->except('_token');

        $user= $this->UserRepository->createUser($params);

        if (!$user) {

            return $this->responseRedirectBack('Error occurred while creating user.', 'error', true, true);
        }

        return $this->responseRedirect('admin.users.index', 'User added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $users = $this->UserRepository->findUserById($id);
//        $users = $this->BannerRepository->treeList();

        $this->setPageTitle('Users', 'Edit User : '.$users->name);
        return view('admin.users.edit', compact('users'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $params = $request->except('_token');

        $user = $this->UserRepository->updateUser($params);

        if (!$user) {

            return $this->responseRedirectBack('Error occurred while updating User.', 'error', true, true);
        }
        return $this->responseRedirectBack('User updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $user = $this->UserRepository->deleteUser($id);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while deleting User.', 'error', true, true);
        }
        return $this->responseRedirect('admin.users.index', 'User deleted successfully' ,'success',false, false);
    }
}
