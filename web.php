<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('welcome');
});


Route::get('/a-propos', function() {
    return 'A propos';
});

Route::get('/bonjour/{nom}', function() {
    $nom = request('nom');

    return view('bonjour', [
        'nom' => $nom,
    ]);
});

Route::get('/inscription', function(){
    return view('inscription');
});

Route::post('/inscription', function(){
    $utilisateur = App\Utilisateur::create([
        'email' => request('email'),
        'mot_de_passe' => bcrypt(request('password')),
    ]);

    return 'Formulaire reçu. Votre email est '. request('email').'.';
});