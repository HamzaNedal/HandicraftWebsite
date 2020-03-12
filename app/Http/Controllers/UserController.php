<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;
use Response;
class UserController extends Controller
{
    public function __construct(User $userModel)
    {
        // $this->authorize('show-categories', User::class);
        $this->middleware('can:admin,App\Models\User');
        $this->userModel = $userModel;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $users = $this->userModel->all();

        return view('backend.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        // $input = $request->all();
        $input = [
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'type'=>$request->level
        ];
        $user = $this->userModel->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userModel->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('backend.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('backend.users.index'));
        }

        return view('backend.users.edit')->with('user', $user);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userModel->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $input = [
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'type'=>$request->level
        ];
        $user = $this->userModel->update($input, $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userModel->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userModel->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
