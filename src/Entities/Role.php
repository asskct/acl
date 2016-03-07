<?php

declare(strict_types=1);

namespace Asskct\Acl\Entities;

Class Role {

	protected $name;
	protected $permissions;

	public function __construct(string $name = null) 
	{
	    $this->name = $name;
	    $this->permissions = [];
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): Role
	{
		$this->name = $name;
		return $this;
	}

	public function getPermissions(): array
	{
		return $this->permissions;
	}

	public function addPermissions(Permission $permission): Role
	{
		$this->permissions[] = $permission;
		return $this;
	}

}