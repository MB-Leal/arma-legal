<?php

use Illuminate\Support\Facades\Route;

//Área de acesso aos usuários, aberta usando apenas sessão
Route::group(['middleware' => 'guest'], function () {
Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'index'])->name('site.index');
Route::get('/site/login', [App\Http\Controllers\Site\AssociadoController::class, 'store'])->name('site.login');
Route::get('/site/logout', [App\Http\Controllers\Site\AssociadoController::class, 'logout'])->name('site.logout');
Route::get('/site/infor', [App\Http\Controllers\Site\InforController::class, 'infor'])->name('site.infor');
Route::get('/site/catalogo', [App\Http\Controllers\Site\CatalogoController::class, 'index'])->name('site.catalogo');
Route::get('/site/detalhe/{id}', [App\Http\Controllers\Site\ArmaController::class, 'index'])->name('site.detalhe');
Route::get('/site/simulador/{id}', [App\Http\Controllers\Site\SimuladorController::class, 'show'])->name('site.simulador');
Route::post('/site/autorizacao', [App\Http\Controllers\Site\AutorizacaoController::class, 'index'])->name('site.autorizacao');
Route::any('/site/atualizarAssociado', [App\Http\Controllers\Site\AssociadoController::class, 'atualizarDadosReq'])->name('site.atualizarAssociado');

Route::get('/site/atualizar', [App\Http\Controllers\Site\AssociadoController::class, 'atualizarLogin'])->name('site.updatelogin');
Route::any('/site/atualizarEdit', [App\Http\Controllers\Site\AssociadoController::class, 'updateDadosAssoc'])->name('site.updateAction');

Route::any('/site/atualizar', [App\Http\Controllers\Site\AssociadoController::class, 'pesquisarAssoc'])->name('site.pesquisarAssoc');
Route::any('/site/impressao', [App\Http\Controllers\Site\AutorizacaoController::class, 'impressao'])->name('site.impressao');
});

//Rotas de redirecionamento
Route::redirect('/admin', '/admin/login');
//Route::redirect('/site', '/site/login');
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'loginAction'])->name('admin.loginAction');


//Área Administrativa do site, acesso restrito
Route::middleware('auth')->group(function () {

    Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
    Route::get('/admin/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::any('/admin/usuario', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.usuario');
    Route::any('/admin/cadUsuario', [App\Http\Controllers\Admin\LoginController::class, 'register'])->name('admin.cadUser');
    Route::get('/admin/editar/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.editUser');
    Route::post('/admin/editarUsuario', [App\Http\Controllers\Admin\UserController::class, 'editar'])->name('admin.updateUser');
    Route::any('/admin/excluir/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.deletarUser');
    Route::get('/admin/listaUsuarios', [App\Http\Controllers\Admin\UserController::class, 'listUser'])->name('admin.usuarioList');

    Route::any('/admin/arma', [App\Http\Controllers\Admin\ArmaController::class, 'index'])->name('admin.arma');
    Route::get('/admin/editarArma/{id}', [App\Http\Controllers\Admin\ArmaController::class, 'show'])->name('admin.editarArma');
    Route::any('/admin/editarArma', [App\Http\Controllers\Admin\ArmaController::class, 'edit'])->name('admin.salvarEdicao');
    Route::any('/admin/desativarArma/{id}', [App\Http\Controllers\Admin\ArmaController::class, 'desativarArma'])->name('admin.desativar');

    Route::any('/admin/cadastrarArma', [App\Http\Controllers\Admin\ArmaController::class, 'salvar'])->name('admin.cadArma');
    Route::get('/admin/listadearmas', [App\Http\Controllers\Admin\ArmaController::class, 'listarArma'])->name('admin.armaList');

    Route::get('/admin/infor', [App\Http\Controllers\Admin\HomeController::class, 'infor'])->name('admin.infor');

    Route::get('/admin/catalogo', [App\Http\Controllers\Admin\CatalogoController::class, 'index'])->name('admin.catalogo');
    Route::get('/admin/detalhe/{id}', [App\Http\Controllers\Admin\ArmaController::class, 'armaDetalhes'])->name('admin.armaDetalhes');
    Route::get('/admin/simulador/{id}', [App\Http\Controllers\Admin\ArmaController::class, 'simulacao'])->name('admin.simulador');
    Route::post('/admin/autorizacao', [App\Http\Controllers\Admin\ArmaController::class, 'autorizacao'])->name('admin.autorizacao');
    Route::any('/admin/atualizar', [App\Http\Controllers\Admin\AssociadoController::class, 'edit'])->name('admin.updateAssoc');
    Route::post('/admin/impressao', [App\Http\Controllers\Admin\RequerimentoController::class, 'impressao'])->name('admin.impressao');
    Route::any('/admin/detalheReq/{id}', [App\Http\Controllers\Admin\RequerimentoController::class, 'detalheReq'])->name('admin.detalheReq');
    Route::post('/admin/exibirRequerimento', [App\Http\Controllers\Admin\RequerimentoController::class, 'exibirRequerimento'])->name('admin.exibirRequerimento');

    Route::any('/admin/associado', [App\Http\Controllers\Admin\AssociadoController::class, 'index'])->name('admin.associado');
    Route::any('/admin/salvarassociado', [App\Http\Controllers\Admin\AssociadoController::class, 'salvar'])->name('admin.adicionarAssociado');
    Route::any('/admin/adicionarAssociado', [App\Http\Controllers\Admin\AssociadoController::class, 'newAssoc'])->name('admin.newAssociado');
    Route::get('/admin/editarAssociado/{id}', [App\Http\Controllers\Admin\AssociadoController::class, 'show'])->name('admin.editarAssoc');
    Route::any('/admin/editarAssoc', [App\Http\Controllers\Admin\AssociadoController::class, 'edit'])->name('admin.editAction');
    Route::any('/admin/editarAssociado', [App\Http\Controllers\Admin\AssociadoController::class, 'editarAssociado'])->name('admin.editAssociado');



    Route::any('/admin/cadastro', [App\Http\Controllers\Admin\AssociadoController::class, 'salvar'])->name('admin.cadAssoc');
    Route::any('/admin/deletar/{id}', [App\Http\Controllers\Admin\AssociadoController::class, 'deletar'])->name('admin.deletarAssoc');
    Route::get('/admin/listadeassociados', [App\Http\Controllers\Admin\AssociadoController::class, 'listarAssociado'])->name('admin.associadoList');
    Route::get('/admin/detalheAssociado/{id}', [App\Http\Controllers\Admin\AssociadoController::class, 'detalharAssociado'])->name('admin.detalheAssoc');


    Route::get('/admin/requerimento', [App\Http\Controllers\Admin\RequerimentoController::class, 'index'])->name('admin.requerimento');
    Route::get('/admin/requerimento/detalhe', [App\Http\Controllers\Admin\RequerimentoController::class, 'show'])->name('admin.reqDetalhe');
});
