<?php declare(strict_types=1);

namespace Smack\Routing;

interface RouterInterface
{
	public function getAll():array;
	public function route(string $method, string $uri):MatchInterface;
}
