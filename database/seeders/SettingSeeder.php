<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $attributes = [
            [
                'key' => 'address',
                'value' => 'г. Симферополь, ул. Крылова, 55'
            ],
            [
                'key' => 'phone',
                'value' => '+79781234567'
            ],
            [
                'key' => 'work_time',
                'value' => 'c 10 до 17'
            ],
            [
                'key' => 'vk',
                'value' => 'https://vk.com/'
            ],
            [
                'key' => 'telegram',
                'value' => 'https://t.me'
            ]
            
        ];
        foreach ($attributes as $attribute){
            Setting::updateOrCreate(
                [
                    'key' => $attribute['key']
                ],
                [
                    'value' => $attribute['value']
                ]
            );
        }
    }
}
