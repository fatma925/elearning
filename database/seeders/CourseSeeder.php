<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::first();
        $instructor = User::first();

        Course::create([
            'id' => Str::uuid(),
            'title' => 'Laravel',
            'slug' => 'laravel',
            'category_id' => $category->id,
            'instructor_id' => $instructor->id,
        ]);
    }
}
