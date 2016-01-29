<?php declare(strict_types=1);

namespace Smack\Routing;

interface RouteInterface
{
	public function getMethod():string;
	public function getPattern():string;
	public function getHandler();
}