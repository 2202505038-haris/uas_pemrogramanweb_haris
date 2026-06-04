<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;

Route::get('/alat/cetak-pdf', [AlatController::class, 'cetakPDF'])->name('alat.pdf');

Route::get('/dashboard', function () {
    return view('index');
})->name('dashboard');

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::resource('alat', AlatController::class);