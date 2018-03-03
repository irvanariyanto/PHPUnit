<?php

namespace App\Calculator;


class Calculator
{

	protected $operations=[];
	public function setOperation(OperationInterface $operation){
		$this->operations[]=$operation;
	}

	public function setOperations(array $operations){

		$filterOperations = array_filter($operations,function($operation){
			return $operation instanceof OperationInterface;
		});

		$this->operations = array_merge($this->operations, $filterOperations);
	}

	public function getOperations(){
		return $this->operations;
	}

	public function calculate(){
		$result = 0;

		if(count($this->operations ? : []) > 1){
			return array_map(function($operation){
				return $operation->calculate();
			}, $this->operations);
		}
		return $this->operations[0]->calculate();
	}
}