<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //    $usernameValidator = function($userName) {
        //        $string = $userName;
        //        function startsWith ($string, $startString)
        //        {
        //        $len = strlen($startString);
        //        return (substr(startsWith ($string, 0, $len) === $startString);
        //        }
        //        return bool

        //        //have to bind call or this but laravel version to get scope right for validating faker data
        //    }
        // 'name' => 'required|string',
        // 'username' => 'required|string|starts_with:OG,O.G.,drPhill,Dr. Phill,DrPhill,lil,bigHomie,BigHomie,yung,Yung,Dr,Dr.,dr,Professor,professor,Sir,sir,Lord,lord,Shrek,shrek,getOuttaMySwamp|unique:App\Models\User,username',
        // 'email' => 'nullable|email|max:64|unique:App\Models|User,email_address',
        // 'password' => 'required|string|min:8',

        // ]);
        return [
            'name' => $this->faker->unique()->name,
            //valid()->
            'email' => $this->faker->unique()->safeEmail,
            //valid()->
            'password' => 'richHomieQuan', // password
            'username' => $this->faker->unique()->userName,
            //valid()->
            // 'remember_token' => Str::random(10),
            'profile_pic' => '',
            'cover_pic' => '',
            'favorites' => 0,
            'followers' => 0,
            'following' => 0
        ];
    }
}
