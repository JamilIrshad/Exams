<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'test@tecspine.com',
            'password' => Hash::make('test1234'),
        ]);

        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@tecspine.com',
            'password' => Hash::make('test1234'),
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@tecspine.com',
            'password' => Hash::make('admin1234'),
            'is_admin' => 1,
        ]);

        User::factory()->create([
            'name' => 'Test User3',
            'email' => 'test3@tecspine.com',
            'password' => Hash::make('test1234'),
        ]);

        User::factory()->create([
            'name' => 'Test User4',
            'email' => 'test4@tecspine.com',
            'password' => Hash::make('test1234'),
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

        // Initialize Faker
        $faker = \Faker\Factory::create();

        //Exams Seeder
        DB::table('exams')->insert([
            'name' => 'Associate Cloud Engineer',
            'exam_date' => '2024-12-01',
            'category_id' => 1,
            'description' => 'Associate Cloud Engineer exam tests your ability to deploy applications, monitor operations, and maintain cloud projects on Google Cloud Platform.',
            'price' => 125.00,
            'image_path' => 'exams/1726840190.png',
        ]);
        //also add this exam into stripe as a price id

        DB::table('exams')->insert([
            'name' => 'Professional Cloud Architect',
            'exam_date' => '2024-10-05',
            'category_id' => 1,
            'description' => 'Professional cloud architect exam tests your ability to deploy applications, monitor operations, and maintain cloud projects on Google Cloud Platform.',
            'price' => 325.44,
            'image_path' => 'exams/1726840200.png',
        ]);

        DB::table('exams')->insert([
            'name' => 'Terraform',
            'exam_date' => '2024-10-25',
            'category_id' => 4,
            'description' => 'Terraform exam tests your ability to deploy applications, monitor operations, and maintain cloud projects using terraform on Google Cloud Platform.',
            'price' => 225.00,
            'image_path' => 'exams/1726840208.webp',
        ]);

        DB::table('exams')->insert([
            'name' => 'Professional Solutions Architect',
            'exam_date' => '2025-01-01',
            'category_id' => 2,
            'description' => 'Prodessional Solutions Architect exam tests your ability to deploy applications, monitor operations, and maintain cloud projects on Amazon Web Services.',
            'price' => 125.00,
            'image_path' => 'exams/1726840217.png',
        ]);

        // Questions for exam_id 1
        DB::table('questions')->insert([
            'question' => 'Which service is used for deploying applications on Google Cloud Platform?',
            'exam_id' => 1,
            'option1' => 'App Engine',
            'option2' => 'EC2',
            'option3' => 'Azure App Service',
            'option4' => 'Lambda',
            'correct_answer' => '1',
        ]);

        DB::table('questions')->insert([
            'question' => 'What is the primary function of Google Cloud Storage?',
            'exam_id' => 1,
            'option1' => 'Data warehousing',
            'option2' => 'Object storage',
            'option3' => 'Compute services',
            'option4' => 'Networking',
            'correct_answer' => '2',
        ]);

        DB::table('questions')->insert([
            'question' => 'Which Google Cloud service is used for machine learning?',
            'exam_id' => 1,
            'option1' => 'BigQuery',
            'option2' => 'Compute Engine',
            'option3' => 'AI Platform',
            'option4' => 'Cloud Functions',
            'correct_answer' => '3',
        ]);

        // Questions for exam_id 2
        DB::table('questions')->insert([
            'question' => 'What is a key responsibility of a Professional Cloud Architect?',
            'exam_id' => 2,
            'option1' => 'Managing physical servers',
            'option2' => 'Designing and planning cloud solution architecture',
            'option3' => 'Writing desktop applications',
            'option4' => 'Maintaining local databases',
            'correct_answer' => '2',
        ]);

        DB::table('questions')->insert([
            'question' => 'Which Google Cloud service is used for data warehousing?',
            'exam_id' => 2,
            'option1' => 'BigQuery',
            'option2' => 'Cloud Storage',
            'option3' => 'Compute Engine',
            'option4' => 'App Engine',
            'correct_answer' => '1',
        ]);

        DB::table('questions')->insert([
            'question' => 'What is the primary use of Google Kubernetes Engine?',
            'exam_id' => 2,
            'option1' => 'Hosting static websites',
            'option2' => 'Managing containerized applications',
            'option3' => 'Running virtual machines',
            'option4' => 'Storing large datasets',
            'correct_answer' => '2',
        ]);

        // Questions for exam_id 3
        DB::table('questions')->insert([
            'question' => 'What is Terraform primarily used for?',
            'exam_id' => 3,
            'option1' => 'Application development',
            'option2' => 'Infrastructure as Code',
            'option3' => 'Database management',
            'option4' => 'Network monitoring',
            'correct_answer' => '2',
        ]);

        DB::table('questions')->insert([
            'question' => 'Which language is used to write Terraform configuration files?',
            'exam_id' => 3,
            'option1' => 'Python',
            'option2' => 'HCL',
            'option3' => 'JavaScript',
            'option4' => 'Ruby',
            'correct_answer' => '2',
        ]);

        DB::table('questions')->insert([
            'question' => 'What is a Terraform provider?',
            'exam_id' => 3,
            'option1' => 'A plugin that allows Terraform to interact with cloud providers',
            'option2' => 'A service for hosting Terraform configurations',
            'option3' => 'A tool for monitoring Terraform deployments',
            'option4' => 'A library for writing Terraform scripts',
            'correct_answer' => '1',
        ]);

        // Questions for exam_id 4
        DB::table('questions')->insert([
            'question' => 'What is the primary responsibility of a Professional Solutions Architect?',
            'exam_id' => 4,
            'option1' => 'Developing mobile applications',
            'option2' => 'Designing and deploying scalable solutions on AWS',
            'option3' => 'Managing on-premises servers',
            'option4' => 'Writing SQL queries',
            'correct_answer' => '2',
        ]);

        DB::table('questions')->insert([
            'question' => 'Which AWS service is used for object storage?',
            'exam_id' => 4,
            'option1' => 'Amazon S3',
            'option2' => 'Amazon RDS',
            'option3' => 'Amazon EC2',
            'option4' => 'Amazon VPC',
            'correct_answer' => '1',
        ]);

        DB::table('questions')->insert([
            'question' => 'What is the purpose of AWS CloudFormation?',
            'exam_id' => 4,
            'option1' => 'Monitoring cloud resources',
            'option2' => 'Automating the provisioning of infrastructure',
            'option3' => 'Managing user access',
            'option4' => 'Hosting web applications',
            'correct_answer' => '2',
        ]);

        // Multi-answer questions for exam_id 1
        DB::table('questions')->insert([
            'question' => 'Which of the following are Google Cloud Platform services? (Select all that apply)',
            'exam_id' => 1,
            'option1' => 'App Engine',
            'option2' => 'EC2',
            'option3' => 'BigQuery',
            'option4' => 'Azure App Service',
            'correct_answer' => '1,3',
        ]);

        // Multi-answer questions for exam_id 2
        DB::table('questions')->insert([
            'question' => 'Which of the following are responsibilities of a Professional Cloud Architect? (Select all that apply)',
            'exam_id' => 2,
            'option1' => 'Designing cloud solutions',
            'option2' => 'Managing physical servers',
            'option3' => 'Ensuring security and compliance',
            'option4' => 'Writing desktop applications',
            'correct_answer' => '1,3',
        ]);

        // Multi-answer questions for exam_id 3
        DB::table('questions')->insert([
            'question' => 'Which of the following are features of Terraform? (Select all that apply)',
            'exam_id' => 3,
            'option1' => 'Infrastructure as Code',
            'option2' => 'Configuration Management',
            'option3' => 'Resource Graph',
            'option4' => 'Continuous Integration',
            'correct_answer' => '1,3',
        ]);

        // Multi-answer questions for exam_id 4
        DB::table('questions')->insert([
            'question' => 'Which of the following AWS services are used for compute? (Select all that apply)',
            'exam_id' => 4,
            'option1' => 'Amazon EC2',
            'option2' => 'Amazon S3',
            'option3' => 'AWS Lambda',
            'option4' => 'Amazon RDS',
            'correct_answer' => '1,3',
        ]);

        //add 30 exams with examfactory
        $exams = Exam::factory(30)->create();
    }
}
