<?php
/** @noinspection PhpPureAttributeCanBeAddedInspection */

/** @noinspection PhpMultipleClassDeclarationsInspection */

class ViewData
{
    public stdClass $page;
    public stdClass $section;
    public stdClass $data;
    public SubAppData $app;

    public function __construct()
    {
        $this->page = new stdClass();
        $this->page->title = null;
        $this->page->slug = null;

        $this->section = new stdClass();
        $this->section->scripts = new stdClass();
        $this->section->styles = new stdClass();

        $this->data = new stdClass();

        $this->app = new SubAppData();
    }
}

class SubAppData
{
    public string $name = "FairLead Personal";
    public string $description = "Welcome to your new personal site! To customize here please referer to docs.";
    public string $theme = "Default";
    public string $version = "v1.0 Pre-Alpha";
}