<?php

namespace App\Domains\Auth\Http\Controllers\Backend\User;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Domains\Auth\Http\Requests\Backend\User\DeleteUserRequest;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService, $directory;


    public function __construct( UserService $userService )
    {
        $this->service = $userService;
        $this->directory = 'backend.users.';
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index( Request $request )
    {
        if ($request->ajax()) {

            $data = $this->service->getUserList();
            return Datatables::of($data)
                    ->addIndexColumn()  
                    ->addColumn('status', function($row){
     
                        if( $row['status'] == 1 ) return 'Active';
                        else if( $row['status'] == 0 ) return 'In-active';
                        else if( $row['status'] == 2 ) return 'Blocked';
    
                    })
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="users/'.$row['id'].'/edit" class="edit btn btn-primary btn-sm"> Edit </a>';
                           $btn .= '
                           <form action="users/'.$row['id'].'" method="POST">
                                '.csrf_field().method_field("DELETE").'
                                <button class="btn btn-danger btn-sm" type="submit"> Delete </button> </form></div>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view( $this->directory.'index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view( $this->directory.'form');
    }

    /**
     * @param  StoreUserRequest  $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->service->store($request->validated());

        return redirect()->route('admin.auth.user.show', $user)->withFlashSuccess(__('The user was successfully created.'));
    }

    /**
     * @param  User  $user
     *
     * @return mixed
     */
    public function show(User $user)
    {

    }

    /**
     * @param  EditUserRequest  $request
     * @param  User  $user
     *
     * @return mixed
     */
    public function edit(Request $request, User $user)
    {
        return view( $this->directory.'form', compact('user') );
    }

    /**
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(Request $request, $id)
    {
        $this->service->updateUser($request->except('_token', '_method'), $id);

        return redirect()->route('admin.users.index')->withFlashSuccess(__('The user was successfully updated.'));
    }

    /**
     * @param  DeleteUserRequest  $request
     * @param  User  $user
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteUserRequest $request, User $user)
    {
        $this->service->deleteUser($user);

        return redirect()->route('admin.users.index')->withFlashSuccess(__('The user was successfully deleted.'));
    }

    public function pendingUsers( Request $request )
    {
        if ($request->ajax()) {

            $data = $this->service->getPendingUserList();
            return Datatables::of($data)
                    ->addIndexColumn()  
                    ->addColumn('status', function($row){
     
                        if( $row['status'] == 1 ) return 'Active';
                        else if( $row['status'] == 0 ) return 'In-active';
                        else if( $row['status'] == 3 ) return 'Blocked';
    
                    })
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="accept_user_request/'.$row['id'].'" class="edit btn btn-primary btn-sm"> Accept Request </a>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view( $this->directory.'pending_users');
    }

    public function acceptRequest( User $user )
    {
        $this->service->acceptRequest( $user );
        return redirect()->route('admin.users.index')->withFlashSuccess(__('The user request is accepted successfully.'));
    }

}
