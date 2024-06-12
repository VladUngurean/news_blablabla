<?php

function render_posts($file_path, $post_ids)
{
    $json_data = file_get_contents($file_path);
    $posts = json_decode($json_data, true)['posts'];

    // If $post_ids is not an array, convert it to an array
    if (!is_array($post_ids)) {
        $post_ids = array($post_ids);
    }

    $post_limit = 3;
    $post_count = 0;

    foreach ($posts as $post) {
        $post_id = $post['postID'];

        // Check if the post_id is in the array of post_ids
        if (in_array($post_id, $post_ids)) {
            $title = $post['postTitle']['ru'];
            $category = $post['postCategory']['ru'];
            $content = $post['postContent']['ru'];
            $date = $post['postDate'];
            $image = $post['postImage'];

            echo '
            <a href="">
                <div class="popular_post">';

            // If only one post ID is provided
            if (count($post_ids) == 1) {
                echo '
                <div class="post_title_container">
                    <h2>Самые популярные темы</h2>
                    <p>С нами вы можете узнать больше.</p>
                </div>
                ';
            }
            if (count($post_ids) == 3) {
                echo '
                <div class="post_title_container">
                    <h2>'.$title.'</h2>
                    <p>'.$content.'</p>
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

            // Stop after reaching the post limit
            if ($post_count >= $post_limit) {
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

function generate_random_posts($file_paths, $post_limit, $post_type)
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

        if ($post_type == "side") {
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
        } elseif ($post_type == "main"){
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
        }



        $post_count++;
    }
}