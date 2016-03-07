<?php

declare(strict_types=1);

namespace Asskct\Acl;

use Asskct\Acl\Entities\Role;
use Asskct\Acl\Contracts\UserAcl;

Class Acl 
{
	protected $roles;
	protected $user;

	public function __construct(Array $roles) 
	{
		foreach ($roles as $role) {
			if(!$role instanceof Role) {
				throw new \InvalidArgumentException("Invalid Role");				
			}
		}
		$this->roles = $roles;
	}

	public function setUser(UserAcl $user): Acl
	{
		$this->user = $user;
		return $this;
	}

	public function hasPermission(string $role, string $permission): bool
	{
		foreach ($this->roles as $r) {
			if($r->getName() == $role) {
				foreach ($r->getPermissions() as $p) {
					if($p->getName() == $permission) {
						return true;
					}
				}							
			}
		}
		return false;

	}

	public function can(string $permission, UserAcl $user = null): bool
	{
		if($user) {
			return $this->hasPermission($user->getRole(), $permission);
		}
		if($this->user) {
			return $this->hasPermission($this->user->getRole(), $permission);
		}

		return false;
	}

	public function cannot(string $permission, UserAcl $user = null): bool
	{
      return !$this->can($permission, $user);
	}

}