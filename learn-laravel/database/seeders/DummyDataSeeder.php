<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert dummy users
        DB::table('users')->insert([
            ['UserName' => 'John Doe', 'UserEmail' => 'john@example.com', 'UserPassword' => bcrypt('password123')],
            ['UserName' => 'Jane Smith', 'UserEmail' => 'jane@example.com', 'UserPassword' => bcrypt('password456')],
        ]);

        // Insert dummy products (referencing User_ID from 'users' table)
        DB::table('products')->insert([
            ['Product_Name' => 'Laptop', 'Product_Price' => 1500.00, 'Product_Quantity' => 10, 'User_ID' => 1],
            ['Product_Name' => 'Smartphone', 'Product_Price' => 800.00, 'Product_Quantity' => 15, 'User_ID' => 2],
        ]);

        // Insert dummy purchases (referencing Product_ID from 'products' table)
        DB::table('purchases')->insert([
            ['quantity' => 5, 'unitCost' => 1400.00, 'totalCost' => 7000.00, 'Product_ID' => 1],
            ['quantity' => 10, 'unitCost' => 750.00, 'totalCost' => 7500.00, 'Product_ID' => 2],
        ]);

        // Insert dummy sales (referencing Product_ID from 'products' table and User_ID from 'users' table)
        DB::table('sales')->insert([
            ['quantity' => 2, 'UniCost' => 1500.00, 'totalAmt' => 3000.00, 'Product_ID' => 1, 'User_ID' => 1], // Added User_ID for sales
            ['quantity' => 3, 'UniCost' => 800.00, 'totalAmt' => 2400.00, 'Product_ID' => 2, 'User_ID' => 2], // Added User_ID for sales
        ]);
    }
}
