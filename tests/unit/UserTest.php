<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
	protected $user;

	public function setUp(){
		$this->user = new \App\Models\User;
	}

	/** @test */
	public function that_we_get_the_first_name()
	{

		$this->user->setFirstName('Billy');

		$this->assertEquals($this->user->getFirstName(), 'Billy');
	}

	public function testThatWeGetTheLastName()
	{

		$this->user->setLastName('Garrett');

		$this->assertEquals($this->user->getLastName(), 'Garrett');
	}

	public function testThatFullNameIsReturned(){

		$this->user->setFirstName('Billy');
		$this->user->setLastName('Garrett');

		$this->assertEquals($this->user->getFullName(), 'Billy Garrett');
			
	}

	public function testFirstAndLastNameAreTrimmed(){

		$this->user->setFirstName('Billy    ');
		$this->user->setLastName('    Garrett');

		$this->assertEquals($this->user->getFirstName(), 'Billy');
		$this->assertEquals($this->user->getLastName(), 'Garrett');
	}

	public function testEmailAddressCanBeSet(){

		$this->user->setEmail('billy@codecourse.com');

		$this->assertEquals($this->user->getEmail(),'billy@codecourse.com');
	}

	public function testEmailVariableContainCorrectValues(){

		$this->user->setFirstName('Billy');
		$this->user->setLastName('Garrett');
		$this->user->setEmail('billy@codecourse.com');

		$emailVariables = $this->user->GetEmailVariables();

		$this->assertArrayHasKey('full_name',$emailVariables);
		$this->assertArrayHasKey('email',$emailVariables);

		$this->assertEquals($emailVariables['full_name'], 'Billy Garrett');
		$this->assertEquals($emailVariables['email'], 'billy@codecourse.com');
	}
}
