<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
            'nombre' => 'Admin',
            'descripcion' => 'Tiene acceso a la administracion del sistema',
            ],
            [
            'nombre' => 'Organizador',
            'descripcion' => 'Puede crear eventos, contratar paquete de Fotografos e invitar al catalogo',
            ],[
            'nombre' => 'Fotografo',
            'descripcion' => 'Puede crear paquetes, aceptar solicitudes y subir fotos al catalogo',
            ],[
            'nombre' => 'Invitado',
            'descripcion' => 'Puede ver el catalogo y comprar las fotos que desee',
            ],
        ]);
    }
}
