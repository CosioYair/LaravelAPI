<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\User::class, 5)->create();
       $this->createAdmin();
    }

    public function createAdmin(){
      $user = new User;
      $role = Role::create(['name' => 'administrador']);
      $user->name = "Admin";
      $user->email= "admin@admin.com";
      $user->password = bcrypt('admin');
      $user->save();
      $user->assignRole('administrador');
    }

}
