<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PublisherSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(AdminSeeder::class);
        $this->call(DiscountSeeder ::class);
        $this->call(AuthorSeeder ::class);
        $this->call(PublisherSeeder ::class);
        $this->call(FlashSaleSeeder ::class);
        $this->call(CategorySeeder ::class);
    }
}
