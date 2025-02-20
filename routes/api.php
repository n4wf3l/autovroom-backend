<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/status', function () {
    return response()->json(['status' => 'API is working!']);
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']); // Liste tous les produits
    Route::post('/', [ProductController::class, 'store']); // Ajouter un produit
    Route::get('/{id}', [ProductController::class, 'show']); // Voir un produit
    Route::put('/{id}', [ProductController::class, 'update']); // Mettre à jour un produit
    Route::delete('/{id}', [ProductController::class, 'destroy']); // Supprimer un produit
});

Route::get('/categories', [CategoryController::class, 'index']); // Lister les catégories
Route::post('/categories', [CategoryController::class, 'store']); // Ajouter une catégorie