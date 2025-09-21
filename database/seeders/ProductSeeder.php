<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some sample categories first
        $categories = [
            ['name' => 'Electronics', 'description' => 'Electronic devices and gadgets'],
            ['name' => 'Clothing', 'description' => 'Fashion and apparel'],
            ['name' => 'Books', 'description' => 'Books and literature'],
            ['name' => 'Home & Garden', 'description' => 'Home improvement and garden supplies'],
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate(['name' => $categoryData['name']], $categoryData);
        }

        // Create sample products
        $products = [
            [
                'name' => 'Smartphone',
                'description' => 'Latest smartphone with advanced features',
                'price' => 699.99,
                'category_id' => Category::where('name', 'Electronics')->first()->id,
                'quantity' => 50,
                'is_featured' => true,
                'discount' => 0,
            ],
            [
                'name' => 'Laptop',
                'description' => 'High-performance laptop for work and gaming',
                'price' => 1299.99,
                'category_id' => Category::where('name', 'Electronics')->first()->id,
                'quantity' => 25,
                'is_featured' => true,
                'discount' => 10.00,
            ],
            [
                'name' => 'T-Shirt',
                'description' => 'Comfortable cotton t-shirt',
                'price' => 29.99,
                'category_id' => Category::where('name', 'Clothing')->first()->id,
                'quantity' => 100,
                'is_featured' => false,
                'discount' => 5.00,
            ],
            [
                'name' => 'Programming Book',
                'description' => 'Learn programming with this comprehensive guide',
                'price' => 49.99,
                'category_id' => Category::where('name', 'Books')->first()->id,
                'quantity' => 75,
                'is_featured' => true,
                'discount' => 0,
            ],
            [
                'name' => 'Garden Tools Set',
                'description' => 'Complete set of garden tools',
                'price' => 89.99,
                'category_id' => Category::where('name', 'Home & Garden')->first()->id,
                'quantity' => 30,
                'is_featured' => false,
                'discount' => 15.00,
            ],
        ];

        foreach ($products as $productData) {
            Product::firstOrCreate(['name' => $productData['name']], $productData);
        }
    }
}
