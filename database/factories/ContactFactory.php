<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            // Con esto estariamos creando una nueva organizacion, pero como ya tenemos
            // datos en la tabla vamos a indicar que rellene con valores aleatorios de
            // organizaciones
            //'organization_id' => OrganizationFactory::new()->create()->id
            // Obtenemos todos los registros de la tabla Organization, luego seleccionamos
            // un registro random y luego seleccionamos el id
            'organization_id' => Organization::all()->random()->id,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'city' => $this->faker->sentence(),
            'state' => $this->faker->state,
            'country_id' => Country::all()->random()->id,
            'postalCode' => $this->faker->postcode

        ];
    }
}
