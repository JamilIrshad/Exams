<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        //Category Seeder
        DB::table('categories')->insert([
            'name' => 'GCP',
            'description' => 'Google Cloud Platform',
        ]);

        DB::table('categories')->insert([
            'name' => 'AWS',
            'description' => 'Amazon Web Services',
        ]);

        DB::table('categories')->insert([
            'name' => 'Azure',
            'description' => 'Microsoft Azure',
        ]);

        DB::table('categories')->insert([
            'name' => 'Terraform',
            'description' => 'Terraform by HashiCorp',
        ]);

        //Exams Seeder
        DB::table('exams')->insert([
            'name' => 'Associate Cloud Engineer',
            'exam_date' => '2024-12-01',
            'category_id' => 2,
            'description' => 'Associate Cloud Engineer exam tests your ability to deploy applications, monitor operations, and maintain cloud projects on Google Cloud Platform.',
            'price' => 125.00,
            'image_path' => 'associate_cloud_engineer.png',
        ]);

        DB::table('exams')->insert([
            'name' => 'Professional Cloud Architect',
            'exam_date' => '2024-10-05',
            'category_id' => 2,
            'description' => 'Professional cloud architect exam tests your ability to deploy applications, monitor operations, and maintain cloud projects on Google Cloud Platform.',
            'price' => 325.44,
            'image_path' => 'associate_cloud_engineer.png',
        ]);

        DB::table('exams')->insert([
            'name' => 'Terraform',
            'exam_date' => '2024-10-25',
            'category_id' => 4,
            'description' => 'Terraform exam tests your ability to deploy applications, monitor operations, and maintain cloud projects using terraform on Google Cloud Platform.',
            'price' => 225.00,
            'image_path' => 'associate_cloud_engineer.png',
        ]);

        DB::table('exams')->insert([
            'name' => 'Professional Solutions Architect',
            'exam_date' => '2021-01-01',
            'category_id' => 1,
            'description' => 'Prodessional Solutions Architect exam tests your ability to deploy applications, monitor operations, and maintain cloud projects on Amazon Web Services.',
            'price' => 125.00,
            'image_path' => 'associate_cloud_engineer.png',
        ]);
    }
}
