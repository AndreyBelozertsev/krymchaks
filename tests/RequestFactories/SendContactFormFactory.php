<?php

namespace Tests\RequestFactories;

use Worksome\RequestFactories\RequestFactory;

class SendContactFormFactory extends RequestFactory
{
    public function definition(): array
    {
        return [
          'name' => fake()->name(),
          'email' => 'info.rakurs@bk.ru',
          'message' => fake()->paragraph(),
          'agree' => true

        ];
    }
}