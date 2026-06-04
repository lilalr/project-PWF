<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Perfume',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ]
        );

        // Customer user
        $customer = User::updateOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'Customer User',
                'password' => bcrypt('password'),
                'role' => 'customer'
            ]
        );

        // Categories
        $catEdc = \App\Models\Category::firstOrCreate(['name' => 'EDC (Eau de Cologne)']);
        $catEdt = \App\Models\Category::firstOrCreate(['name' => 'EDT (Eau de Toilette)']);
        $catEdp = \App\Models\Category::firstOrCreate(['name' => 'EDP (Eau de Parfum)']);

        // Products
        \App\Models\Product::updateOrCreate(
            ['name' => 'Radiance'],
            [
                'description' => 'A radiant, uplifting floral fragrance featuring fresh notes of violet leaves, warm dry amber, and delicate jasmine petals.',
                'scent_notes' => 'Violets, Amber & Jasmine',
                'longevity' => '6-8 Hours',
                'price' => 120.00,
                'stock' => 10,
                'image' => 'images/perfume_radiance.png',
                'category_id' => $catEdt->id
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['name' => 'Enclaye'],
            [
                'description' => 'An earthy, sophisticated scent blending the deep notes of oakmoss with crisp Italian bergamot and warm patchouli.',
                'scent_notes' => 'Oakmoss, Bergamot & Patchouli',
                'longevity' => '8-10 Hours',
                'price' => 120.00,
                'stock' => 15,
                'image' => 'images/perfume_enclaye.png',
                'category_id' => $catEdt->id
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['name' => 'Opulent'],
            [
                'description' => 'A rich, luxurious fragrance featuring sweet damask rose, warm saffron spices, and deep, mysterious oud wood.',
                'scent_notes' => 'Rose, Saffron & Oud Wood',
                'longevity' => '10-12 Hours',
                'price' => 120.00,
                'stock' => 8,
                'image' => 'images/perfume_opulent.png',
                'category_id' => $catEdp->id
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['name' => 'Eclipse'],
            [
                'description' => 'A dark, intriguing scent opening with sweet wild blackberries, leading into warm cedarwood and soft white musk.',
                'scent_notes' => 'Blackberry, Cedarwood & Musk',
                'longevity' => '6-8 Hours',
                'price' => 120.00,
                'stock' => 12,
                'image' => 'images/perfume_eclipse.png',
                'category_id' => $catEdc->id
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['name' => 'Velour'],
            [
                'description' => 'Introducing Velour, our signature fragrance. A sensual, powdery blend of cashmere musk and blooming wild roses.',
                'scent_notes' => 'Musk & Wild Rose',
                'longevity' => '8-10 Hours',
                'price' => 135.00,
                'stock' => 5,
                'image' => 'images/about_perfume.png',
                'category_id' => $catEdp->id
            ]
        );
    }
}
