<?php
/**
 * Example routing schema,
 * $config['path/{pattern}'] = 'controller/method';
 * Pattern Shortcuts;
 * {url}, {id}, {all}
 * or
 * $config['path/{pattern}'] = ['controller/method', 'request_type'];
 * request_type = User request type. such as post, get and delete.
 */
$config['/'] = 'home';
$config['/posts'] = 'post';
$config['/post/{url}'] = 'post/view';
$config['/categories'] = 'category';
$config['/category/{url}'] = 'category/view';
$config['/authors'] = 'author';
$config['/author/{url}'] = 'author/view';
$config['/p/{url}'] = 'page';
