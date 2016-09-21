<?php 
    define('PHOT_EX', true);
    include('application/config/settings.php');
    include('application/config/config.php');
    include(LIB_PATH.'function.php');
    $D_BROWSER =& load_class('DirectoryBrowser');
    $PAGE =& load_class('Page');
    $UTIL =& load_class('Util');
    $IMAGE =& load_class('Image');
    $ENC =& load_class('Encoder');
    $JSON =& load_class('Json');
    $required_js_scripts = loadScripts('js', array('jquery-1.7.2.min.js','jquery-ui-1.8.21.min.js','projectblu.js'));
    $required_css_scripts = loadScripts('css', array('default.css','background.css','test.css'));
    
    if (isset($_POST['action'])) $action = $_POST['action'];
    else if (isset($_GET['action'])) $action = $_GET['action'];
    else $action = '';
    
	if($action == '' ) header('Location: index.php?action=home');
	
	if(isset($_GET['setup_action'])) $return_url = $_SERVER['PHP_SELF'].'?action='.$action.'&amp;setup_action='.$_GET['setup_action'];
	else if(isset($_GET['media_action'])) $return_url = $_SERVER['PHP_SELF'].'?action='.$action.'&amp;media_action='.$_GET['media_action'];
	else $return_url = $_SERVER['PHP_SELF'].'?action='.$action;
	
	$meta_title = (isset($title) ? $title : $galleryName);
	$meta_author = (isset($author) ? $author : $galleryAuthor);
	$meta_keywords = (isset($keywords) ? $keywords : $galleryKeywords);
	$meta_description = (isset($description) ? $description : $galleryDesc);
	
	$action = strtolower($action);
    include(FRAGMENTS_PATH.'main/header.php');
	
	    switch($action){
	        case 'pages':
			    echo' <div id="main-panel" class="grid-5 left-1">';
			        include(VIEW_PATH.'view_pages.php');
				    echo $RETURN_TO_TOP;
			    echo'</div>';
		    break;
			case 'credits':
			    echo' <div id="main-panel" class="grid-">';
			        include(VIEW_PATH.'credits.php');
				    echo $RETURN_TO_TOP;
			    echo'</div>';
		    break;
		
		    case 'home':
			    echo' <div id="main-panel" class="grid-5 left-1">';
		            echo'<div class="header '.$background_class.'">'.
                        '<h1>'.$galleryName.'</h1>'.
                        '<h2>version.'.$separator.VERSION.'</h2>'.
			        '</div>';
                    include(VIEW_PATH.'view_home.php');
                    echo $RETURN_TO_TOP;
		        echo'</div>';
	        break;
			
			case 'media':
			    echo' <div id="main-panel" class="grid-5 left-1">';
				    echo'<div class="header '.$background_class.'">'.
                        '<h1>'.$galleryName.$separator.ucfirst($action).'&nbsp;Page</h1>'.
			        '</div>';
					include(VIEW_PATH.'view_media.php');
					echo $RETURN_TO_TOP;
				echo'</div>';
			break;
			
	        case 'photo':
		        echo' <div id="main-panel" class="grid-5 left-1">';
				    echo'<div class="header '.$background_class.'">'.
                        '<h1>'.$galleryName.$separator.ucfirst($action).'&nbsp;Page</h1>'.
			        '</div>';
			        echo'<div class="gallery pad-2">';
					    include(VIEW_PATH.'view_photo.php');
				    echo'</div>';
					echo $RETURN_TO_TOP;
				echo'</div>';
            break;
			
            case 'show_galleries':
			    echo' <div id="main-panel" class="grid-">';
			        echo'<div class="gallery pad-1">';
					    include(VIEW_PATH.'view_gallery.php');
				    echo'</div>';
			        echo $RETURN_TO_TOP;
			    echo'</div>';
		    break;

			//case 'setup': include(VIEW_PATH.'view_setup.php'); break;
			case 'manage': include(VIEW_PATH.'view_manage.php'); break;
		}
		
		include(FRAGMENTS_PATH.'main/sidebar.php');
    include(FRAGMENTS_PATH.'main/footer.php');
	
/* end of file index.php */
/* ./index.php*/	