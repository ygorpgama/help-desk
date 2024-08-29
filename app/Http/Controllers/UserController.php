<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Group;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.users', [
            "users" => $this->userService->findAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.user-create', [
            "groups" => Group::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        try {
            $this->userService->create($request->toArray());
            return redirect()->route('admin.users.index')->with(['success', 'Usuário criado com sucesso']);
        } catch (\Throwable $th) {

            dd($th);
            return redirect()->route('admin.users.create')->with(['failed', 'Ocorreu um erro na criação de usuário tente novamente mais tarde']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
