<?php
namespace App\Infrastructure\Interfaces;

interface ViewInterface {
    public function render(): void;
    public function renderLayout(): String;
    public function renderView(): String;
    public function renderFile(String $filePath): String;
}