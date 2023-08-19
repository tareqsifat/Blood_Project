<?php

namespace Database\Seeders;

use App\Models\Donor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DonorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $donors = Donor::all();
        
        foreach($donors as $donor){
            $user = new User();
            $user->mobile = $donor->phone;
            $user->name = $donor->name;
            $user->email = $donor->email;
            $user->role_id = 1;
            $user->donor_id = $donor->id;
            $user->save();
        }
    }
}
