<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
	/** @test */
	public function division_given_operands(){
		$division = new \App\Calculator\Division;
		$division->setOperands([100,2]);

		$this->assertEquals(50, $division->calculate());
	}

	/** @test */
	public function removes_division_by_zero_operands(){
		$division = new \App\Calculator\Division;
		$division->setOperands([100,0,0,5,0]);

		$this->assertEquals(20, $division->calculate());
	}

	/** @test */
	public function no_operands_given_throws_exception_when_calculating(){
		 $this->expectException(\App\Calculator\Exceptions\NoOperandsException::Class);

		 $division = new \App\Calculator\Division;
		 $division->calculate();
	}

}
