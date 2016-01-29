<?php declare(strict_types=1);

namespace Smack\Routing;

use \Smack\Routing\Exception\RouteNotFoundException;
use \Smack\Routing\Exception\MethodNotAllowedException;

class Router implements RouterInterface
{
	protected $routes;

	public function add($method, $pattern, $handler)
	{
		$this->routes[] = new Route($method, $pattern, $handler);
		return $this;
	}

	public function addRoute(RouteInterface $route)
	{
		$this->routes[] = $route;
		return $this;
	}

	public function addMany(array $routes)
	{
		foreach ($routes as $route) {
			if ($route instanceOf RouteInterface) {
				$this->addRoute($route);
			} elseif (is_array($route)) {
				$this->add($route[0], $route[1], $route[2]);
			}
		}

		return $this;
	}

	public function getAll():array
	{
		return $this->routes;
	}

	public function route(string $method, string $uri):MatchInterface
	{
		$match = false;
		foreach ($this->routes as $route) {
			if (preg_match($route->getPattern(), $uri, $matches)) {
				$match = $route;
				break;
			}
		}

		if ($match === false) {
			throw new RouteNotFoundException(
				'Could not find route match!'
			);
		}

		if ($match->getMethod() !== $method) {
			header('HTTP/1.1 405 Method Not Allowed');
			throw new MethodNotAllowedException(
				'The request method is not allowed!'
			);
		}

		foreach ($matches as $key => $value) {
			if (!is_string($key)) {
				unset($matches[$key]);
			}
		}

		return new Match($route->getHandler(), $matches, $route);
	}
}