<?php
@date_default_timezone_set ('UTC');

//
//            WW  WW  WW
//            WW  WW  WW
//            WW  WW  WW
//             WWWWWWWW
//     __ __ _ _ _ __  _ __ _  _ 
//     \ V  V / | , , | __ \  V |
//      \_/\_/|_|_|_|_| .__/\_, |
//                    |_|   |___|
//
// ----------------------------------
//
//     Wimpy Playlister
//     7.7.41 2016-04-26
//     www.wimpyplayer.com
//     Copyright Plaino LLC
//
// ----------------------------------





$wimpyVersion = "7.7.41";


// -----------------------------
// Allow Folder Navigation
// -----------------------------
$allowFolderNavigation = true;

// -----------------------------
// Playlist Kind
// -----------------------------
// VALUES
// xml 		- XML playlists allow for cover art images (both folder-based 
//              and file-based) Plus using an XML playlist allows for distinction 
//              between skin files (which are json) and playlist files.
// txt 		- Simple text-based list
// json 	- (Experimental -- may not be supported on your system)
//
$playlistKind = "xml";

// -----------------------------
// Media Types
// -----------------------------
// The kinds of files to search for:
$media_types = "xml,pls,mp4,m4a,m4p,m4v,aac,mp3,wav,json";


// -----------------------------
// HTTP Option
// -----------------------------
// Allows you to run wimpy in "https" mode. We can manually set the values, or set to "auto" 
// to have this script automatically check and set depending on how the file is accessed.
//$httpOption = "http";
//$httpOption = "https";
$httpOption = "auto";

// -----------------------------
// Hide Folders
// -----------------------------
// A list of folder names to ignore.
$hide_folders = "getid3,wimpy.buttons,wimpy.skins,wimpy.test,wimpy.getid3,assets,cgi-bin,_notes,_private,_private,_vti_bin,_vti_cnf,_vti_pvt,_vti_txt";

// -----------------------------
// Hide Files
// ------------------------v
// A list of file names to ignore.
$hide_files = "";

// -----------------------------
// Hide Keywords
// -----------------------------
// Files containing these keywords will be ignored.
$hide_keywords = ""; //wimpy,config,customizer,source,plugin

// -----------------------------
// Coverart Basename
// -----------------------------
// For each folder and sub-folder, you can have a single 
// image that will be used for all files in that folder 
// or sub-folder. 
//
// For example, if you have a folder set up as:
// myFolder/
//		coverart.jpg
//		track1.mp3
//		track2.mp3
// Then all the tracks in "myFolder" will use the "coverart.jpg" file
//
// This setting allows you to specify the filename to look for.
//
// For the sake of flexability, so you can use png or jpg 
// without having to modify this script, we are just defining 
// the "base name" to look for -- the file name without the extension.
//
// For example, the "base name" of this file: coverart.jpg
// is "coverart".
$coverartBasename = "coverart"; 

// -----------------------------
// Find All Media
// -----------------------------
// When set to "true", will recursively search through all subdirectoies. 
$findAllMedia = false; // false true

// -----------------------------
// Quirks Mode
// -----------------------------
// This allows for files to be manually sorted within the folder.
// Provides a means to sort files manually based on numbers within the file name.
// When relying on the file name to display the title in the playlist, wimpy will 
// discard the numbers and only display the text "between the dots" for the track title.
// If using the getID3 library the actual track titles will appear, yet still be 
// sorted according to the numbering system.
// Example: 
// 1.XYZ-MyTrack.mp3 would display as "XYZ-MyTrack", but will display first because 1
// 2.ABC-MyTrack.mp3 would display as "ABC-MyTrack", but will display second because 2
//
// If you have more than 10 items, you may want to use a "lettering" numbering system
// Because computers don't recognize tens, hundred, thousands when numbers are mized with
// letters.
// aaa.Track X.mp3
// aab.Track Y.mp3
// aac.Track Z.mp3
// aad.Track A.mp3
// aae.Track B.mp3
// aaf.Track C.mp3
//
// NOTE: When using this option, $sortIndex is automatically over-ridden to "file".
// You may still use the $sortOrder option.
$quirksmode = false;


// -------------------
// URL Style
// -------------------
// VALUES
// 1 = from the root 	/path/to/file.mp3
// 2 = full URL 		http://www.yoursite.com/path/to/file.mp3
$urlStyle = 1;


// -------------------
// Cross Domain Accessible
// -------------------
// Allows this script to be called from another domain (or local file system).
$allowCrossDomainAccess = true;


// -------------------
// Limit Files
// -------------------
// Limits the number of files that are returned
// -1 = no limit.
// [1-n] = integer representing the maximum number of files that can be returned.
// $limitFiles = 50; // 50 files will be returned.
// $limitFiles = -1; // no limit.
$limitFiles = -1;


// -------------------
// Ignore Folders
// -------------------
// Does not include folders in the returned playlist.
$ignoreFolders = false;

// -------------------
// Encrypt Filenames
// -------------------
// Filenames will not display as traditional URL's rather they will be "base64 encoded.
$encrypt = false;


/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//
//                IMPORTANT !
//   Wimpy over-rides teh GETID3 options through query-strings
//   (in the $_REQUEST or $_POST). This allows Wimpy to be
//   configure getid3 from the client. 
//  
//   We've left these options for you in case you are using 
//   wimpy.php to retrieve XML playlists and you're 
//   some kind of wizard.
//
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//
//                MUCHO IMPORTANT-ARINO !
// 
//   You'll need to ensure the "getid3" library is located in 
//   the same folder as this file. The "getid3" library is a
//   folder included in the wimpy downlaod package. The entire
//   folder needs to be "next to" wimpy.php.
//
//   Example:
//   path/to/wimpy.php
//   path/to/getid3/*
//
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////


// -----------------------------
// Get ID3 Info
// -----------------------------
// Requires the getid3 library.
$getID3info = false;

// -----------------------------
// Extract Image
// -----------------------------
// Requires the getid3 library.
// Extracts embedded image from ID3.
// Embedded image must be either PNG or JPG
// May cause playlists to load slowly since the extracted data gets inserted into the playlist as base64'd data.
$getID3image = false;


/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//
//               IMPORTANTE AMIGO!
//
//   NOTE: Any changes you make to the sorting 
//   options will not translate into the player. 
//   Because Wimpy has it's own built-in sorting 
//   mechanisms on the client-side. 
//   
//   We've left these options for you in case you are using 
//   wimpy.php to retrieve XML playlists and you're 
//   some kind of wizard.
//
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////

// -----------------------------
// Shuffle Files
// -----------------------------
// Randomizes the file list order. (Does not randomize folder lists.)
$shuffle = false;

// -----------------------------
// Sort Order
// -----------------------------
// Sets the sort order for files.
// VALUES
// asc 	- Ascending (A-Z);
// dec 	- Descending (Z-A);
$sortOrder = "asc";



// -----------------------------
// Sort Index
// -----------------------------
// Which field to sort on:
// VALUES
// none 	- don't sort
// date 	- Modification date of the file on the server
// artist 	- GetID3 options must be enabled
// title 	- Generally the "base name" of the file. Or if using GetID3 option, the actual title in the ID3 tag.
// file		- um
// ... any other field present.
// NOTE: When using quirksmode the value set here is overriddden and automatically set to "file"
$sortIndex = "none";



// -----------------------------
if($httpOption=="auto"){$a=false;if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') {$a=true;} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])


&& $_SERVER['HTTP_X_FORWARDED_PROTO']=='https'


|| !empty($_SERVER['HTTP_X_FORWARDED_SSL'])


&& $_SERVER['HTTP_X_FORWARDED_SSL']=='on') {$a=true;}$httpOption=$a ? 'https' : 'http';}if($quirksmode){$sortIndex="file";}define("newline","\r\n");define("slash",DIRECTORY_SEPARATOR);$b=array();$b['allowFolderNavigation']=$allowFolderNavigation;$b['allowCrossDomainAccess']=$allowCrossDomainAccess;$b['coverartBasename']=$coverartBasename;$b['playlistKind']=$playlistKind;$b['quirksmode']=$quirksmode;$b['urlStyle']=$urlStyle;$b['limitFiles']=$limitFiles;$b['ignoreFolders']=$ignoreFolders;$b['encrypt']=$encrypt;$b['getID3info']=$getID3info;$b['getID3image']=$getID3image;$b['shuffle']=strtolower($shuffle);$b['sortOrder']=strtolower($sortOrder);$b['sortIndex']=$sortIndex;$b['media_types']=explode(",",$media_types);$b['hide_keywords']=explode(",",$hide_keywords);$b['hide_folders']=explode(",",$hide_folders);$b['hide_files']=explode(",",$hide_files);$c=null;if ( @get_magic_quotes_gpc () ){function d ( &$e ){if ( !is_array ( $e ) ){return;}foreach ( $e as $f=>$g ){is_array ( $e[$f] ) ? d ( $e[$f] ) : ( $e[$f]=stripslashes ( $e[$f] ) );}}$h=array ( &$_GET,&$_POST,&$_COOKIE,&$_REQUEST);d ( $h );}function cleanQuotedHTML($i) {$i=$i[1];$j=html_entity_decode($i,k,"ISO-8859-1");     $j=preg_replace('/&#(\d+);/me',"chr(\\1)",$j);     $j=preg_replace('/&#x([a-f0-9]+);/mei',"chr(0x\\1)",$j);
return utf8_encode(rawurlencode($j));}function l($m){$n=$m;$n= preg_replace_callback('/(&#[0-9a-fx]+;)/mi','cleanQuotedHTML',$n);$n=str_replace("&#x","__AMP_PUOND__",$n);$n=str_replace("&#","__AMP_PUOND__",$n);$n=str_replace("&","__AMP__amp;",$n);$n=str_replace("<","__AMP__lt;",$n);$n=str_replace(">","__AMP__gt;",$n);$n=str_replace("'","__AMP__apos;",$n);$n=str_replace('"',"__AMP__quot;",$n);$n=str_replace('%',"__PERCENT__",$n);$n=o($n);$n=str_replace("__AMP_PUOND__","&#x",$n);$n=str_replace("__AMP__amp;","&amp;",$n);$n=str_replace("__AMP__lt;","&lt;",$n);$n=str_replace("__AMP__gt;","&gt;",$n);$n=str_replace("__AMP__apos;","&apos;",$n);$n=str_replace("__AMP__quot;","&quot;",$n);$n=str_replace('__PERCENT__',"%",$n);return $n;}function o($p)
{$q="";$r;if (empty($p))


{return $q;}$s=strlen($p);for ($t=0; $t<$s; $t++)
{$r=ord($p{$t});if (($r==0x9) ||
($r==0xA) ||
($r==0xD) ||
(($r>=0x28) && ($r<=0xD7FF)) ||
(($r>=0xE000) && ($r<=0xFFFD)) ||
(($r>=0x10000) && ($r<=0x10FFFF)))
{$q .=chr($r);}else
{$q .=" ";}}return $q;}function u($m,$v=false) {global $encrypt;$n=$m;$n=str_replace("&","%26",$n);$n=str_replace("?","%3F",$n);if($encrypt){$n="__1".base64_encode($n);}return $n;}if(@ini_get('safe_mode')){print('<'.urldecode("%3F").'xml version="1.0" '.urldecode("%3F").'>');print('<playlist>');print('<item>');print('<file>ERROR</file>');print('<title>1. ERROR</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>2. PHP is running in "Safe Mode".</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>3. Contact Server Admin to Correct.</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>4. ------------------</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>5. You can still use Rave,</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>6. however all URLs must be</title>');print('</item>');print('<item>');print('<file>ERROR</file>');print('<title>7. entered manually.</title>');print('</item>');print('</playlist>');exit;}function w($x){$y="__:__";$q=str_replace("://",$y,$x);$q=str_replace("\\","/",$q);$q=str_replace("//","/",$q);$q=str_replace($y,"://",$q);if(substr($q,-1)=="/"){$q=substr($q,0,sizeof($q)-1);}return $q;}if(!isset($_SERVER['SCRIPT_NAME'])){$_REQUEST=get_defined_vars();$_SERVER=$z;}$Za=explode("/",$_SERVER['PHP_SELF']);$Zb=array_pop($Za);$Zc['wwwroot']=$httpOption."://".$_SERVER['HTTP_HOST'];$Zc['www']=$Zc['wwwroot'].(implode("/",$Za));$Zc['wwwself']=$Zc['wwwroot'].$_SERVER['PHP_SELF'];if(!@getcwd ()){$Zd=dirname(__FILE__);}else{$Zd=getcwd();}$Zc['sys']=w($Zd);$Ze=strrev ( $Zd );$Zf=strrev ( Zg($Zc['www']) );$Zh=strrev ( substr($Ze,strlen($Zf) ) );$Zc['sysroot']=$Zh;function Zi($Zj,$Zk){foreach($Zj as $p){if(@stristr(strtolower($Zk),strtolower($p))){return true;}}return false;}function Zl($Zm,$Zn=false) {global $b;if($Zn){$Zo=$Zn;}else{$Zo=$b['media_types'];}$Zp=array ();if(!$Zm || $Zm==""){$Zm=".";}$Zq=$b['hide_folders'];$Zr=$b['hide_files'];$Zs=$b['hide_keywords'];$Zt=@opendir($Zm);if($Zm){while (false !==($Zu=@readdir($Zt))){if($Zu!='.' && $Zu!='..') {$Zu=$Zm.'/'.str_replace("\\","/",$Zu);$Zv=Zw($Zu);if(is_dir($Zu)) {if(!Zi($Zq,$Zv['filename']) && !Zi($Zs,$Zv['filename'])){$Zp=array_merge($Zp,Zl($Zu,$Zo));}}else{if(in_array(strtolower($Zv['ext']),$Zo)){if(!Zi($Zr,$Zv['filename']) && !Zi($Zs,$Zv['filename'])){$Zp[]=$Zu;}}}}}@closedir($Zt);}return $Zp;}function Zx($Zm){global $b;$Zy=array();$Zz=array ();$ZZa=array ();$Zp=array ();$Zt=@opendir($Zm);$ZZb=$b['media_types'];$Zq=$b['hide_folders'];$Zr=$b['hide_files'];$Zs=$b['hide_keywords'];$ZZc=$b['allowFolderNavigation'];if($Zm){while (false !==($Zu=@readdir($Zt))){if($Zu !='.' && $Zu !='..' && substr ($Zu,0,1 ) !="..") {$Zu=$Zm.'/'.str_replace("\\","/",$Zu);$Zv=Zw($Zu);if(is_dir($Zu) && $ZZc==true) {if(!Zi($Zq,$Zv['filename']) && !Zi($Zs,$Zv['filename'])){$ZZa[]=$Zu;}}else{if(in_array(strtolower($Zv['ext']),$ZZb)){if(!Zi($Zr,$Zv['filename']) && !Zi($Zs,$Zv['filename'])){$Zp[]=$Zu;}}}}}@closedir($Zt);}$Zz['dirs']=$ZZa;$Zz['files']=$Zp;return $Zz;}function ZZd ($ZZe,$ZZf,$ZZg,$ZZh=false,$ZZi=false) {if(is_array($ZZe) && count($ZZe)>0) {foreach(array_keys($ZZe) as $f) {$ZZj[$f]=@$ZZe[$f][$ZZf];}if(!$ZZh) {if ($ZZg=='asc'){asort($ZZj);}else{
arsort($ZZj);}}else{if ($ZZi===true) {natsort($ZZj);}else{natcasesort($ZZj);}if($ZZg !='asc') {$ZZj=array_reverse($ZZj,true);}}foreach(array_keys($ZZj) as $f) {if (is_numeric($f)) {$ZZk[]=$ZZe[$f];}else{$ZZk[$f]=$ZZe[$f];}}return $ZZk;}else{return $ZZe;}}function ZZl($ZZm,$ZZn=false){print "<pre>";print_r($ZZm);print "</pre>";if($ZZn){exit;}}function ZZo($ZZp){$n="";foreach($ZZp as $f=>$g){$n .="<".$f.">".l(trim($g))."</".$f.">".newline;}return $n;}function ZZq($ZZr,$ZZs=false){global $b,$Zc;$ZZt=$b['coverartBasename'];$ZZu=utf8_decode(rawurldecode($ZZr));if($ZZs){$ZZv['files']=Zl($ZZu);$ZZv['dirs']=array();}else{$ZZv=Zx($ZZu);}$ZZa=array();$Zp=array();$ZZw=array();$ZZx=$b['quirksmode'];$ZZy=$b['getID3info'];$ZZz=$b['getID3image'];if( ! $b['ignoreFolders']){if(sizeof($ZZv['dirs'])>0){$ZZZa=$ZZv['dirs'][0];$ZZZb=Zw($ZZZa);$ZZZc=Zw($ZZZb['basepath']);$ZZZd=ZZZe($ZZZc['basepath']);for($t=0; $t<sizeof($ZZv['dirs']); $t++){$ZZZa=$ZZv['dirs'][$t];$ZZZb=Zw($ZZZa);$ZZZd=ZZZe($ZZZa);$ZZZf=array();$ZZZg="";$ZZZf['date']=filemtime($ZZZa);$ZZZf['file']=$Zc['wwwself']."?".$ZZZg."d=".u($ZZZd,true);$ZZZf['image']=ZZZh($ZZZa.slash.$ZZt);$ZZZf['kind']="xml";$ZZZi=$ZZZb['filename'];if($ZZx){$ZZZj=explode(".",$ZZZi);if(sizeof($ZZZj)>1){array_shift($ZZZj);}$ZZZi=implode($ZZZj);}$ZZZf['title']=preg_replace ('/_/'," ",$ZZZi);$ZZa[]=$ZZZf;}}}if(sizeof($ZZv['files'])>0){for($t=0; $t<sizeof($ZZv['files']); $t++){$ZZZa=$ZZv['files'][$t];$ZZZb=Zw($ZZZa);$ZZZd=ZZZe($ZZZa);$ZZZf=array();$ZZZf['date']=filemtime($ZZZa);$ZZZf['file']=u( $ZZZd );$ZZZk=$ZZZb['ext'];$ZZZf['kind']=$ZZZk;if($ZZy){$ZZZl=ZZZm($ZZZa);}else{$ZZZl=array();}foreach($ZZZl as $f=>$g){if($f=='track_number'){$ZZZf['index']=$g;} else if($f=='album' || $f=='year'){$ZZZf[$f]=$g;}}if(@$ZZZl['artist']){$ZZZf['artist']=@$ZZZl['artist'];}if( ! @$ZZZl['artist'] && @$ZZZf['band']){$ZZZf['artist']=@$ZZZf['band'];}$ZZZi=$ZZZb['basename'];if($ZZx){$ZZZj=explode(".",$ZZZi);if(sizeof($ZZZj)>1){array_shift($ZZZj);}$ZZZi=implode($ZZZj);}$ZZZf['title']=(@$ZZZl['title'])? @$ZZZl['title'] : preg_replace ('/_/'," ",$ZZZi);if(@$ZZZl['genre']){$ZZZf['genre']=@$ZZZl['genre'];}if( isset($ZZZl['link']) ){$ZZZf['link']=$ZZZl['link'];}$ZZZn=ZZZh($ZZZb['basepath'].slash.$ZZZb['basename']);if( ! $ZZZn ){if( isset($ZZZl['imageExists']) || isset($ZZZl['image'])){$ZZZn=$Zc['wwwself']."?jj=".u($ZZZd,true);}if( ! $ZZZn ){$ZZZn=ZZZh($ZZZb['basepath'].slash.$ZZt);}}if($ZZZn){$ZZZf['image']=$ZZZn;}if( isset($ZZZl['index']) ){$ZZZf['index']=$ZZZl['index'];}$Zp[]=$ZZZf;}}if($b['shuffle']==true){shuffle($Zp);
}else{if($b['sortIndex'] !="none"){$ZZZo=$b['sortIndex'];$ZZZp=$b['sortOrder'];$Zp=ZZd ($Zp,$ZZZo,$ZZZp,true,false);$ZZa=ZZd ($ZZa,$ZZZo,$ZZZp,true,false);}}$n="";$ZZZq=$b['playlistKind'];if($ZZZq=="xml"){$ZZZr=l(ZZZh($ZZu.slash.$ZZt));$ZZZs="";if($ZZZr){$ZZZs= ' image="'.$ZZZr.'"';}$n="<playlist$ZZZs>".newline;} else if($ZZZq=="json"){$ZZZt=array();$ZZZt["cover"]=$ZZZr;}else{$n="";}if($ZZZq=="json"){$ZZZt["items"]=array();}for($t=0; $t<sizeof($ZZa); $t++){if($ZZZq=="xml"){$n .='<item>'.newline;$n .=ZZo($ZZa[$t]);$n .="</item>".newline;} else if($ZZZq=="json"){$ZZZt["items"][]=$ZZa[$t];}else{$n .=$ZZa[$t]['filename'].newline;}}$ZZZu=$b['limitFiles'];if($ZZZu>-1){$Zp=array_slice ($Zp,0,$ZZZu);}for($t=0; $t<sizeof($Zp); $t++){if($ZZZq=="xml"){$n .='<item>'.newline;$n .=ZZo($Zp[$t]);$n .="</item>".newline;} else if($ZZZq=="json"){$ZZZt["items"][]=$Zp[$t];}else{$n .=$Zp[$t]['file'].newline;}}if($ZZZq=="xml"){$n .="</playlist>";} else if($ZZZq=="json"){$n=@json_encode($ZZZt,ZZZv | ZZZw);}if($b['urlStyle']==1){$n=Zg($n);}@clearstatcache();return $n;}function Zw($ZZZx) {$ZZZx=str_replace("\\","/",$ZZZx);$ZZZy=explode("/",$ZZZx);$ZZZz=array_pop($ZZZy);$ZZZZa=explode(".",$ZZZz);$ZZZZb=array_pop($ZZZZa);$ZZZZc=implode(".",$ZZZZa);$ZZZZd=join("/",$ZZZy);$ZZZZe=array();$ZZZZe['filename']=$ZZZz;$ZZZZe['ext']=$ZZZZb;$ZZZZe['extension']=$ZZZZb;$ZZZZe['basename']=$ZZZZc;$ZZZZe['basepath']=$ZZZZd;return $ZZZZe;}function ZZZm($ZZZZf){global $b,$c;if($b['getID3info'] && $c){if($b['getID3image']){$c->option_save_attachments=true;}else{$c->option_save_attachments=false;}$ZZZZg=$c->analyze(urldecode($ZZZZf));getid3_lib::CopyTagsToComments($ZZZZg);}else{$ZZZZg=array();}$n=array();if(sizeof($ZZZZg)>0){if(isset($ZZZZg['comments_html'])){$ZZZZh=@$ZZZZg['comments_html'];foreach($ZZZZh as $f=>$g){if($f=="comment"){$ZZZZi=$ZZZZh["comment"][0];$ZZZZj=@$ZZZZh["encoded_by"][0];if($ZZZZj && stristr ($ZZZZj,"itunes") ){$ZZZZi=@$ZZZZg["tags_html"]["id3v2"]["comment"][3];}$n["comment"]=$ZZZZi;}else{$n[$f]=$g[0];}}}if(isset($ZZZZg['tags_html'])){if(isset($ZZZZg['tags_html']['id3v1'])){if(isset($ZZZZg['tags_html']['id3v1']['track'])){$n['index']=@$ZZZZg['tags_html']['id3v1']['track'][0];}}if(isset($ZZZZg['tags_html']['id3v2'])){if(isset($ZZZZg['tags_html']['id3v2']['comment'])){foreach($ZZZZg['tags_html']['id3v2']['comment'] as $f=>$g){if(is_string($g)){if(substr($g,0,4)=="http"){$n["link"]=$g;break;}}}}}}if(isset($ZZZZg['id3v2']['APIC'][0]['mime'])){$n['imageExists']=1;
}if($b['getID3image']){if(isset($ZZZZg['comments']['picture'][0]['data'])){$n['image']=$ZZZZg['comments']['picture'][0]['data'];$n['imageMime']=$ZZZZg['comments']['picture'][0]['image_mime'];}}}return $n;}function ZZZh($ZZZZk){$n="";$ZZZZl=array("png","jpg","PNG","JPG");for($t=0;$t<count($ZZZZl); $t++){$ZZZk=$ZZZZl[$t];$ZZZZm=$ZZZZk.".".$ZZZk;if (@is_file($ZZZZm)){$n=ZZZe($ZZZZm);break;}}return $n;}function ZZZZn($ZZZZo){global $Zc;$ZZZZp=w(rawurldecode($ZZZZo));$ZZZZq=$ZZZZp;if( substr($ZZZZp,0,4)=="http" ){$ZZZZq=$Zc['sys'].slash.substr($ZZZZp,strlen($Zc['www']),strlen($ZZZZp));} else if( substr($ZZZZp,0,1)=="/" ){$ZZZZq=$Zc['sysroot'].slash.$ZZZZq;} else if( substr($ZZZZp,0,1) !="/" ){$ZZZZq=$Zc['sys'].slash.$ZZZZq;}$ZZZZq=str_replace("//","/",$ZZZZq);return $ZZZZq;}function ZZZe($ZZZZr){global $Zc,$b;$ZZZZp=w($ZZZZr);$ZZZZq=$Zc['www'].substr($ZZZZp,strlen($Zc['sys']),strlen($ZZZZp));if($b['urlStyle']==1){$ZZZZq=Zg($ZZZZq);}return $ZZZZq;}function Zg($ZZZZo){global $Zc;$ZZZZr=str_replace($Zc['wwwroot'],"",$ZZZZo);return $ZZZZr;}function ZZZZs($ZZZZt,$ZZZz,$ZZZZu) {header("Pragma: public",false);header("Expires: Thu,19 Nov 1981 08:52:00 GMT",false);header("Cache-Control: must-revalidate,post-check=0,pre-check=0",false);header("Cache-Control: no-store,no-cache,must-revalidate",false);header("Cache-Control: private",false);header("Content-Type: ".$ZZZZu);header("Content-Disposition: attachment; filename=\"$ZZZz\"",false);header("Content-Transfer-Encoding: Binary",false);readfile ($ZZZZt);
exit;}function ZZZZv($ZZZZw){global $b;$ZZZZx='<'.urldecode("%3F").'xml version="1.0" encoding="UTF-8"'.urldecode("%3F").'>';header("Pragma: public",false);header("Expires: Thu,19 Nov 1981 08:52:00 GMT",false);header("Cache-Control: must-revalidate,post-check=0,pre-check=0",false); header("Cache-Control: no-store,no-cache,must-revalidate",false);header("Content-Type: text/xml; charset=utf-8",false);if($b['allowCrossDomainAccess']){header('Access-Control-Allow-Credentials: true',false); header('Access-Control-Allow-Origin: *',false);header('Access-Control-Allow-Methods: GET,POST',false);header('Access-Control-Allow-Headers: Content-Type',false);}print ($ZZZZx.$ZZZZw);exit;}function ZZZZy($ZZZZz){global $b;header("Pragma: public",false);header("Expires: Thu,19 Nov 1981 08:52:00 GMT",false);header("Cache-Control: must-revalidate,post-check=0,pre-check=0",false);header("Cache-Control: no-store,no-cache,must-revalidate",false);header("Content-Type: text/plain; charset=utf-8");if($b['allowCrossDomainAccess']){header('Access-Control-Allow-Credentials: true',false); header('Access-Control-Allow-Origin: *',false);header('Access-Control-Allow-Methods: GET,POST',false);header('Access-Control-Allow-Headers: Content-Type',false);}print ($ZZZZz);exit;}function ZZZZZa($ZZZZZb=false){global $ZZZZZc,$b,$c;if ( $ZZZZZc["i"] ){$b['getID3info']=true;if ( $ZZZZZc["j"] ){$b['getID3image']=true;}}if($b['getID3info']){$ZZZZZd='wimpy.getid3'.slash.'getid3.php';if (is_file($ZZZZZd)){require ($ZZZZZd);} else if(is_file('getid3.php')){require ('getid3.php');}else{$b['getID3info']=false;}}if($b['getID3info']){$c=new getID3;if($ZZZZZb){$c->option_save_attachments=true;}}}function ZZZZZe ($g) {if( substr($g,0,3)=="__1" ){return base64_decode( substr($g,3,strlen($g)) );}else{return $g;}}function ZZZZZf($j){$n=rawurldecode($j); $n=ZZZZZe($n);$n=rawurldecode($n); $n=stripslashes($n);$n=strip_tags($n);$n=str_replace("\\","x",$n);$n=str_replace("..","x",$n);$n=str_replace("./","x",$n);$n=str_replace("/.","x",$n);return $n;}function ZZZZZg(){header("HTTP/1.0 404 Not Found",false);print("<H1>404 Not Found</H1>");exit;}$ZZZZZc["d"]=ZZZZZf( @$_REQUEST['d'] );$ZZZZZc["f"]=ZZZZZf( @$_REQUEST["f"] );$ZZZZZc["jj"]=ZZZZZf( @$_REQUEST["jj"] );$ZZZZZc["v"]=isset($_REQUEST["v"]) || array_key_exists("v",$_REQUEST);$ZZZZZc["o"]=isset($_REQUEST["o"]) || array_key_exists("o",$_REQUEST);$ZZZZZc["i"]=isset($_REQUEST["i"]) || array_key_exists("i",$_REQUEST);$ZZZZZc["j"]=isset($_REQUEST["j"]) || array_key_exists("j",$_REQUEST);if($ZZZZZc["v"]){print $wimpyVersion;exit;} else if ($ZZZZZc["o"]){print "ok";exit;} else if ($ZZZZZc["d"]){ZZZZZa();$ZZZZZh=ZZZZn($ZZZZZc["d"]);if(file_exists ($ZZZZZh)){if($b['playlistKind']=="xml"){header("Content-Type: text/xml; charset=utf-8",false);ZZZZv(ZZq($ZZZZZh,false));}else{header("Content-Type: text/plain; charset=utf-8",false);ZZZZy(ZZq($ZZZZZh,false));}}else{if($b['playlistKind']=="xml"){header("Content-Type: text/xml; charset=utf-8",false);print("<playlist><item><title>ERROR</title></item></playlist>");}else{header("Content-Type: text/plain; charset=utf-8",false);print("ERROR");}}} else if ($ZZZZZc["f"]){$ZZZZZi=$ZZZZZc["f"];$ZZZZZj=Zw($ZZZZZi);$ZZZZZk=true;if( in_array ($ZZZZZj['ext'],$b['media_types']) ){$ZZZZZh=ZZZZn($ZZZZZi);if( file_exists ($ZZZZZh) ){$ZZZZZk=false;ZZZZs($ZZZZZh,$ZZZZZj['filename'],"application/octet-stream");}}if($ZZZZZk){ZZZZZg();}} else if ($ZZZZZc["jj"]){$ZZZZZh=ZZZZn ( $ZZZZZc["jj"] );$ZZZZZk=true;if( file_exists ($ZZZZZh) ){$b['getID3info']=true;$b['getID3image']=true;ZZZZZa(true);$ZZZl=ZZZm($ZZZZZh);if( isset($ZZZl["image"]) ){$ZZZZZk=false;$ZZZZZl=$ZZZl["image"];$ZZZZu=$ZZZl["imageMime"];header('Content-type: '.$ZZZZu);echo $ZZZZZl;}else{$ZZZZZm=ZZZh($Zc['sys'].slash.$b['coverartBasename']);if($ZZZZZm){$ZZZZZk=false;$ZZZZZj=Zw($ZZZZZm);header("Content-Type: image/".$ZZZZZj['ext']);readfile($ZZZZZm);}}}if($ZZZZZk){ZZZZZg();}}else{ZZZZZa();if($b['playlistKind']=="xml"){ZZZZv(ZZq($Zc['sys'],$findAllMedia,false));}else{ZZZZy(ZZq($Zc['sys'],$findAllMedia,false));}}?>