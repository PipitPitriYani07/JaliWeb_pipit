<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRekeningBankRequest;
use App\Models\Bank;
use App\Models\RekeningBank;
use Illuminate\Http\Request;

class AccountBankController extends Controller
{
    public function index()
    {
        return view('account-bank.index', [
            'title' => 'Rekening Bank',
            'accounts' => RekeningBank::with('bank')->get(),
        ]);
    }

    public function form($id = null)
    {
        return view('account-bank.form', [
            'title' => 'Form Rekening Bank',
            'data' => RekeningBank::query()->find($id),
            'banks' => Bank::all(),
        ]);
    }

    public function store(FormRekeningBankRequest $request)
    {
        if ($request->id) {
            RekeningBank::query()->where('id_rekening_bank', $request->id)->update($request->validated());
        } else {
            RekeningBank::query()->create($request->validated());
        }
        return redirect('banks/account')->with('success', 'Berhasil menyimpan data');
    }

    public function destroy($id)
    {
        RekeningBank::query()->where('id_rekening_bank', $id)->delete();
        return redirect('banks/account')->with('success', 'Berhasil menghapus data');
    }


}
