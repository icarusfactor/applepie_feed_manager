<?php
/**
 * @package  Appleipie Feed Manger Plugin
 */
/*
Plugin Name: Applepie Feed Manager Plugin
Plugin URI: http://userspace.org
Description: Admin Plugin to pull tablepress tables data and parse and insert into ap feeds table that prioritize and display RSS feeds.
Version: 1.0.1
Author: Daniel Yount aka icarus[factor] factorf2@yahoo.com
Author URI: http://userfspace.org
License: GPLv2 or later
Text Domain: ap-feed-manager-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

if ( !class_exists( 'ApplepieFeedManagerPlugin' ) ) {

	class ApplepieFeedManagerPlugin
	{

		public $plugin;

		function __construct() {
			$this->plugin = plugin_basename( __FILE__ );
		}

		function register() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

			add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

			add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );

           add_action( 'wp_ajax_extractprocess', array( $this, 'extractprocess' ) );

		}

		public function settings_link( $links ) {
			$settings_link = '<a href="admin.php?page=applepiefeedmanager_plugin">Settings</a>';
			array_push( $links, $settings_link );
			return $links;
		}

		public function add_admin_pages() {
			add_menu_page( 'apfeedmanager', 'APFM', 'manage_options', 'applepiefeedmanager_plugin', array( $this, 'admin_index' ), 'dashicons-images-alt2', 110 );
		}

		public function admin_index() {
			require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
		}

		function enqueue() {
			// enqueue all our scripts
			wp_enqueue_style( 'apfmpluginstyle', plugins_url( '/assets/apfmstyle.css', __FILE__ ) );

           wp_enqueue_style('apfmbootcss', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
            wp_enqueue_script('apfmpopper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
            wp_enqueue_script('apfmboot', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');

           
            wp_enqueue_script('apfm-script5', plugin_dir_url(__FILE__).'assets/apfmscript5.js');
            wp_localize_script('apfm-script5', 'apfmajax_object', array('ajaxapfm_url' => admin_url('admin-ajax.php'), 'if_ajaxid' => 005));
		}

		function activate() {
			require_once plugin_dir_path( __FILE__ ) . 'inc/applepie-feed-manager-plugin-activate.php';
			ApplepieFeedManagerPluginActivate::activate();
		}


                function extractprocess() {
                      //Use this value to validate each data set is only for this plugin.
                      $unique_value = $_POST['if_ajaxid'];
                      if($unique_value == '005') {
                    
                         $plugin= 'rseed_appLe/rseed-app.php' ;
                         $btn_id = $_POST['post_id']; 
                         $sel = substr( $btn_id , 3, 1);
                         $act = substr( $btn_id , 4, 1);
                         $selected = intval($sel); 
                         $selected--;                         

                         $apfmrc=new APFMrssctrl();
                         $section_names = $apfmrc->section_names();
                         $section_content = $apfmrc->section_content();
                         $section_items = $apfmrc->section_items( $section_content[$selected] );
                         $section_db_news =  $apfmrc->database_view( "Linux News Feeds" );
                         $section_db_videos =  $apfmrc->database_view( "Linux News Videos" );
                         $section_db_audio =  $apfmrc->database_view( "AUDIO FEED SOURCES" );
                         $section_db_infosec =  $apfmrc->database_view( "INFOSEC SOURCES" );

                         //$Content .= $act;
                         //$Content .= "<BR>";
                         //$Content .= $section_names[$selected];
                         $Content = "<PRE>";
                         $size_it = count( $section_items );

                        if( $act == "c" ) { 
                            
                          if( $sel == "0" ) {      
                           $Content .= "DISABLING APPLEPIE RAW SEED PLUGIN ";
                           $Content .= "<BR>";                          
                           if( is_plugin_active( $plugin ) ) {
                           deactivate_plugins( $plugin );
                           }
                           $Content .= "CLEARING ALL RSS CACHE ";
                           $Content .= "<BR>";    
                          }
                          if( $sel == "1" ) {                                
                           activate_plugins(  $plugin );
                           $Content .= "ENABLED APPLEPIE RAW SEED PLUGIN ";
                           $Content .= "<BR>";     
                          } 
                           
                          } //End of if visual or not.
                            
                         if( $act == "v" ) { 

                           $Content .= "VIEWING ".$size_it." ITEMS OF ".$section_names[$selected];
                           $Content .= "<BR>";
                                                 
                           $cnt=0; 
                           while($cnt <= $size_it - 1)
                               { 
                             $Content .= $section_items[$cnt][0];
                             $Content .= $section_items[$cnt][1];
                             $Content .= $section_items[$cnt][3];
                             //$Content .= $section_items[$cnt][4];
                             $Content .= "<BR>";
                             $Content .= $section_items[$cnt][2];
                             $Content .= "<BR>";
                             $Content .= "<BR>";
                             $cnt++; 
                               }
                               } //End of if visual or not.
                               
                           if( $act == "V" ) {                                

                               
                              if( $sel == "1" ) {     
                                 $Content .= "VIEWING VIDEO IN DB";
                                 $Content .= "<BR>";                                  
                                 $Content .= "<BR>";              
                                 $cntX=0;
                                 while( $cntX < count(  $section_db_videos ) ) {
                                 $Content .=  $section_db_videos[ $cntX ]."   LAST POST:".$section_db_videos[ $cntX+1 ]."<BR>" ;                                  
                                  $cntX=$cntX+2;
                                 }                                                                    

                              }
                              
                               if( $sel == "2" ) {     
                                 $Content .= "VIEWING NEWS IN DB";
                                 $Content .= "<BR>";
                                 $Content .= "<BR>";                                 
                                 $cntX=0;
                                 while( $cntX < count(  $section_db_news ) ) {
                                 $Content .=  $section_db_news[ $cntX ]."   LAST POST:".$section_db_news[ $cntX+1 ]."<BR>" ;                                  
                                  $cntX=$cntX+2;
                                 }
                                
                              }
                              
                               if( $sel == "3" ) {     
                                 $Content .= "VIEWING AUDIO IN DB";
                                 $Content .= "<BR>";                                
                                 $Content .= "<BR>";
                                 $cntX=0;
                                 while( $cntX < count(  $section_db_audio ) ) {
                                 $Content .=  $section_db_audio[ $cntX ]."   LAST POST:".$section_db_audio[ $cntX+1 ]."<BR>" ;                                  
                                  $cntX=$cntX+2;
                                 }     

                              }
                              
                               if( $sel == "4" ) {     
                                 $Content .= "VIEWING INFOSEC IN DB";
                                 $Content .= "<BR>";                         
                                 $Content .= "<BR>";
                                  $cntX=0;
                                 while( $cntX < count(  $section_db_infosec ) ) {
                                 $Content .=  $section_db_infosec[ $cntX ]."   LAST POST:".$section_db_infosec[ $cntX+1 ]."<BR>" ;                                  
                                  $cntX=$cntX+2;
                                 }     
                              }
                              
                             } //End of if visual or not.

        if( $act == "p" ) { 
        $apfmrc->push_data( $section_items , $selected );
        //error_log( "push_data".$selected );
        $Content .= "PUSHING ".$size_it." ITEMS OF ".$section_names[$selected]." TO DATABASE";
                          } 

        if( $act == "d" ) { 
        $apfmrc->clear_push_data( $selected );
        //error_log( "clear_push_data".$selected );
        $Content .= "DELETING ".$size_it." ITEMS OF ".$section_names[$selected]." FROM DATABASE";
                          } 
                         $Content .= "</PRE>";

                         echo $Content;
                         // Always die in functions echoing Ajax content
                         die();
                }  //check ajax id
                // Always die in functions echoing Ajax content
                echo "false";
                die();
             }
	}

	$applepiefeedmanagerPlugin = new ApplepieFeedManagerPlugin();
	$applepiefeedmanagerPlugin->register();

    // APFM rss ctrl class
	require_once plugin_dir_path( __FILE__ ) . 'inc/class.apfm.php';

	// activation
	register_activation_hook( __FILE__, array( $applepiefeedmanagerPlugin, 'activate' ) );

	// deactivation
	require_once plugin_dir_path( __FILE__ ) . 'inc/applepie-feed-manager-plugin-deactivate.php';
	register_deactivation_hook( __FILE__, array( 'ApplepieFeedManagerPluginDeactivate', 'deactivate' ) );

}
