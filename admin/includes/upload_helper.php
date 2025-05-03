<?php
function uploadFile($file, $targetDir) {
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    $fileName = time() . '_' . basename($file["name"]);
    $targetPath = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if($check === false) {
        return ["success" => false, "message" => "File is not an image."];
    }
    
    // Check file size (5MB max)
    if ($file["size"] > 5000000) {
        return ["success" => false, "message" => "File is too large."];
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        return ["success" => false, "message" => "Only JPG, JPEG, PNG & GIF files are allowed."];
    }
    
    if (move_uploaded_file($file["tmp_name"], $targetPath)) {
        return ["success" => true, "file_path" => $fileName];
    } else {
        return ["success" => false, "message" => "Error uploading file."];
    }
}
?>
