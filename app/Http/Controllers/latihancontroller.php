<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        return view('kalkulator');
    }

    public function hitung(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $operator = $request->operator;

        switch ($operator) {
            case '+':
                $hasil = $angka1 + $angka2;
                break;

            case '-':
                $hasil = $angka1 - $angka2;
                break;

            case '*':
                $hasil = $angka1 * $angka2;
                break;

            case '/':
                if ($angka2 == 0) {
                    return redirect()
                        ->back()
                        ->with('error', 'Tidak bisa membagi dengan angka 0.');
                }

                $hasil = $angka1 / $angka2;
                break;

            default:
                return redirect()
                    ->back()
                    ->with('error', 'Operator tidak valid.');
        }

        return view('kalkulator', compact(
            'angka1',
            'angka2',
            'operator',
            'hasil'
        ));
    }
}