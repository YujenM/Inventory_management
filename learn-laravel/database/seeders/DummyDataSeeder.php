<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert dummy users (only 5 users)
        DB::table('users')->insert([
            ['user_name' => 'Yujen Maharjan', 'user_email' => 'maharjanyuzen@gmail.com', 'user_password' => bcrypt('Iambatman@123')],
            ['user_name' => 'Aadarsh Shrestha', 'user_email' => 'aadhu@gmail.com', 'user_password' => bcrypt('Iamrobin@123')],
            ['user_name' => 'Lasata Dangon', 'user_email' => 'lasata@gmail.com', 'user_password' => bcrypt('Iamlasata@123')],
            ['user_name' => 'Sachin Ranjit', 'user_email' => 'sachin@gmail.com', 'user_password' => bcrypt('Iamsachin@123')],
            ['user_name' => 'Shaswat Man Singh', 'user_email' => 'shaswat@gmail.com', 'user_password' => bcrypt('Iamshaswat@123')],
        ]);

        // Insert dummy products (referencing user_id from 'users' table)
        DB::table('products')->insert([
            ['product_name' => 'Laptop', 'product_price' => 1500.00, 'product_quantity' => 10, 'user_id' => 1],
            ['product_name' => 'Smartphone', 'product_price' => 800.00, 'product_quantity' => 15, 'user_id' => 2],
            ['product_name' => 'Headphones', 'product_price' => 150.00, 'product_quantity' => 30, 'user_id' => 3],
            ['product_name' => 'Smartwatch', 'product_price' => 200.00, 'product_quantity' => 25, 'user_id' => 4],
            ['product_name' => 'Tablet', 'product_price' => 500.00, 'product_quantity' => 12, 'user_id' => 5],
            ['product_name' => 'Gaming Mouse', 'product_price' => 75.00, 'product_quantity' => 40, 'user_id' => 1],
            ['product_name' => 'Mechanical Keyboard', 'product_price' => 120.00, 'product_quantity' => 20, 'user_id' => 2],
        ]);

        // Insert dummy purchases (referencing product_id from 'products' table)
        DB::table('purchases')->insert([
            ['quantity' => 5, 'unit_cost' => 1400.00, 'total_cost' => 7000.00, 'product_id' => 1],
            ['quantity' => 10, 'unit_cost' => 750.00, 'total_cost' => 7500.00, 'product_id' => 2],
            ['quantity' => 20, 'unit_cost' => 100.00, 'total_cost' => 2000.00, 'product_id' => 3],
            ['quantity' => 15, 'unit_cost' => 180.00, 'total_cost' => 2700.00, 'product_id' => 4],
            ['quantity' => 8, 'unit_cost' => 450.00, 'total_cost' => 3600.00, 'product_id' => 5],
            ['quantity' => 12, 'unit_cost' => 70.00, 'total_cost' => 840.00, 'product_id' => 6],
            ['quantity' => 10, 'unit_cost' => 110.00, 'total_cost' => 1100.00, 'product_id' => 7],
        ]);

        // Insert dummy sales (referencing product_id and user_id)
        DB::table('sales')->insert([
            ['quantity' => 2, 'unit_cost' => 1500.00, 'total_amount' => 3000.00, 'product_id' => 1, 'user_id' => 1],
            ['quantity' => 3, 'unit_cost' => 800.00, 'total_amount' => 2400.00, 'product_id' => 2, 'user_id' => 2],
            ['quantity' => 5, 'unit_cost' => 150.00, 'total_amount' => 750.00, 'product_id' => 3, 'user_id' => 3],
            ['quantity' => 4, 'unit_cost' => 200.00, 'total_amount' => 800.00, 'product_id' => 4, 'user_id' => 4],
            ['quantity' => 2, 'unit_cost' => 500.00, 'total_amount' => 1000.00, 'product_id' => 5, 'user_id' => 5],
            ['quantity' => 6, 'unit_cost' => 75.00, 'total_amount' => 450.00, 'product_id' => 6, 'user_id' => 1],
            ['quantity' => 5, 'unit_cost' => 120.00, 'total_amount' => 600.00, 'product_id' => 7, 'user_id' => 2],
        ]);
    }
}
