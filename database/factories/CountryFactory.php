<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    public function definition(): array
    {
        return [
            "id" => 1,
            "capital" => "Brasilia",
            "citizenship" => "Brasileiro",
            "country_code" => "076",
            "currency" => "real (pl. reais)",
            "currency_code" => "BRL",
            "currency_sub_unit" => "centavo",
            "full_name" => "Republica Federativa do Brasil",
            "iso_3166_2" => "BR",
            "iso_3166_3" => "BRA",
            "name" => "Brazil",
            "region_code" => "019",
            "sub_region_code" => "005",
            "eea" => false,
            "calling_code" => "55",
            "currency_symbol" => "R$",
            "currency_decimals" => "2",
            "flag" => "BR.png"
        ];
    }
}
