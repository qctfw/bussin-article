<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->dataCategories() as $category) {
            $slug = Str::slug($category);

            $check_category = Category::where('slug', $slug)->first();

            if (is_null($check_category))
            {
                Category::create([
                    'name' => $category,
                    'slug' => $slug
                ]);
            }
        }
    }

    public function dataCategories()
    {
        return ['Berita', 'Teknologi', 'Kesehatan', 'Sosial', 'Internasional', 'Budaya'];
    }
}
