<h1>JSM&#039;s Force SSL / HTTPS</h1>

<table>
<tr><th align="right" valign="top" nowrap>Plugin Name</th><td>JSM&#039;s Force SSL / HTTPS</td></tr>
<tr><th align="right" valign="top" nowrap>Summary</th><td>A fast and effective plugin to force webpage and media library URLs from HTTP to HTTPS with a permanent redirect.</td></tr>
<tr><th align="right" valign="top" nowrap>Stable Version</th><td>1.1.3</td></tr>
<tr><th align="right" valign="top" nowrap>Requires At Least</th><td>WordPress 3.7</td></tr>
<tr><th align="right" valign="top" nowrap>Tested Up To</th><td>WordPress 4.8.2</td></tr>
<tr><th align="right" valign="top" nowrap>Contributors</th><td>jsmoriss</td></tr>
<tr><th align="right" valign="top" nowrap>License</th><td><a href="https://www.gnu.org/licenses/gpl.txt">GPLv3</a></td></tr>
<tr><th align="right" valign="top" nowrap>Tags / Keywords</th><td>redirect, force, ssl, https, upload, force_ssl, force_ssl_admin, force_ssl_login, upload_dir, proxy, load balancing, permanent</td></tr>
</table>

<h2>Description</h2>

<p><strong>An fast and effective way to make sure that all the HTTP URLs get redirected to HTTPS, including the WordPress upload folder for uploaded images and media.</strong></p>

<p><strong>This plugin is significantly different than most other plugins of its type</strong> &mdash; other plugins generally create an output filter using <a href="http://php.net/manual/en/function.ob-start.php">PHP's output buffering</a> to search / replace URLs within the webpage document. This is much slower (and error prone) than using the WordPress 'upload_dir' filter and permanent (301) redirects (<a href="https://en.wikipedia.org/wiki/HTTP_301">which is considered best practive when moving from HTTP to HTTPS</a>).</p>

<p>The plugin defines the following constants (if not already defined), then makes sure that all front-end HTTP requests are redirected to their HTTPS equivalent:</p>

<ul>
<li>FORCE_SSL</li>
<li>FORCE_SSL_ADMIN</li>
<li>FORCE_SSL_LOGIN</li>
</ul>

<p>The plugin also hooks the WordPress 'upload_dir' filter, to make sure that all upload directory URLs match the required protocol.</p>

<p>The plugin checks and honors the following proxy / load-balancing web server variables:</p>

<ul>
<li>HTTP_X_FORWARDED_PROTO</li>
<li>HTTP_X_FORWARDED_SSL</li>
</ul>

<blockquote>
<p>There are no plugin settings &mdash; simply install and activate the plugin.</p>
</blockquote>

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
<li>Download the plugin archive file.</li>
<li>Go to the wp-admin/ section of your website.</li>
<li>Select the <em>Plugins</em> menu item.</li>
<li>Select the <em>Add New</em> sub-menu item.</li>
<li>Click on <em>Upload</em> link (just under the Install Plugins page title).</li>
<li>Click the <em>Browse...</em> button.</li>
<li>Navigate your local folders / directories and choose the zip file you downloaded previously.</li>
<li>Click on the <em>Install Now</em> button.</li>
<li>Click the <em>Activate Plugin</em> link.</li>
</ol>


<h2>Frequently Asked Questions</h2>

<h4>Frequently Asked Questions</h4>

<ul>
<li>None</li>
</ul>


<h2>Other Notes</h2>

<h3>Other Notes</h3>
<h4>Additional Documentation</h4>

