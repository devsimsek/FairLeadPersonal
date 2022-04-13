<?php

/**
 * Example controller.
 * @warn Consider removing $this->get_config();
 * to $this->get_config('key_for_wanted_config')
 * for security reasons.
 */
class Page extends SDF\Controller
{

    protected ViewData $data;

    /**
     * Not necessary to add, but
     * it feels kinda nice to
     * control all variables
     * flowing through
     * controller.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->file('Database', SDF_APP_LIB);
        $this->load->file('Session', SDF_APP_LIB);
        $this->load->helper("General");
        $this->load->helper("Database");
        $this->load->helper("Types");
        $this->load->helper("Loader");
        $this->data = new ViewData();
    }

    /**
     * Index view
     * @return void
     */
    public function index(string $slug)
    {

        $page = get_table("page", "slug='" . $slug . "'");
        if ($page !== false and isset($page[0])) {
            $page = $page[0];
            $this->data->page->title = $page->name;
            $this->data->page->slug = $page->slug;
            $this->data->data->page = $page;
            $this->load->view("{$this->data->app->theme}/frontend/partials/head", $this->data);
            $this->load->view("{$this->data->app->theme}/frontend/partials/navigation", $this->data);
            $this->load->view("{$this->data->app->theme}/frontend/page/render", $this->data);
            $this->load->view("{$this->data->app->theme}/frontend/partials/footer", $this->data);
        } else {
            redirect(base_url("?error=0xcnf"));
        }
    }
}