<?php

const PATH = './accets/img/';

function create_path(?string $end_path): string {
    return PATH . $end_path;
}

function is_image(string $image): bool {
    return @is_array(getimagesize($image));
}

/**
 * @throws Exception
 */
function get_image_from_post(string $parameter): ?array  {
    if(!array_key_exists($parameter, $_FILES)) {
        throw new Exception("No image detected.");
    }
    return $_FILES[$parameter];
}

function list_images(): void {
    $images = scandir(PATH);

    for($i = 0; $i<count($images); $i++) {
        $img = $images[$i];

        if($img == '.' || $img == '..') {
            continue;
        }
        $path = create_path($img);
        echo "<img src='$path' alt='$img'/>";
    }
}

/**
 * @throws Exception
 */
function upload_image(array $image) {
    if(!is_image($image["tmp_name"])) {
        throw new Exception("This is not an image (possible file upload attack).");
    }
    $path = create_path($image["name"]);
    if(!move_uploaded_file($image["tmp_name"], $path)) {
        throw new Exception("possible file upload attack.");
    }
}