<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefeatRequest;
use App\Models\Defeat;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DefeatController extends Controller
{
    public function index()
    {
        $defeats = Defeat::orderBy('date_at', 'desc')->get();

        return view('defeats.index', ['defeats' => $defeats]);
    }

    public function create()
    {
        $users = User::all();

        return view('defeats.create', ['users' => $users]);
    }

    public function show(Defeat $defeat)
    {
        return view('defeats.show', ['defeat' => $defeat]);
    }

    public function store(DefeatRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try {
            $defeat = Defeat::create([
                'user_id' => $request->user_id,
                'harmed' => $request->harmed,
                'pain' => $request->pain,
                'date_at' => $request->date_at
            ]);

            DB::commit();

            Log::info('Derrota cadastrada', ['defeat_id' => $defeat->id]);

            return redirect()->route('defeat.index')->with('success', 'Derrota cadastrada com sucesso!');
        } catch (Exception $ex) {
            DB::rollBack();

            Log::error('Erro ao cadastrar Derrota:', ['error' => $ex->getMessage()]);

            return back()->withInput()->with('error', 'Erro ao cadastrar a derrota');
        }
    }

    public function edit(Defeat $defeat)
    {
        $users = User::all();

        return view('defeats.edit', ['defeat' => $defeat, 'users' => $users]);
    }

    public function update(DefeatRequest $request, Defeat $defeat)
    {
        $request->validated();

        DB::beginTransaction();

        try {
            $defeat->update([
                'user_id' => $request->user_id,
                'harmed' => $request->harmed,
                'pain' => $request->pain,
                'date_at' => $request->date_at
            ]);

            DB::commit();

            Log::info('Derrota atualizada', ['defeat_id' => $defeat->id]);

            return redirect()->route('defeat.index')->with('success', 'Derrota Atualizada com sucesso!');
        } catch (Exception $ex) {
            DB::rollBack();

            Log::error('Derrota não atualizada', ['error' => $ex->getMessage()]);

            return back()->withInput()->with('error', 'Erro ao atualizar a derrota');
        }
    }

    public function destroy(Defeat $defeat)
    {
        DB::beginTransaction();

        try {
            $defeat->delete();

            DB::commit();

            Log::info('Derrota excluída', ['defeat_id' => $defeat->id]);

            return redirect()->route('defeat.index')->with('success', 'Derrota excluída com sucesso!');
        } catch (Exception $ex) {
            DB::rollBack();

            Log::error('Erro ao excluir Derrota:', ['error' => $ex->getMessage()]);

            return back()->withInput()->with('error', 'Erro ao excluir a derrota');
        }
    }
}
