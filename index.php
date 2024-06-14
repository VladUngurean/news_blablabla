<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blablabla - Всё обо всем</title>
    <link rel="stylesheet" href="/css/style.css">
    <!-- <script src="logic/js/index.js"></script> -->
</head>

<body>

    <!-- header section start -->
    <?php  
        require_once('pages/header.php'); 
        require_once('PHPfunctions\page_diff_language.php');
    ?>
    <!-- header section end -->

    <section class="main_section content_section welcome_message">
        <div class="main_content">

            <h1>Добро пожаловать на Blablabla!</h1>

            <h2>&nbsp; &nbsp; У нас вы сможете узнать захватывающие факты о ваших увлечениях, будь то <b>охота</b>, <b>рыбалка</b>, <b>садоводство</b> или <b>туризм</b>.
                Мы также предлагаем информацию о повседневных навыках, таких как приготовление <b>еды и напитков</b>, <b>уход за здоровьем и красотой </b><span>(вы и так красивы &#x2665;&#xfe0f;)</span>.</h2>

            <h2>&nbsp; &nbsp; Но это еще не все! Наша уникальная особенность - это наш <b>AI Чатбот</b>, ваш личный помощник, готовый ответить на любые ваши вопросы.
                Нужна быстрая идея для рецепта? Ищете лучшие места для рыбалки? Хотите узнать о лучших способах ухода за кожей?
                <span>Просто спросите нашего AI Чатбота в правом нижнем углу</span>, и вы получите мгновенные и полезные ответы, подходящие под ваши нужды.
            </h2>
        </div>

        <div class="sidebar_content sidebar_ads">
            <a href="">
                <img class="ad_img" src="https://seniorresourcesonline.com/wp-content/uploads/2018/10/your-ad-here.webp" alt="">
            </a>
            <a href="">
                <img class="ad_img" src="https://seniorresourcesonline.com/wp-content/uploads/2018/10/your-ad-here.webp" alt="">
            </a>
        </div>


    </section>
    <?php // outputWelcomeMessage('en'); // Change 'en' to 'ru' or 'ro' for other languages ?>

    <!-- content section start -->
    <section class="main_section content_section">
        <!-- content section 1 start -->
        <div class="main_content">
            <!-- generate posts from json files start -->
            <?php
            require_once("PHPfunctions/render_posts.php");
            render_posts('posts.json', 1);
            ?>
            <!-- generate posts from json files end -->

            <div class="popular_post-small">

                <!-- generate posts from json files start -->
                <?php render_posts('posts.json', [2, 3]); ?>
                <!-- generate posts from json files end -->

            </div>
        </div>

        <div class="sidebar_content">
            <?php
            generate_random_posts(['posts.json', 'random.json'], 5, "side");
            ?>
        </div>
    </section>
    <!-- content section end -->

    <!-- content section 1 start -->
    <section class="main_section content_section aditional_content_1">
        <div class="main_content">

            <div class="popular_post chat_section">
                <div class="post_title_container">
                    <h2>Что-то там о чат боте</h2>
                    <p>Спрашивай и узнавай.</p>
                </div>
                <a href="">
                    <img class="popular_post_img chat_section" src="https://img.freepik.com/free-vector/call-center-isometric-concept_1284-69078.jpg?t=st=1718362787~exp=1718366387~hmac=40345e1f123709821a56240e2997e679bee55fe623439d6ac08e46b1a583a0f2&w=1380" alt="">
                </a>
            </div>

            <div class="two_posts">
                <?php
                render_one_post('posts.json', 2);
                render_one_post('posts.json', 3);
                ?>
            </div>
        </div>

        <div class="sidebar_content sidebar_ads">
            <a href="">
                <img class="ad_img" src="https://seniorresourcesonline.com/wp-content/uploads/2018/10/your-ad-here.webp" alt="">
            </a>
            <a href="">
                <img class="ad_img" src="https://seniorresourcesonline.com/wp-content/uploads/2018/10/your-ad-here.webp" alt="">
            </a>
        </div>
    </section>
    <!-- content section 1 end -->



    <!-- content section 2 start -->
    <section class="main_section content_section aditional_content_2">

        <!-- generate posts from json files start -->
        <div class="main_content">
            <div class="newest_posts_container">
                <div class="newest_posts">
                    <h2>Еда и напитки</h2>
                    <?php
                    render_posts('posts.json', [1, 2, 3]);
                    ?>
                </div>

                <div class="newest_posts">
                    <h2>Садоводство</h2>
                    <?php
                    render_posts('posts.json', [1, 2, 3]);
                    ?>
                </div>
            </div>

        </div>


        <!-- generate posts from json files end -->

        <div class="sidebar_content sidebar_ads">
            <a href="">
                <img class="ad_img" src="https://img.freepik.com/free-photo/smiling-young-female-gardener-uniform-wearing-gardening-hat-holding-plant-holding-plant-with-clippers_141793-89024.jpg?t=st=1718040136~exp=1718043736~hmac=572b29ae73c326ca68d1d1852c36a1d29c0445a5b730b602f8623360597adaf7&w=1060" alt="">
            </a>
            <a href="">
                <img class="ad_img" src="https://img.freepik.com/free-photo/unrecognizable-man-psushing-wheelbarrow-full-seedling_329181-20532.jpg?t=st=1718040163~exp=1718043763~hmac=dc58f2ab7ea9e0cbe4c26cc1de95f9f43d347640eb1c20cb0c3bb767d4fbfa63&w=1380" alt="">
            </a>
        </div>
    </section>
    <!-- content section 2 end -->
</body>

</html>