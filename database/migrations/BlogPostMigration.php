<?php

Schema::create('blog_posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->text('markdown');
    $table->timestamps();
});
