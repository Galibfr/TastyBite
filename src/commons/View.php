<?php
namespace App\Commons;
use App\Infrastructure\Interfaces\ViewInterface;
class View implements ViewInterface {
    private String $view;
    private String $layout;
    private array $datas;
    private String $rootPath;

    public function __construct(String $view, array $datas = [], String $layout = 'layouts/main')
    {
        $this->rootPath = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
        $this->view = $view;
        $this->datas = $datas;
        $this->layout = $layout;
    }

    public function render(): void {
        $content = $this->renderView();
        $this->datas['content'] = $content;
        $this->datas['rootPath'] = $this->rootPath;
        if($this->layout){
            echo $this->renderLayout();
        }
    }
    public function renderLayout(): String { 
        $pathLayout = $this->rootPath."/$this->layout".".php";
        return $this->renderFile($pathLayout);
    }
    public function renderView(): String {
        $pathView = $this->rootPath."/$this->view".".view.php";
        return $this->renderFile($pathView);
    }
    public function renderFile(String $filePath): String {
        if(file_exists($filePath)){
            extract($this->datas);
            ob_start();
             require $filePath;
            return ob_get_clean();
        } else {
            die('File Not found');
        }
    }
}