<?php
namespace core\lib;

class Pagination
{
    public $totalNotes;
    public $notesOnPage;
    public $currentPage;
    public $totalPages;
    public $from;
    public $pageName;

    public function __construct($notesOnPage, $totalNotes, $uri)
    {
        $this->notesOnPage = $notesOnPage;
        $this->totalNotes = $totalNotes;
        $this->currentPage = $this->getCurrentPage($uri);
        $this->totalPages = ceil($this->totalNotes / $this->notesOnPage);
        $this->from = ($this->currentPage - 1) * $this->notesOnPage;
        $this->pageName = $this->getPageName($uri);
    }

    public function getCurrentPage($param)
    {
        $arr = explode('/', $param);
        $needle = array_search('page', $arr);

        if($needle){
            return $this->pageValidate($arr[$needle + 1]);
        }
        return $this->pageValidate($param);
    }

    public function pagesViewPort($limit)
    {
        if($limit > $this->totalPages){ $limit = $this->totalPages; }
        $begin = $this->currentPage;
        $remain = $this->totalPages - $this->currentPage;
        $pagesViewPort = '<li><a href="/' . $this->pageName . '/page/1">&laquo;</a></li>';
        $pagesViewPort .= '<li><a href="/' . $this->pageName . '/page/' . $this->prevPage() . '">&lt;</a></li>';

        if($remain <= $limit){
            switch ($this->totalPages - $limit){
                case 0:
                    $begin = 1;
                    break;
                default:
                    $begin = $this->totalPages - $limit;
                    break;
            }

            if($this->currentPage > 1 && $this->totalPages > $limit){$pagesViewPort .= '<li>...</li>';}

        }

        for($i = $begin; $i <= ($begin + $limit); $i++){
            if($i > $this->totalPages){break;}
            if($this->currentPage == $i){
                $pagesViewPort .= '<li><a href="/' . $this->pageName . '/page/' . $i . '" class="page-active">' . $i . '</a></li>';
            }
            else{
                $pagesViewPort .= '<li><a href="/' . $this->pageName . '/page/' . $i . '">' . $i . '</a></li>';
            }
        }

        if(($remain) > $limit){ $pagesViewPort .= '<li>...</li>'; }

        $pagesViewPort .= '<li><a href="/' . $this->pageName . '/page/' . $this->nextPage() . '">&gt;</a></li>';
        $pagesViewPort .= '<li><a href="/' . $this->pageName . '/page/' . $this->totalPages . '">&raquo;</a></li>';

        return $pagesViewPort;
    }

    public function prevPage()
    {
        $page = $this->currentPage - 1;
        if((int)$page > $this->totalPages){ return $this->totalPages; }
        return $this->pageValidate($page);
    }

    public function nextPage()
    {
        $page = $this->currentPage + 1;
        if((int)$page > $this->totalPages){ return $this->totalPages; }
        return $this->pageValidate($this->currentPage + 1);
    }

    private function pageValidate($page)
    {
        if((int)$page && (int)$page > 0){ return $page; }
        $page = 1;
        return $page;
    }

    private function getPageName($uri)
    {
        $needle = explode('/', $uri);

        if(!empty($needle[0])){
            return $needle[0];
        }
        return false;
    }

}