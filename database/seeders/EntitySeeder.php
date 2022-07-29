<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entities')->insert([
            [
                'name' => 'Oficina Lechería',
                'email'=>'test@gmail.com',
                'document_number'=>'J-154798963-1',
                'phone_number'=>'0281-5878654',
                'user_created_id' => 1
            ],
            [
                'name' => 'BOFA',
                'email'=>'test@gmail.com',
                'document_number'=>'J-154798963-1',
                'phone_number'=>'0281-5878654',
                'user_created_id' => 1
            ],
            [
                'name' => 'Chase Bank',
                'email'=>'test@gmail.com',
                'document_number'=>'J-154798963-1',
                'phone_number'=>'0281-5878654',
                'user_created_id' => 1
            ],
            [
                'name' => 'Citibank',
                'email'=>'test@gmail.com',
                'document_number'=>'J-154798963-1',
                'phone_number'=>'0281-5878654',
                'user_created_id' => 1
            ],
            [
                'name' => 'Henry González',
                'email'=>'test@gmail.com',
                'document_number'=>'J-154798963-1',
                'phone_number'=>'0281-5878654',
                'user_created_id' => 1
            ],
            [
                'name' => 'Kevin Contreras',
                'email'=>'test@gmail.com',
                'document_number'=>'J-154798963-1',
                'phone_number'=>'0281-5878654',
                'user_created_id' => 1
            ],
            [
                'name' => 'María Fernanda',
                'email'=>'test@gmail.com',
                'document_number'=>'J-154798963-1',
                'phone_number'=>'0281-5878654',
                'user_created_id' => 1
            ],
            [
                'name' => 'Oficina Miami',
                'email'=>'test@gmail.com',
                'document_number'=>'J-154798963-1',
                'phone_number'=>'0281-5878654',
                'user_created_id' => 1
            ],
            [
                'name' => 'Samiel Altuve',
                'email'=>'test@gmail.com',
                'document_number'=>'J-154798963-1',
                'phone_number'=>'0281-5878654',
                'user_created_id' => 1
            ],
            [
                'name' => 'Wells Fargo',
                'email'=>'test@gmail.com',
                'document_number'=>'J-154798963-1',
                'phone_number'=>'0281-5878654',
                'user_created_id' => 1
            ]
        ]);
    }
}
