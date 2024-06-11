<?php

function render_posts($file_path, $post_id1, $post_id2 = '')
{
    $json_data = file_get_contents($file_path);
    $posts = json_decode($json_data, true)['posts'];

    $post_limit = 2;
    $post_count = 0;

    foreach ($posts as $post) {
        $post_id = $post['postID'];

        // choose id's of posts to generate them
        if (($post_id2 != '' && $post_id == $post_id2) || $post_id == $post_id1) {
            $title = $post['postTitle']['ru'];
            $category = $post['postCategory']['ru'];
            $content = $post['postContent']['ru'];
            $date = $post['postDate'];
            $image = $post['postImage'];

            echo '
            <a href="">
                <div class="popular_post">';

            if ($post_id2 == '') {
                echo '
                <div class="post_title_container">
                    <h2>Самые популярные темы</h2>
                    <p>С нами вы можете узнать больше.</p>
                </div>
                ';
            }

            echo '
                    <img class="popular_post_img" src="' . $image . '" alt="">
                    <div class="popular_post_overlay">
                        <div class="popular_post_overlay-text"><span>' . $title . '</span> <br><span>' . $category . '</span></div>
                    </div>
                </div>
            </a>';

            $post_count++;

            if ($post_id2 == '') {
                break;
            } elseif ($post_count >= $post_limit) {
                break;
            }
        }
    }
}

function render_one_post($file_path, $post_id1)
{
    $json_data = file_get_contents($file_path);
    $posts = json_decode($json_data, true)['posts'];

    foreach ($posts as $post) {
        $post_id = $post['postID'];

        // choose id's of posts to generate them
        if ($post_id == $post_id1) {
            $title = $post['postTitle']['ru'];
            $category = $post['postCategory']['ru'];
            $content = $post['postContent']['ru'];
            $date = $post['postDate'];
            $image = $post['postImage'];

            echo '
                <a href="">
                    <div class="popular_post">
                        <div class="post_title_container">
                            <h2>'.$title.'</h2>
                            <p>'.$category.'</p>
                        </div>
                        <img class="popular_post_img" src="'. $image .'" alt="">
                    </div>
                </a>';
            break;
        }
    }
}

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
                        <p> ' . $title . ' </p>
                        <p class=""> ' . $category . ' </p>
                    </div>
                </div>
            </a>';

        $post_count++;
    }
}