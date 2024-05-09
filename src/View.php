<?php

namespace Mrfoo\Flame;

use Mrfoo\Flame\Interfaces\ViewInterface;

class View implements ViewInterface
{
    private string $compiledPath = "";
    private string $htmlContent = "";
    private array $data = [];

    public function __construct(string $compiledPath = "", array $data = [])
    {
        $this->compiledPath = $compiledPath;
        $this->data = $data;
    }

    public function render(): ?View
    {
        extract($this->data);
        if (empty($this->compiledPath)) {
            echo $this->getHtmlContent();
            return null;
        }

        include $this->compiledPath;
        return $this;
    }

    public function getCompiledPath(): string
    {
        return "";
    }

    public function getTemplatePath(): string
    {
        return "";
    }

    public static function fromPath(string $viewPath): View
    {

        if (file_exists($viewPath)) {
            return new View($viewPath);
        }

        return View::fromHTML("");
    }

    public static function fromHTML(string $htmlContent): View
    {
        $view = new View();
        $view->htmlContent = $htmlContent;
        return $view;
    }

    public function getHtmlContent()
    {
        if (!empty($this->htmlContent)) {
            return $this->htmlContent;
        }

        return "<code>Empty View</code>";
    }

    public function setHtmlContent(string $htmlContent) {
        return $this->htmlContent = $htmlContent;
    }

    public function with(array $data = []): View
    {
        $this->data = $data;
        return $this;
    }
}
