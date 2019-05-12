<?php
use Event\Emitter;
use Event\User;

require ('vendor/autoload.php');

$emitter = Emitter::getInstance();
$emitter->on('Comment.created', function($firstName, $lastName) {
    echo $firstName . ' ' . $lastName .  ' has posted a comment.';
}, 100);
$emitter->on('Comment.created', function($firstName, $lastName) {
    echo $firstName . ' ' . $lastName .  ' has posted a comment.';
}, 1);

// $emitter->on('User.new', function($user_name) {
//     return new User($user_name);
// });
$emitter->emit('Comment.created', 'Jhon', 'Doe');
$emitter->emit('User.new');
