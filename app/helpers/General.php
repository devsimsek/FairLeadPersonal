<?php
if (!function_exists("base_url")) {
    /**
     * Base url
     * Returns base url of the site
     * @param string|null $path
     * @return string|null
     */
    function base_url(string $path = null): ?string
    {
        if (!defined("BASE_URL")) {
            if (php_sapi_name() === "cli" or php_sapi_name() === "cli-server") {
                if ($path != null) {
                    return "/" . $path;
                }
                return "/";
            }

            if (isset($_SERVER['HTTPS'])) {
                $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
            } else {
                $protocol = 'http';
            }

            if ($path != null) {
                return $protocol . "://" . $_SERVER['HTTP_HOST'] . DIRECTORY_SEPARATOR . $path;
            }
            return $protocol . "://" . $_SERVER['HTTP_HOST'] . DIRECTORY_SEPARATOR;
        } else {
            return BASE_URL;
        }
    }
}
if (!function_exists('redirect')) {
    /**
     * Redirect
     * redirects to another url
     * @param string $url
     * @param bool $permanent
     */
    function redirect(string $url, bool $permanent = false)
    {
        if (headers_sent() === false) {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        //header("location: " . base_url($url));
        print_r("<script>window.location.href = '" . $url . "'</script>");
        exit();
    }
}