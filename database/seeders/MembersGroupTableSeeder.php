<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('member_groups')->insert([
            'id' => 1,
            'group_name' => 'User'
        ]);
        DB::table('member_groups')->insert([
            'group_name' => 'FLM'
        ]);
        DB::table('member_groups')->insert([
            'group_name' => 'Singles'
        ]);
        DB::table('member_groups')->insert([
            'group_name' => 'Club 50+'
        ]);
        DB::table('member_groups')->insert([
            'group_name' => 'Small Kids'
        ]);
        DB::table('member_groups')->insert([
            'group_name' => 'Big Kids'
        ]);
        DB::table('member_groups')->insert([
            'group_name' => 'Campus'
        ]);
    }
}
