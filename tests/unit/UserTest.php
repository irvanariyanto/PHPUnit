<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
	public function testThatWeGetTheFirstName()
	{
		$user = new \App\Models\User;

		$user->setFirstName('Billy');

		$this->assertEquals($user->getFirstName(), 'Billy');
	}

	public function testThatWeGetTheLastName()
	{
		$user = new \App\Models\User;

		$user->setLastName('Garrett');

		$this->assertEquals($user->getLastName(), 'Garrett');
	}

	public function testThatFullNameIsReturned(){
		$user = new \App\Models\User;

		$user->setFirstName('Billy');
		$user->setLastName('Garrett');

		$this->assertEquals($user->getFullName(), 'Billy Garrett');
			
	}

	public function testFirstAndLastNameAreTrimmed(){
		$user = new \App\Models\User;

		$user->setFirstName('Billy    ');
		$user->setLastName('    Garrett');

		$this->assertEquals($user->getFirstName(), 'Billy');
		$this->assertEquals($user->getLastName(), 'Garrett');
	}

	public function testEmailAddressCanBeSet(){

		$user = new \App\Models\User;

		$user->setEmail('billy@codecourse.com');

		$this->assertEquals($user->getEmail(),'billy@codecourse.com');
	}

	public function testEmailVariableContainCorrectValues(){
		$user = new \App\Models\User;

		$user->setFirstName('Billy');
		$user->setLastName('Garrett');
		$user->setEmail('billy@codecourse.com');

		$emailVariables = $user->GetEmailVariables();

		$this->assertArrayHasKey('full_name',$emailVariables);
		$this->assertArrayHasKey('email',$emailVariables);

		$this->assertEquals($emailVariables['full_name'], 'Billy Garrett');
		$this->assertEquals($emailVariables['email'], 'billy@codecourse.com');
	}
}
