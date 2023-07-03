<?php
namespace Core;

class Pagination
{
    protected $totalItems;
    protected $itemsPerPage;
    protected $currentPage;

    public function __construct($totalItems, $itemsPerPage, $currentPage)
    {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = $currentPage;
    }

    public function getTotalPages()
    {
        return ceil($this->totalItems / $this->itemsPerPage);
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function getOffset()
    {
        return ($this->currentPage -1) * $this->itemsPerPage;
    }

    public function getLimit()
    {
        return $this->itemsPerPage;
    }

    public function getPreviousPage()
    {
        return $this->currentPage > 1 ? $this->currentPage - 1 : null;
    }

    public function getNextPage()
    {
        $totalPages = $this->getTotalPages();
        return $this->currentPage < $totalPages ? $this->currentPage + 1 : null;
    }
}