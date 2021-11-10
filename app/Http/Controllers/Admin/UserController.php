<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Client;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Process datatables ajax request.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function getData()
    {
        return Datatables::of(User::all())
            ->addColumn('action', function ($user) {
                $editRoute = route('users.edit', ['user' => $user->id]);
                $showRoute = route('users.show', ['user' => $user->id]);
                $action = '';
                $action .=
                    "<a href=\"{$editRoute}\" class=\"btn btn-info btn-sm float-left mr-1\" " .
                    "data-toggle=\"tooltip\" data-placement=\"top\" title=\"Редактирование\">\n" .
                    "<i class=\"fas fa-pencil-alt\"></i>\n" .
                    "</a>\n";
                $action .=
                    "<a href=\"{$showRoute}\" class=\"btn btn-info btn-sm float-left mr-1\" " .
                    "data-toggle=\"tooltip\" data-placement=\"top\" title=\"Просмотр\">\n" .
                    "<i class=\"fas fa-eye\"></i>\n" .
                    "</a>\n";
                return $action;
            })
            ->make(true);
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * @param StoreUserRequest $request
     * @return RedirectResponse
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $user->save();

        session()->flash('success', "Пользователь \"{$user->name}\" зарегистрирован");
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        return $this->edit($id, true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param bool $show
     * @return Application|Factory|View|Response
     */
    public function edit(int $id, bool $show = false)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user', 'show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function update(UpdateUserRequest $request, int $id)
    {
        $data = $request->all();
        if ($data['password'] == null) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }
        $user = User::findOrFail($id);
        $original = $user->name;
        $user->update($data);

        $changed = $user->wasChanged();

        if ($changed) {
            // TODO: Отправить письмо
            session()->flash('success',
                "Изменения пользователя &laquo;{$original}&raquo; сохранены<br/>" .
                "Письмо пользователю &laquo;{$original}&raquo; отправлено");
        }

        return redirect()->route('users.index');
    }

    public function loginForm()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Вы вошли в систему');
            return redirect()->route('admin.index');
        } else {
            session()->flash('error', 'Электронная почта / пароль неверны; вход в систему невозможен');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
}
