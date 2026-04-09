<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo danh mục mẫu
        $categories = [
            ['name' => 'Điện thoại', 'description' => 'Điện thoại di động các loại'],
            ['name' => 'Laptop',     'description' => 'Máy tính xách tay'],
            ['name' => 'Máy tính bảng', 'description' => 'Tablet các hãng'],
            ['name' => 'Phụ kiện',   'description' => 'Tai nghe, sạc, cáp...'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Tạo sản phẩm mẫu
        $products = [
            ['name' => 'iPhone 15 Pro Max', 'price' => 34990000, 'quantity' => 20, 'category_id' => 1, 'description' => 'Apple iPhone 15 Pro Max 256GB'],
            ['name' => 'Samsung Galaxy S24', 'price' => 22990000, 'quantity' => 15, 'category_id' => 1, 'description' => 'Samsung Galaxy S24 8GB/256GB'],
            ['name' => 'MacBook Air M2',     'price' => 28990000, 'quantity' => 10, 'category_id' => 2, 'description' => 'Apple MacBook Air M2 2023'],
            ['name' => 'Dell XPS 15',        'price' => 35000000, 'quantity' => 8,  'category_id' => 2, 'description' => 'Dell XPS 15 OLED i7'],
            ['name' => 'iPad Pro M4',        'price' => 26990000, 'quantity' => 12, 'category_id' => 3, 'description' => 'Apple iPad Pro M4 11 inch'],
            ['name' => 'AirPods Pro 2',      'price' => 6490000,  'quantity' => 30, 'category_id' => 4, 'description' => 'Apple AirPods Pro thế hệ 2'],
            ['name' => 'Xiaomi 14 Ultra',    'price' => 19990000, 'quantity' => 18, 'category_id' => 1, 'description' => 'Xiaomi 14 Ultra Leica'],
            ['name' => 'Asus ROG Zephyrus',  'price' => 42000000, 'quantity' => 5,  'category_id' => 2, 'description' => 'Asus ROG Zephyrus G14 RTX 4060'],
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }
    }
}
