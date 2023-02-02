<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=['name'=>'松本'];
        Tag::create($param);
        $param=[
            'name'=> '橋本'
        ];
        Tag::create($param);
        $param=[
            'name'=> '村本'
        ];
        Tag::create($param);
        $param=[
            'name'=> '吉川'
        ];
        Tag::create($param);
        $param=[
            'name'=> '村西'
        ];
        Tag::create($param);    
    }
}
