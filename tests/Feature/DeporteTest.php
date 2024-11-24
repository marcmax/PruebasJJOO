<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Deportes; 
class DeporteTest extends TestCase
{  use RefreshDatabase;
      /** @test */
      public function test_getter_nombre()
      {
        $Deportes = new Deportes();
        $this->assertModelExists($Deportes);
      }
}
