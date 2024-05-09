<?php

namespace Mrfoo\Flame;

use Mrfoo\Flame\Compilers\FlameCompiler;

class Template
{
    private FlameCompiler $compiler;

    public function __construct()
    {
        $this->compiler = new FlameCompiler();
        $this->compiler->registerBuiltinDirectives();
    }

    public function render($viewPath, $data = []): View
    {
        if (!file_exists($viewPath)) {
            die("Error: view file not found");
        }
        ob_start();
        include_once $viewPath;
        $content = ob_get_clean();

        $this->compiler->compile($content);

        return View::fromPath($this->compiler->getCachedFilePath())->with($data)->render();
    }
}
