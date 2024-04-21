<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //rutas de estudiante
Route::get('/Estudiantes',[EstudianteController::class,'index'])->name('estudiantes.index');
Route::post('/Estudiantes/store',[EstudianteController::class,'store'])->name('estudiantes.store');
Route::get('/Estudiantes/create',[EstudianteController::class,'create'])->name('estudiantes.create');
Route::delete('/Estudiantes/{estudiantes}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
Route::put('/Estudiantes/{estudiantes}',[EstudianteController::class,'update']) ->name('estudiantes.update');
Route::get('/Estudiantes/{estudiantes}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
});

//Rutas Cursos
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');


require __DIR__.'/auth.php';
