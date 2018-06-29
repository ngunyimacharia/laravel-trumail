<?php
namespace Mashytski\Trumail\Tests;

use Trumail;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TrumailTest extends OrchestraTestCase
{

  protected function getEnvironmentSetUp($app)
  {
    $dotenv = new \Dotenv\Dotenv(__DIR__.'\..');
    $dotenv->load();
  }

  protected function getPackageProviders($app)
  {
    return ['Mashytski\Trumail\TrumailServiceProvider'];
  }

  protected function getPackageAliases($app)
  {
    return [
      'Trumail' => 'Mashytski\Trumail\Facades\Trumail'
    ];
  }

  /** @test */
  public function test_validator()
  {
    //Set loop number
    $loop = 10;
    //Loop testing various email address lookups
    for($i=0 ; $i<=$loop ; $i++){
      $response = Trumail::validate($this->getEmail());
      //Test response status code
      $this->assertEquals(200,$response->status);
      //Test response
      $this->assertObjectHasAttribute('status', $response);
      $this->assertObjectHasAttribute('isValid', $response);
    }
  }

  /**
  * Function to generate an email address to test
  * @var void
  * @return string
  */
  private function getEmail(){
    //Create faker
    $faker = \Faker\Factory::create();

    switch (rand(1,6)) {
      case 1:
      $email = $faker->email;
      break;
      case 2:
      $email = $faker->safeEmail;
      break;
      case 3:
      default:
      $email = $faker->freeEmail;
      break;
    };
    return $email;
  }

}
