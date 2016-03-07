<?php

declare(strict_types=1);

namespace Asskct\Acl\Entities;

class Permission {

	protected $name;

	public function __contruct(string $name = null)
	{
		$this->name = $name;
	}

	public function getName() : string 
	{

		return $this->name;

	}

	public function setName(string $name) : Permission
	{

		$this->name = $name;
		return $this;

	}

}