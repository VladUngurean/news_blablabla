<?php

function generate_random_posts($file_paths, $post_limit)
{
    $all_posts = [];

    // Load and merge posts from multiple files
    foreach ($file_paths as $file_path) {
        $json_data = file_get_contents($file_path);
        $posts = json_decode($json_data, true)['posts'];
        $all_posts = array_merge($all_posts, $posts);
    }

    // Shuffle the combined array of posts to ensure randomness
    shuffle($all_posts);

    $post_count = 0;

    foreach ($all_posts as $post) {
        if ($post_count >= $post_limit) {
            break;
        }

        $title = $post['postTitle']['ru'];
        $category = $post['postCategory']['ru'];
        $content = $post['postContent']['ru'];
        $date = $post['postDate'];
        $image = $post['postImage'];

        echo '
            <a href="">
                <div class="sidebar_content_wraper">
                    <img src="' . $image . '" alt="">
                    <div class="sidebar_content_title">
                        <p> '. $title .' </p>
                        <p class=""> '. $category .' </p>
                    </div>
                </div>
            </a>';

        $post_count++;
    }
}