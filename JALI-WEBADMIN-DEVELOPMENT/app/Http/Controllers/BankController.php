<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormBankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        return view('bank.index', [
            'title' => 'Bank',
            'banks' => Bank::all(),
        ]);
    }

    public function form($id = null)
    {
        return view('bank.form', [
            'title' => 'Form Bank',
            'data' => Bank::query()->find($id),
        ]);
    }

    public function store(FormBankRequest $request)
    {
        if ($request->id) {
            Bank::query()->where('id_bank', $request->id)->update($request->validated());
        } else {
            Bank::query()->create($request->validated());
        }
        return redirect('banks')->with('success', 'Berhasil menyimpan data');
    }

    public function destroy($id)
    {
        Bank::query()->where('id_bank', $id)->delete();
        return redirect('banks')->with('success', 'Berhasil menghapus data');
    }
}
