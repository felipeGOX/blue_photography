<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = DB::table('users')->where('email', '=', 'admin@admin.com')->first();
        $adminRol = DB::table('roles')->where('nombre', '=', 'Admin')->first();
        if (!is_null($adminUser) && !is_null($adminRol)) {
            $row = DB::table('rol_usuarios')
                ->where('id_rol', '=', $adminRol->id)
                ->where('id_usuario', '=', $adminUser->id)->count();
            if ($row == 0)
                DB::table('rol_usuarios')->insert([
                    'id_usuario' => $adminUser->id,
                    'id_rol' => $adminRol->id
                ]);
        }
    }
}
