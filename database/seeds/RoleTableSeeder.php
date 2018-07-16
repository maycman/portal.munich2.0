<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [['name'=>'admin', 'description'=>'Administrator'],['name'=>'service', 'description'=>'User for service']];

        foreach ($roles as $key => $rol) {
             Role::saveRole($rol);
        }


        $role = new Role();
        $role->name = 'sellers';
        $role->description = 'User for sellers';
        $role->save();
       
        Role::saveRole([ 'name'=>'viewer','description'=>'Only Read' ]);
    }
}
