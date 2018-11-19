<h1>JSM&#039;s Force SSL / HTTPS</h1><h3>Simple, Fast, Effective, Good for SEO</h3>

<table>
<tr><th align="right" valign="top" nowrap>Plugin Name</th><td>JSM&#039;s Force SSL / HTTPS</td></tr>
<tr><th align="right" valign="top" nowrap>Summary</th><td>No setup required - force HTTP URLs to HTTPS using WordPress filters for speed and reliability, along with 301 redirects for good SEO.</td></tr>
<tr><th align="right" valign="top" nowrap>Stable Version</th><td>2.0.0</td></tr>
<tr><th align="right" valign="top" nowrap>Requires At Least</th><td>WordPress 3.8</td></tr>
<tr><th align="right" valign="top" nowrap>Tested Up To</th><td>WordPress 5.0</td></tr>
<tr><th align="right" valign="top" nowrap>Contributors</th><td>jsmoriss</td></tr>
<tr><th align="right" valign="top" nowrap>License</th><td><a href="https://www.gnu.org/licenses/gpl.txt">GPLv3</a></td></tr>
<tr><th align="right" valign="top" nowrap>Tags / Keywords</th><td>redirect, force, ssl, https, upload, force_ssl, force_ssl_admin, force_ssl_login, upload_dir, proxy, load balancing, permanent</td></tr>
</table>

<h2>Description</h2>

<p><strong>A simple, fast and effective way to make sure that all HTTP URLs get rewritten / redirected to HTTPS</strong> &mdash; including the WordPress post object content, upload folder, and plugin url paths. Simply activate the plugin and you're done. ;-)</p>

<p><strong>This plugin is significantly different than most other plugins of its type</strong> (<em>in a good way</em>) &mdash; other plugins generally use <a href="https://secure.php.net/manual/en/function.ob-start.php">PHP's output buffer</a> to search / replace URLs within the webpage document. Using an output filter is much slower (and error prone) than hooking WordPress filters and using permanent (301) redirects (<a href="https://en.wikipedia.org/wiki/HTTP_301">which is considered best SEO practive when moving from HTTP to HTTPS</a>).</p>

<p>The plugin defines the following constants (if not already defined), then makes sure that all HTTP requests are rewritten / redirected to their HTTPS equivalent:</p>

<ul>
<li>FORCE_SSL</li>
<li>FORCE_SSL_ADMIN</li>
<li>FORCE_SSL_LOGIN</li>
</ul>

<p>The plugin also hooks the WordPress 'the_content', 'upload_dir', and 'plugins_url' filters to make sure that all URLs match the appropriate protocol.</p>

<p>The plugin checks and honors the following proxy / load-balancing web server variables:</p>

<ul>
<li>HTTP_X_FORWARDED_PROTO</li>
<li>HTTP_X_FORWARDED_SSL</li>
</ul>

<p>There are no plugin settings &mdash; simply <em>install</em> and <em>activate</em> the plugin.</p>

<p><strong>Requirements</strong></p>

<p>Your web server must be configured with an SSL certificate and able to handle HTTPS request. ;-)</p>


<h2>Installation</h2>

<h4>Automated Install</h4>

<ol>
<li>Go to the wp-admin/ section of your website.</li>
<li>Select the <em>Plugins</em> menu item.</li>
<li>Select the <em>Add New</em> sub-menu item.</li>
<li>In the <em>Search</em> box, enter the plugin name.</li>
<li>Click the <em>Search Plugins</em> button.</li>
<li>Click the <em>Install Now</em> link for the plugin.</li>
<li>Click the <em>Activate Plugin</em> link.</li>
</ol>

<h4>Semi-Automated Install</h4>

<ol>
<li>Download the plugin ZIP file.</li>
<li>Go to the wp-admin/ section of your website.</li>
<li>Select the <em>Plugins</em> menu item.</li>
<li>Select the <em>Add New</em> sub-menu item.</li>
<li>Click on <em>Upload</em> link (just under the Install Plugins page title).</li>
<li>Click the <em>Browse...</em> button.</li>
<li>Navigate your local folders / directories and choose the ZIP file you downloaded previously.</li>
<li>Click on the <em>Install Now</em> button.</li>
<li>Click the <em>Activate Plugin</em> link.</li>
</ol>


<h2>Frequently Asked Questions</h2>




