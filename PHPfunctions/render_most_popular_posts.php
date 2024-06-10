<?php

function generate_posts($file_path, $post_id1, $post_id2 = '')
{
    $json_data = file_get_contents($file_path);
    $posts = json_decode($json_data, true)['posts'];

    $post_limit = 2;
    $post_count = 0;

    foreach ($posts as $post) {
        $post_id = $post['postID'];

        // choose id's of posts to generate them
        if ($post_id == $post_id1 || $post_id2 != '') {
            $title = $post['postTitle']['ru'];
            $category = $post['postCategory']['ru'];
            $content = $post['postContent']['ru'];
            $date = $post['postDate'];
            $image = $post['postImage'];

            echo '
            <a href="">
                <div class="most_popular_post">';

            if ($post_id2 == '') {
                echo '
                    <h2>Самые популярные темы</h2>
                    <p>С нами вы можете узнать больше.</p>
                ';
            }

            echo '
                    <img class="most_popular_post_img" src="' . $image . '" alt="">
                    <div class="most_popular_post_overlay">
                        <div class="most_popular_post_overlay-text"><span>' . $title . '</span> <br><span>' . $category . '</span></div>
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