<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Http\Request;

class Route
{
    /**
     * @var string
     */
    protected string $method;

    /**
     * @var string
     */
    protected string $uri;

    /**
     * @var string
     */
    protected string $controllerClassName;

    /**
     * @var string
     */
    protected string $actionName;

    /**
     * @var string
     */
    protected string $role;

    /**
     * @param string $method
     * @param string $uri
     * @param string $controllerClassName
     * @param string $actionName
     */
    public function __construct(string $method, string $uri, string $controllerClassName, string $actionName, string $role)
    {
        $this->setMethod($method);
        $this->setUri($uri);
        $this->setControllerClassName($controllerClassName);
        $this->setActionName($actionName);
        $this->setRole($role);
    }

    /**
     * @param string $uri
     * @param string $controllerClassName
     * @param string $actionName
     * @param string $role
     * @return Route
     */
    public static function post(string $uri, string $controllerClassName, string $actionName, string $role = Acl::ROLE_GUEST): Route
    {
        return new static(Request::METHOD_POST, $uri, $controllerClassName, $actionName, $role);
    }

    /**
     * @param string $uri
     * @param string $controllerClassName
     * @param string $actionName
     * @param string $role
     * @return Route
     */
    public static function get(string $uri, string $controllerClassName, string $actionName, string $role = Acl::ROLE_GUEST): Route
    {
        return new static(Request::METHOD_GET, $uri, $controllerClassName, $actionName, $role);
    }

    /**
     * @param string $uri
     * @param string $controllerClassName
     * @param string $actionName
     * @param string $role
     * @return Route
     */
    public static function put(string $uri, string $controllerClassName, string $actionName, string $role = Acl::ROLE_GUEST): Route
    {
        return new static(Request::METHOD_PUT, $uri, $controllerClassName, $actionName, $role);
    }

    /**
     * @param string $uri
     * @param string $controllerClassName
     * @param string $actionName
     * @param string $role
     * @return Route
     */
    public static function delete(string $uri, string $controllerClassName, string $actionName, string $role = Acl::ROLE_GUEST): Route
    {
        return new static(Request::METHOD_DELETE, $uri, $controllerClassName, $actionName, $role);
    }

    /**
     * @param string $method
     * @param string $uri
     * @return bool
     */
    public function match(string $method, string $uri): bool
    {
        return $this->getMethod() === $method && $this->getUri() === $uri;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getControllerClassName(): string
    {
        return $this->controllerClassName;
    }

    /**
     * @param string $controllerClassName
     */
    public function setControllerClassName(string $controllerClassName): void
    {
        $this->controllerClassName = $controllerClassName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->actionName;
    }

    /**
     * @param string $actionName
     */
    public function setActionName(string $actionName): void
    {
        $this->actionName = $actionName;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Route
     */
    public function setRole(string $role): Route
    {
        $this->role = $role;
        return $this;
    }
}
