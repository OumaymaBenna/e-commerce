<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Sales; // Add this line at the top
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
class DashboardController extends Controller
{
// Dans DashboardController.php

public function index()
{
    $totalUsers = User::count();
    $totalProducts = Product::count();
    $totalOrders = Order::count();
 // Calcul du total des revenus
 $totalRevenue = Order::sum(DB::raw('price * quantity'));
 $recentActivities = [
    ['icon' => 'file-alt', 'description' => 'Nouvelle commande passée', 'time' => 'Il y a 2 heures', 'type' => 'info'],
    ['icon' => 'shopping-cart', 'description' => 'Produit ajouté au panier', 'time' => 'Il y a 3 heures', 'type' => 'success'],
    // Ajoutez d'autres activités si nécessaire
];
 
return view('dashboard', compact('totalUsers', 'totalProducts', 'totalOrders', 'totalRevenue', 'recentActivities'));


    





}}