<?php
function reScaleImage($filename, $conx, $cony){
    if(empty($conx) || empty($cony))
        return;
    list($new_width, $new_height) = constrainImage($filename, $conx, $cony);
    return resizeDiscardAspect($filename, $new_width, $new_height);
}
function resizeDiscardAspect($fileName, $new_width, $new_height){
    //we retrieve the info from the current image
    list($orig_width, $orig_height, $type) = getimagesize($fileName);
    //we create a new image template
    $image_p = imagecreatetruecolor($new_width, $new_height);
    //we create a variable that will hold the new image
    $image = null;
    //only the three first of all the possible formats are supported, the original image is loaded if it is one of them
    switch($type){
        case 1: //GIF
            $image = imagecreatefromgif($fileName);
            break;
        case 2: //JPEG
            $image = imagecreatefromjpeg($fileName);
            break;
        case 3: //PNG
            $image = imagecreatefrompng($fileName);
            break;
        default:
            return false;
            break;
    }
    //we copy the resized image from the original into the new one and save the result as a jpeg   
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $orig_width, $orig_height);
    imagejpeg($image_p, $fileName, 100);
    return true;
}
function constrainImage($filename, $conx, $cony){
    list($orig_width, $orig_height, $type) = getimagesize($filename);
    
    $new_width    =    0;
    $new_height    =    0;
    
    // for instance 0.66 = 125 / 188
    $con_ratio         = $conx / $cony;
    
    // for instance  1.33 =  300 / 225
    $orig_ratio        = $orig_width / $orig_height;
    
    //if the new picture is laying and the original is standing or laying
    //"less", the original height has to lead
    if($con_ratio >= $orig_ratio){
        $new_height = $cony;
        $new_width     = round(( $cony * $orig_width) / $orig_height);
    }else if($con_ratio <= $orig_ratio){
        $new_height = round(( $conx * $orig_height) / $orig_width);
        $new_width     = $conx;
    }
    
    return array($new_width, $new_height);
}
function getImagePrefix($type){
    $arr = array(1 => "gif", 2 => "jpg", 3 => "png");
    return $arr[$type];
}
 
function getImageType($filename){
    list($orig_width, $orig_height, $type) = getimagesize($filename);
    return getImagePrefix($type);
}
 
function watermark($wm_path, $bkg_path){
    $watermark                         = imagecreatefrompng($wm_path);
    list($wm_width, $wm_height, $type)     = getimagesize($wm_path);
    $bkg                             = imagecreatefromjpeg($bkg_path);
    list($bkg_width, $bkg_height, $type)     = getimagesize($bkg_path);
    $dest_x                                 = $bkg_width - $wm_width - 5;  
    $dest_y                                 = $bkg_height - $wm_height - 5;
    imagecopy($bkg, $watermark, $dest_x, $dest_y, 0, 0, $wm_width, $wm_height);
    imagejpeg($bkg, $bkg_path, 100);
    imagedestroy($bkg);
    imagedestroy($watermark);
}
?>