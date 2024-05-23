<?php

use App\Models\User;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Http\Kernel;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{
    protected User $authenticatedUser;
    protected $response;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        parent::setUp();
        putenv('DB_CONNECTION=sqlite');
        putenv('DB_DATABASE=:memory:');
        putenv('APP_ENV=testing');
        $this->artisan('migrate');
        $this->seed(DatabaseSeeder::class);
    }

    /**
     * @Given un :usuario
     */
    public function un($usuario)
    {

        if ($usuario == 'usuario autenticado') {
            $this->authenticatedUser = User::all()->first();
        } elseif ($usuario == 'usuario no autenticado') {
            // No crear usuario
        }
    }

    /**
     * @Given que soy un :usuario
     */
    public function queSoyUn($usuario)
    {

        if ($usuario == 'usuario autenticado') {
            // Autenticar al usuario
            $this->response = $this->actingAs($this->authenticatedUser);
        } else if ($usuario == 'usuario no autenticado') {
            // No hacer nada, el usuario no está autenticado
        }
    }

    /**
     * @When intento crear un :servicio
     */
    public function intentoCrearUn($servicio)
    {

        $this->response = $this->actingAs($this->authenticatedUser)->post('/servicios', [
            'title' => 'Usuario no autenticado crea servicio test',
            'description' => 'Servicio test',
            'price' => '100',
            'image' => \Illuminate\Http\UploadedFile::fake()->image('image.jpg', 500),
            'category' => 'Deportes',
            'status' => '1',
            'creator_id' => $this->authenticatedUser->creator->id,
        ]);
    }

    /**
     * @Then soy redirigido a la página de publicaciones
     */
    public function soyRedirigidoALaPaginaDePublicaciones()
    {
        $this->response->assertStatus(302);
    }

    /**
     * @Then el :servicio es creado
     */
    public function elEsCreado($servicio)
    {
        $this->assertDatabaseHas('servicios', [
            'title' => 'Usuario no autenticado crea servicio test',
        ]);
    }
}
