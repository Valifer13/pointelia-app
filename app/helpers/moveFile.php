<?php 

function moveLetterPhoto($photo)
{
    $file_name = $photo['name'];
    $file_tmp = $photo['tmp_name'];

    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_name = uniqid() . "." . $ext;

    $target_folder = __DIR__ . "\..\..\public\assets\uploads\letters\\" . $new_name;

    $state = move_uploaded_file($file_tmp, $target_folder);

    if (!$state) {
        throw new Exception("Gagal memindahkan file");
    }
    return $new_name;
}