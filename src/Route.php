<?php declare(strict_types=1);

namespace Smack\Routing;

class Route implements RouteInterface
{
	protected $method;
	protected $pattern;
	protected $handler;

	public function __construct(
		$method,
		$pattern,
		$handler
	){
		$this->setMethod($method)
		->setPattern($pattern)
		->setHandler($handler);
	}

	public function getPattern():string
	{
		return $this->pattern;
	}

	public function setPattern(string $pattern)
	{
		$this->pattern = $pattern;
		return $this;
	}

	public function getMethod():string
	{
		return $this->method;
	}

	public function setMethod(string $method)
	{
		$this->method = $method;
		return $this;
	}

	public function getHandler()
	{
		return $this->handler;
	}

	public function setHandler($handler)
	{
		$this->handler = $handler;
		return $this;
	}
}