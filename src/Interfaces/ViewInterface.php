<?php

namespace Mrfoo\Flame\Interfaces;

use Mrfoo\Flame\View;

interface ViewInterface {

    public function render(): ?View;

    public function with(array $data = []): View; 

    public function getTemplatePath(): string;

    public function getCompiledPath(): string;

    public static function fromPath(string $viewPath): View;

    public static function fromHTML(string $htmlContent): View;
}