<?php

/**
 * Example controller.
 * @warn Consider removing $this->get_config();
 * to $this->get_config('key_for_wanted_config')
 * for security reasons.
 */
class Post extends SDF\Controller
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
    public function index()
    {
        $this->data->page->title = "Posts";
        $this->data->page->slug = "posts";
        $this->load->view("{$this->data->app->theme}/frontend/partials/head", $this->data);
        $this->load->view("{$this->data->app->theme}/frontend/partials/navigation", $this->data);
        $this->load->view("{$this->data->app->theme}/frontend/post/home", $this->data);
        $this->load->view("{$this->data->app->theme}/frontend/partials/footer", $this->data);
    }

    /**
     * View post
     * @return void
     */
    public function view(string $slug)
    {
        $post = get_post($slug);

        if ($post !== false) {
            $this->data->page->title = $post->title;
            $this->data->page->slug = $post->slug;
            $this->data->data->post = $post;
            $this->load->view("{$this->data->app->theme}/frontend/partials/head", $this->data);
            $this->load->view("{$this->data->app->theme}/frontend/partials/navigation", $this->data);
            $this->load->view("{$this->data->app->theme}/frontend/post/view", $this->data);
            $this->load->view("{$this->data->app->theme}/frontend/partials/footer", $this->data);
        } else {
            redirect(base_url("?error=0xcnf"));
        }
    }
}