<?php declare(strict_types=1);

namespace Smack\Routing;

interface MatchInterface
{
	public function getHandler();
	public function getParams():array;
	public function getRoute():RouteInterface;
}