<?php declare(strict_types=1);

namespace Smack\Routing;

class Match implements MatchInterface
{
	protected $handler;
	protected $params;
	protected $route;

	public function __construct($handler, array $params, RouteInterface $route)
	{
		$this->handler = $handler;
		$this->params = $params;
		$this->route = $route;
	}

	public function getHandler()
	{
		return $this->handler;
	}

	public function getParams():array
	{
		return $this->params;
	}

	public function getRoute():RouteInterface
	{
		return $this->route;
	}
}