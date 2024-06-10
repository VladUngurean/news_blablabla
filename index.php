<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <!-- <script src="logic/js/index.js"></script> -->
</head>

<body>
    <!-- header section start -->
    <section class="section">
        <header>

            <div class="header_top">
                <span class="logo">Blablabla</span>
                <div class="social_media">
                    <img src="/images/header/IG.SVG" alt="">
                    <img src="/images/header/TG.SVG" alt="">
                    <img src="/images/header/TK.SVG" alt="">
                    <img src="/images/header/FB.SVG" alt="">
                </div>
            </div>

            <div class="header_bot">
                <nav>
                    <a class="active_nav" href="">Еда и напитки</a>
                    <a href="">Еда и напитки</a>
                    <a href="">Еда и напитки</a>
                    <a href="">Еда и напитки</a>
                    <a href="">Еда и напитки</a>
                    <a href="">Еда и напитки</a>
                </nav>
            </div>

        </header>
    </section>
    <!-- header section end -->

    <!-- content section start -->
    <section class="section section_content">
        <!-- content section 1 start -->
        <div id="content_main" class="content_most_popular">
            <!-- generate posts from json files start -->
            <?php
            require_once("PHPfunctions/render_most_popular_posts.php");
            generate_posts('posts.json', 1);
            ?>
            <!-- generate posts from json files end -->


            <div id="most_popular_post-small">

                <!-- generate posts from json files start -->
                <?php generate_posts('posts.json', 2, 4); ?>
                <!-- generate posts from json files end -->

            </div>
        </div>

        <div id="content_side">
            <?php
            require_once("PHPfunctions/render_5_random.php");
            generate_random_posts(['posts.json', 'random.json'], 5);
            ?>
        </div>
    </section>
    <!-- content section 1 end -->

    <!-- content section 2 start -->
    <section class="section section_content section_content_2">
        <!-- content section 1 start -->
        <div id="content_main" class="content_most_popular chat_section">

            <div class="most_popular_post chat_section">
                <h1>Самые популярные темы</h1>
                <p>С нами вы можете узнать больше.</p>
                <img class="most_popular_post_img" src="https://i.postimg.cc/9fnXGD2W/1.jpg" alt="">
                <div class="most_popular_post_overlay">
                    <div class="most_popular_post_overlay-text">Palm Beach <br><span>Florida</span></div>
                </div>
            </div>


        </div>

        <div id="content_side">
            <?php
            require_once("PHPfunctions/render_5_random.php");
            generate_random_posts(['posts.json', 'random.json'], 5);
            ?>
        </div>

    </section>
    <!-- content section 2 end -->

    <!-- content section 3 start -->
    <!-- content section 3 end -->

    <!-- <div class="language-buttons">
        <button data-lang="ru" onclick="setLanguage('ru')">Русский</button>
        <button data-lang="ro" onclick="setLanguage('ro')">Română</button>
    </div>
    <div id="posts-container"></div> -->
</body>

</html>