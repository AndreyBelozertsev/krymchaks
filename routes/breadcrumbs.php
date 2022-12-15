<?php // routes/breadcrumbs.php


// Home
Breadcrumbs::for('home', function ( $trail) {
    $trail->push('Главная', route('home'));
});

// Home > Blog
Breadcrumbs::for('about', function ( $trail) {
    $trail->parent('home');
    $trail->push('О нас');
});

// Home > Blog
Breadcrumbs::for('about.category.index', function ( $trail, $category) {
    $trail->parent('about');
    $trail->push($category->title, route('about.category.index',['category'=> $category->slug]));
});

Breadcrumbs::for('about.article.index', function ( $trail, $category) {
    $trail->parent('about.category.index', $category);
    $trail->push('Статьи', route('about.article.index',['category'=> $category->slug]));
});

Breadcrumbs::for('about.article.show', function ( $trail, $about, $category) {
    $trail->parent('about.article.index', $category);
    $trail->push($about->title, route('about.article.show',['category' => $category,'about'=>$about]));
});

Breadcrumbs::for('museums', function ( $trail) {
    $trail->parent('home');
    $trail->push('Музей',route('museums'));
});

Breadcrumbs::for('museum.show', function ( $trail, $museum) {
    $trail->parent('museums');
    $trail->push($museum->title, route('museum.show',['museum' => $museum]));
});

Breadcrumbs::for('posts', function ( $trail) {
    $trail->parent('home');
    $trail->push('Новости',route('posts'));
});

Breadcrumbs::for('post.show', function ( $trail, $post) {
    $trail->parent('posts');
    $trail->push($post->title, route('post.show',['post' => $post]));
});

Breadcrumbs::for('places', function ( $trail) {
    $trail->parent('home');
    $trail->push('Объекты',route('places'));
});

Breadcrumbs::for('place.show', function ( $trail, $place) {
    $trail->parent('places');
    $trail->push($place->title, route('place.show',['place' => $place]));
});

Breadcrumbs::for('printed-productions.index', function ( $trail) {
    $trail->parent('home');
    $trail->push('Печатная продукция',route('printed-productions.index'));
});

Breadcrumbs::for('printed-productions.show', function ( $trail, $product) {
    $trail->parent('printed-productions.index');
    $trail->push($product->title, route('printed-productions.show',['product' => $product]));
});

Breadcrumbs::for('media', function ( $trail) {
    $trail->parent('home');
    $trail->push('Медиа');
});

Breadcrumbs::for('media.audios.index', function ( $trail) {
    $trail->parent('media');
    $trail->push('Аудио',route('media.audios.index'));
});

Breadcrumbs::for('media.audios.show', function ( $trail, $audio) {
    $trail->parent('media.audios.index');
    $trail->push($audio->title, route('media.audios.show',['audio' => $audio]));
});

Breadcrumbs::for('media.videos.index', function ( $trail) {
    $trail->parent('media');
    $trail->push('Видео',route('media.videos.index'));
});

Breadcrumbs::for('media.videos.show', function ( $trail, $video) {
    $trail->parent('media.videos.index');
    $trail->push($video->title, route('media.videos.show',['video' => $video]));
});

Breadcrumbs::for('contact', function ( $trail) {
    $trail->parent('home');
    $trail->push('Контакты');
});

Breadcrumbs::for('policy', function ( $trail) {
    $trail->parent('home');
    $trail->push('Политика обработки персональных данных');
});