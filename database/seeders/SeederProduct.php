<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SeederProduct extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
            'name' => 'samsung mobile',
            'price' => 5000,
            'description' => 'Mobile with 64gb storage and 8gb ram and much more features.',
            'category'=> 'Mobile',
            'gallery' => 'https://media.istockphoto.com/id/1224713641/photo/samsung-galaxy-s-20-ultra-isolated-on-white-background.jpg?s=612x612&w=0&k=20&c=mStdi4Ubk2k9k8GuWcCFKAE5X3DH_ll-LaOsmfxGtPk=',
           ],

           [
            'name' => 'Smart TV',
            'price' => 2000,
            'description' => 'A smart tv with much more feature.',
            'category'=> 'Mobile',
            'gallery' => 'https://media.istockphoto.com/id/484737724/photo/old-television.jpg?s=612x612&w=0&k=20&c=YRy9uGefEEmbsQ-onF4bM8LYTQ4UqFajt3XJj9goC2s=',
           ],

           [
            'name' => 'LED',
            'price' => 4000,
            'description' => 'A tv with much more features.',
            'category'=> 'Mobile',
            'gallery' => 'https://cdn.shopify.com/s/files/1/0637/8369/8680/products/4d16624757fe283a02b6d64ee3efb339_673x.jpg?v=1652221631',
           ],

           [
            'name' => 'Fridge',
            'price' => 7000,
            'description' => 'smart fridge and best cooling and much more features.',
            'category'=> 'Mobile',
            'gallery' => 'https://www.shutterstock.com/image-photo/top-mount-refrigerator-isolated-on-260nw-1671001705.jpg',
           ],
        ]); 
    }
}
