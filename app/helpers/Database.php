<?php

global $db;
$db = new Database('127.0.0.1', 'FairleadPersonal', 'root', 'simsek');

if (!function_exists("get_table")) {
    function get_table(string $tableName, string $where = null, string $limit = null): array|stdClass|false
    {
        global $db;
        if (empty($where))
            $sql = "SELECT * FROM $tableName" . (!empty($limit) ? " LIMIT $limit" : null);
        else
            $sql = "SELECT * FROM $tableName WHERE $where" . (!empty($limit) ? " LIMIT $limit" : null);
        $db->query($sql);
        if (!empty($db->resultset())) {
            return $db->resultset();
        } else {
            return false;
        }
    }
}
if (!function_exists("get_post")) {
    function get_post(string $slug)
    {
        global $db;
        $db->query("SELECT * FROM post WHERE slug=:slug");
        $db->bind(":slug", $slug);
        if (!empty($db->resultset())) {
            return $db->resultset()[0];
        } else {
            return false;
        }
    }
}

if (!function_exists("get_category")) {
    function get_category(int $id)
    {
        return get_table("category", "id=$id;")[0];
    }
}

if (!function_exists("get_author")) {
    function get_author(int $id)
    {
        return get_table("users", "id=$id;")[0];
    }
}

if (!function_exists('db_search_all')) {
    function db_search_all(string $string): array|stdClass|false
    {
        global $db;
        $db->query("select * from post where keywords like :string or post.author in (select users.id from users where users.username like :string) or title like :string;");
        $db->bind(":string", $string . '%');
        if (!empty($db->resultset())) {
            return $db->resultset()[0];
        } else {
            return false;
        }
    }
}