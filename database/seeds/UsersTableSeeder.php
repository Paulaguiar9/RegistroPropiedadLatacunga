<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email','info@propiedad.com')->first()) {
        	User::create([
	            'name' => 'Administrador',
	            'email' => 'info@propiedad.com',
	            'password' => Hash::make('123456'),
	            'perfil'=>'Admin',
	            'nombres'=>'nombres',
	            'apellidos'=>'apellidos',
	            'cedula'=>'cedula',
	            'telefono'=>'telefono',
	            'direccion'=>'direccion',
	            'sexo'=>true,
	            'edad'=>25,
	            'estado'=>true,
	            
	        ]);
        }
    }
}
