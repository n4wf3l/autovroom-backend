<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Récupérer tous les produits
     */
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    /**
     * Ajouter un nouveau produit
     */
    public function store(Request $request)
    {
        \Log::info("Données reçues : ", $request->all()); // 🛠 Debug
    
        $validator = Validator::make($request->all(), [
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'engine_type' => 'required|string',
            'part_name' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'category' => 'nullable|string',
            'chassis_number' => 'nullable|string',
            'reference_number' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }
    
        $productData = $request->all();
    
        if ($request->hasFile('photo')) {
            $productData['photo'] = $request->file('photo')->store('product_photos', 'public');
        }
    
        $product = Product::create($productData);
    
        return response()->json($product, 201);
    }
 

    /**
     * Afficher un produit spécifique
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }

        return response()->json($product, 200);
    }

    /**
     * Mettre à jour un produit
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }

        $product->update($request->all());

        return response()->json($product, 200);
    }

    /**
     * Supprimer un produit
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Produit supprimé avec succès'], 200);
    }
}
