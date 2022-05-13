<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('permissions')->insert([
            'name' => 'attendacen read',
            'slug' => 'attendacen_read',
        ]);
		
		DB::table('permissions')->insert([
            'name' => 'attendacen create',
            'slug' => 'attendacen_create',
        ]);
    }
}
