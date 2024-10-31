<?php

add_action('admin_menu', 'orb_club_short_link_setup_admin');

/**
 * Set up administration
 *
 * @package Orbisius Simple Shortlink
 * @since 0.1
 */
function orb_club_short_link_setup_admin() {
    add_options_page('Orbisius Simple Shortlink', 'Orbisius Simple Shortlink', 'manage_options', 
            'orb_club_short_link_settings_page', 'orb_club_short_link_settings_page');

    // when plugins are show add a settings link near my plugin for a quick access to the settings page.
    add_filter('plugin_action_links', 'orb_club_short_link_add_plugin_settings_link', 10, 2);
}

// Add the ? settings link in Plugins page very good
function orb_club_short_link_add_plugin_settings_link($links, $file) {
    if ($file == plugin_basename(ORBISIUS_SIMPLE_SHORTLINK_MAIN_PLUGIN_FILE)) {
        $link = admin_url('options-general.php?page=orb_club_short_link_settings_page');
        $link_html = "<a href='$link'>Settings</a>";
        array_unshift($links, $link_html);
    }

    return $links;
}


// Generates Options for the plugin
function orb_club_short_link_settings_page() {
    ?>

    <div class="wrap orb_club_short_link_container">

        <div id="icon-options-general" class="icon32"></div>
        <h2>Orbisius Simple Shortlink</h2>

        <div id="poststuff">

            <div id="post-body" class="metabox-holder columns-2">

                <!-- main content -->
                <div id="post-body-content">

                    <div class="meta-box-sortables ui-sortable">


                        <div class="postbox">

                            <h3><span>Usage / Help</span></h3>
                            <div class="inside">

                                This plugin doesn't currently have any configuration options at the moment.
                You can just link to your pages/posts IDs as follows
                <?php ob_start(); ?>
example.com/goto/123
example.com/page/123
example.com/link/123
example.com/post/123
example.com/id2post/123
example.com/id2page/123
example.com/id2page/123?utm_source=youtube&utm_medium=video

If your hosting provider is using Apache web server 
you can add the following line to .htaccess file.
That way you can redirect to posts/pages just by using example.com/123

# put in htaccess
RewriteRule ^/?([0-9]+)/?$ /link/$1 [QSA,L,R=302]
# /put in htaccess

                <?php 
                $ex_buff = ob_get_clean();
                $ex_buff = trim($ex_buff);
                $site_url = site_url('/');
                $ex_buff = str_replace('example.com/', $site_url, $ex_buff);
                $ex_buff = "<pre>$ex_buff</pre>";
                echo $ex_buff;
                ?>

                                <!--<iframe width="560" height="315" src="http://www.youtube.com/embed/BZUVq6ZTv-o" frameborder="0" allowfullscreen></iframe>-->

                            </div> <!-- .inside -->

                        </div> <!-- .postbox -->

<div class="postbox">
                            <?php
                                $plugin_data = get_plugin_data(ORBISIUS_SIMPLE_SHORTLINK_MAIN_PLUGIN_FILE);

                                $app_link = urlencode($plugin_data['PluginURI']);
                                $app_title = urlencode($plugin_data['Name']);
                                $app_descr = urlencode($plugin_data['Description']);
                                ?>
                                <h3>Share</h3>
                                <p>
                                    <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                    <a class="addthis_button_facebook" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_twitter" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_google_plusone" g:plusone:count="false" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_linkedin" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_email" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_myspace" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_google" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_digg" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_delicious" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_stumbleupon" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_tumblr" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_favorites" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_compact"></a>
                                </div>
                                <!-- The JS code is in the footer -->

                                <script type="text/javascript">
                                    var addthis_config = {"data_track_clickback": true};
                                    var addthis_share = {
                                        templates: {twitter: 'Check out {{title}} #WordPress #plugin at {{lurl}}'}
                                    }
                                </script>
                                <!-- AddThis Button START part2 -->
                                <script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js"></script>
                                <!-- AddThis Button END part2 -->
                        </div> <!-- .postbox -->
                        
                    </div> <!-- .meta-box-sortables .ui-sortable -->

                </div> <!-- post-body-content -->

                <!-- sidebar -->
                <div id="postbox-container-1" class="postbox-container">

                    <div class="meta-box-sortables">
                        <div class="postbox"> <!-- quick-contact -->
                            <?php
                            $current_user = wp_get_current_user();
                            $email = empty($current_user->user_email) ? '' : $current_user->user_email;
                            $quick_form_action = is_ssl()
                                    ? 'https://ssl.orbisius.com/apps/quick-contact/'
                                    : 'http://apps.orbisius.com/quick-contact/';

                            if (!empty($_SERVER['DEV_ENV'])) {
                                $quick_form_action = 'http://localhost/projects/quick-contact/';
                            }
                            ?>
                            <script>
                                var octc_quick_contact = {
                                    validate_form : function () {
                                        try {
                                            var msg = jQuery('#octc_msg').val().trim();
                                            var email = jQuery('#octc_email').val().trim();

                                            email = email.replace(/\s+/, '');
                                            email = email.replace(/\.+/, '.');
                                            email = email.replace(/\@+/, '@');

                                            if ( msg == '' ) {
                                                alert('Enter your message.');
                                                jQuery('#octc_msg').focus().val(msg).css('border', '1px solid red');
                                                return false;
                                            } else {
                                                // all is good clear borders
                                                jQuery('#octc_msg').css('border', '');
                                            }

                                            if ( email == '' || email.indexOf('@') <= 2 || email.indexOf('.') == -1) {
                                                alert('Enter your email and make sure it is valid.');
                                                jQuery('#octc_email').focus().val(email).css('border', '1px solid red');
                                                return false;
                                            } else {
                                                // all is good clear borders
                                                jQuery('#octc_email').css('border', '');
                                            }

                                            return true;
                                        } catch(e) {};
                                    }
                                };
                            </script>
                            <h3><span>Quick Question or Suggestion</span></h3>
                            <div class="inside">
                                <div>
                                    <form method="post" action="<?php echo $quick_form_action; ?>" target="_blank">
                                        <?php
                                            global $wp_version;
											$plugin_data = get_plugin_data(ORBISIUS_SIMPLE_SHORTLINK_MAIN_PLUGIN_FILE);

                                            $hidden_data = array(
                                                'site_url' => site_url(),
                                                'wp_ver' => $wp_version,
                                                'first_name' => $current_user->first_name,
                                                'last_name' => $current_user->last_name,
                                                'product_name' => $plugin_data['Name'],
                                                'product_ver' => $plugin_data['Version'],
                                                'woocommerce_ver' => defined('WOOCOMMERCE_VERSION') ? WOOCOMMERCE_VERSION : 'n/a',
                                            );
                                            $hid_data = http_build_query($hidden_data);
                                            echo "<input type='hidden' name='data[sys_info]' value='$hid_data' />\n";
                                        ?>
                                        <textarea class="widefat" id='octc_msg' name='data[msg]' required="required"></textarea>
                                        <br/>Your Email: <input type="text" class=""
                                               id="octc_email" name='data[sender_email]' placeholder="Email" required="required"
                                               value="<?php echo esc_attr($email); ?>"
                                               />
                                        <br/><input type="submit" class="button-primary" value="<?php _e('Send Feedback') ?>"
                                                    onclick="return octc_quick_contact.validate_form();" />
                                        <br/>
                                        What data will be sent
                                        <a href='javascript:void(0);'
                                            onclick='jQuery(".octc_data_to_be_sent").toggle();'>(show/hide)</a>
                                        <div class="hide-is-js app-hide octc_data_to_be_sent">
                                            <textarea class="widefat0" rows="4" readonly="readonly" disabled="disabled"><?php
                                            foreach ($hidden_data as $key => $val) {
                                                if (is_array($val)) {
                                                    $val = var_export($val, 1);
                                                }

                                                echo "$key: $val\n";
                                            }
                                            ?></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- .inside -->
                        </div> <!-- .postbox --> <!-- /quick-contact -->

                        <?php if (0) : ?>
                        <!-- Hire Us -->
                        <div class="postbox">
                            <h3><span>Hire Us</span></h3>
                            <div class="inside">
                                Hire us to create a plugin/web/mobile app
                                <br/><a href="//orbisius.com/page/free-quote/?utm_source=<?php echo str_replace('.php', '', basename(ORBISIUS_SIMPLE_SHORTLINK_MAIN_PLUGIN_FILE));?>&utm_medium=plugin-settings&utm_campaign=product"
                                   title="If you want a custom web/mobile app/plugin developed contact us. This opens in a new window/tab"
                                    class="button-primary" target="_blank">Get a Free Quote</a>
                            </div> <!-- .inside -->
                        </div> <!-- .postbox -->
                        <!-- /Hire Us -->
                        <?php endif; ?>
                        
                        <!-- qs -->
                        <div class="postbox">
                            <h3><span>Free Staging WordPress Site</span></h3>
                            <div class="inside">
                               Do you want to try themes and plugins or work on your new site? 
                               Try 
                               <a href="//qsandbox.com/?utm_source=orbisius-simple-shortlink&utm_medium=settings_screen&utm_campaign=product"
                                   target="_blank" title="[new window]">http://qsandbox.com</a> today.
                            </div> <!-- .inside -->
                        </div> <!-- .postbox -->
                        <!-- /qs -->
                        
                        <div class="postbox">
                            <h3><span>Newsletter</span></h3>
                            <div class="inside">
                                <!-- Begin MailChimp Signup Form -->
                                <div id="mc_embed_signup">
                                    <?php
                                        $current_user = wp_get_current_user();
                                        $email = empty($current_user->user_email) ? '' : $current_user->user_email;
                                    ?>

                                    <form action="http://WebWeb.us2.list-manage.com/subscribe/post?u=005070a78d0e52a7b567e96df&amp;id=1b83cd2093" method="post"
                                          id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                                        <input type="hidden" value="settings" name="SRC2" />
                                        <input type="hidden" value="orbisius-simple-shortlink" name="SRC" />

                                        <span>Get notified about cool plugins we release</span>
                                        <!--<div class="indicates-required"><span class="app_asterisk">*</span> indicates required
                                        </div>-->
                                        <div class="mc-field-group">
                                            <label for="mce-EMAIL">Email <span class="app_asterisk">*</span></label>
                                            <input type="email" value="<?php echo esc_attr($email); ?>" name="EMAIL" class="required email" id="mce-EMAIL">
                                        </div>
                                        <div id="mce-responses" class="clear">
                                            <div class="response" id="mce-error-response" style="display:none"></div>
                                            <div class="response" id="mce-success-response" style="display:none"></div>
                                        </div>	<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button-primary"></div>
                                    </form>
                                </div>
                                <!--End mc_embed_signup-->
                            </div> <!-- .inside -->
                        </div> <!-- .postbox -->

                        <?php
                                        $plugin_data = get_plugin_data(ORBISIUS_SIMPLE_SHORTLINK_MAIN_PLUGIN_FILE);
                                        $product_name = trim($plugin_data['Name']);
                                        $product_page = trim($plugin_data['PluginURI']);
                                        $product_descr = trim($plugin_data['Description']);
                                        $product_descr_short = substr($product_descr, 0, 50) . '...';

                                        $base_name_slug = basename(ORBISIUS_SIMPLE_SHORTLINK_MAIN_PLUGIN_FILE);
                                        $base_name_slug = str_replace('.php', '', $base_name_slug);
                                        $product_page .= (strpos($product_page, '?') === false) ? '?' : '&';
                                        $product_page .= "utm_source=$base_name_slug&utm_medium=plugin-settings&utm_campaign=product";

                                        $product_page_tweet_link = $product_page;
                                        $product_page_tweet_link = str_replace('plugin-settings', 'tweet', $product_page_tweet_link);
                                    ?>

                        <div class="postbox">
                            <div class="inside">
                                <!-- Twitter: code -->
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                <!-- /Twitter: code -->

                                <!-- Twitter: Orbisius_Follow:js -->
                                    <a href="https://twitter.com/orbisius" class="twitter-follow-button"
                                       data-align="right" data-show-count="false">Follow @orbisius</a>
                                <!-- /Twitter: Orbisius_Follow:js -->

                                &nbsp;

                                <!-- Twitter: Tweet:js -->
                                <a href="//twitter.com/share" class="twitter-share-button"
                                   data-lang="en" data-text="Checkout Orbisius Simple Shortlink #WordPress #plugin.Create Child Themes in Seconds"
                                   data-count="none" data-via="orbisius" data-related="orbisius"
                                   data-url="<?php echo $product_page_tweet_link;?>">Tweet</a>
                                <!-- /Twitter: Tweet:js -->


                                <br/>
                                 <a href="<?php echo $product_page; ?>" target="_blank" title="[new window]">Product Page</a>
<!--                                    |
                                <span>Support: <a href="//orbisius.com/forums/forum/community-support-forum/wordpress-plugins/orbisius-simple-shortlink/?utm_source=orbisius-simple-shortlink&utm_medium=plugin-settings&utm_campaign=product"
                                    target="_blank" title="[new window]">Forums</a>-->
                                </span>
                            </div>

                        </div> <!-- .postbox -->
                        
                    </div> <!-- .meta-box-sortables -->

                </div> <!-- #postbox-container-1 .postbox-container sidebar -->

            </div> <!-- #post-body .metabox-holder .columns-2 -->

            <br class="clear">
        </div> <!-- #poststuff -->

    </div> <!-- .wrap -->

    <?php
}

/**
 * Returns some plugin data such name and URL. This info is inserted as HTML
 * comment surrounding the embed code.
 * @return array
 */
function orb_club_short_link_top_links($slug_area = 'orbisius-simple-shortlink') {
    ob_start();
    $text_color = orb_club_short_link_is_pro_installed() ? 'green' : 'red';
    ?>
    <?php if ( $slug_area != 'orbisius-simple-shortlink' ) : ?>
        <style>
        .orb_club_short_link_container_res_wrapper {
            display: inline-block;
            text-align: right;
        }
        
        ul.orb_club_short_link_container_res_list {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        
        ul.orb_club_short_link_container_res_list li {
            display: inline-block;
            margin-left: 5px;
            margin-right: 5px;
            background: #eee;
            padding: 5px;
        }
        
        ul.orb_club_short_link_container_res_list li a {
            /*display: block;*/
        }
        </style>
    <?php endif; ?>
    
    <div class="orb_club_short_link_container_res_wrapper">
        <ul class="orb_club_short_link_container_res_list">
            <li>
                <a href="//qsandbox.com/?utm_source=<?php echo $slug_area; ?>&utm_medium=action_screen&utm_campaign=product"
                target="_blank" title="Opens in new tab/window. qSandbox is a service that allows you to setup a test/sandbox WordPress site in 2 seconds. No technical knowledge is required.
                Test themes and plugins before you actually put them on your site">Free Staging Site</a> <small>(quick set up)</small> by qSandbox
            </li>
            <li>
                <a href="//orbisius.com/products/wordpress-plugins/orbisius-simple-shortlink/?utm_source=<?php echo $slug_area; ?>&utm_medium=action_screen&utm_campaign=product" target="_blank" title="[new window]">Product Page</a>
            </li>
        </ul>
    </div>
    <?php
    $buff = ob_get_clean();

    return $buff;
}
