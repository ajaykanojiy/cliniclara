<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Tags Input</title>
    <meta name="robots" content="index, follow" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap-tagsinput-latest/')}}/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
    <link rel="stylesheet" href="{{asset('bootstrap-tagsinput-latest/examples')}}/assets/app.css">
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42755476-1', 'bootstrap-tagsinput.github.io');
    ga('send', 'pageview');
    </script>
  </head>
  <body>
      




    <div id="fb-root"></div>
    <div class="jumbotron">
      <div class="container">
        <h1>Bootstrap Tags Input</h1>
        <p>jQuery plugin providing a Twitter Bootstrap user interface for managing tags</p>
        <p>
            <a class="btn btn-default" role="button" href="https://github.com/bootstrap-tagsinput/bootstrap-tagsinput">Code on Github</a>
            <a class="btn btn-default" role="button" href="bootstrap-2.3.2.html">Bootstrap 2.3.2</a>
            <a class="btn btn-primary" role="button" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.zip">Download</a>
        </p>
        <p>
          <ul class="list-inline">
            <li>
              <iframe src="//ghbtns.com/github-btn.html?user=bootstrap-tagsinput&repo=bootstrap-tagsinput&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>
            </li>
            <li>
              <iframe src="//ghbtns.com/github-btn.html?user=bootstrap-tagsinput&repo=bootstrap-tagsinput&type=fork&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>
            </li>
            <li>
              <a href="https://twitter.com/share" class="navbar-link twitter-share-button" data-hashtags="bootstraptagsinput">Tweet</a>
              <script>!function (d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (!d.getElementById(id)) {
                      js = d.createElement(s);
                      js.id = id;
                      js.src = "//platform.twitter.com/widgets.js";
                      fjs.parentNode.insertBefore(js, fjs);
                  }
              }(document, "script", "twitter-wjs");</script>
            </li>
            <li>
              <a class="navbar-link g-plusone" data-size="medium"></a>
              <script type="text/javascript">
                  (function () {
                      var po = document.createElement('script');
                      po.type = 'text/javascript';
                      po.async = true;
                      po.src = 'https://apis.google.com/js/plusone.js';
                      var s = document.getElementsByTagName('script')[0];
                      s.parentNode.insertBefore(po, s);
                  })();
              </script>
            </li>
          </ul>
        </p>
      </div>
    </div>
    <div class="container">
      <section id="examples">
        <div class="page-header">
          <h2>Examples</h2>
        </div>

        <div class="example example_markup">
          <h3>Markup</h3>
          <p>Just add <code>data-role="tagsinput"</code> to your input field to automatically change it to a tags input field.</p>
          <div class="bs-example">
            <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" />
          </div>
          <div class="accordion">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" href="#accordion_example_markup">
                  Show code
                </a>
              </div>
              <div id="accordion_example_markup" class="accordion-body collapse">
                <div class="accordion-inner highlight">
                  <pre><code data-language="html">&lt;input type=&quot;text&quot; value=&quot;Amsterdam,Washington,Sydney,Beijing,Cairo&quot; data-role=&quot;tagsinput&quot; /&gt;</code></pre>
                </div>
              </div>
            </div>
          </div>
           <table class="table table-bordered table-condensed"><thead><tr><th>statement</th><th>returns</th></tr></thead><tbody><tr><td><code>$("input").val()</code></td><td><pre class="val"><code data-language="javascript"></code></pre></td></tr><tr><td><code>$("input").tagsinput('items')</code></td><td><pre class="items"><code data-language="javascript"></code></pre></td></tr></tbody></table>
        </div>

        <div class="example example_multivalue">
          <h3>True multi value</h3>
     
          <div class="bs-example">
            <select multiple data-role="tagsinput">
              <option value="Amsterdam">Amsterdam</option>
              <option value="Washington">Washington</option>
              <option value="Sydney">Sydney</option>
              <option value="Beijing">Beijing</option>
              <option value="Cairo">Cairo</option>
            </select>
          </div>
          <div class="accordion ">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" href="#example_multivalue">
                  Show code
                </a>
              </div>
              <div id="example_multivalue" class="accordion-body collapse">
                <div class="accordion-inner">
                  <pre><code data-language="html">
                      &lt;select multiple data-role="tagsinput"&gt;
                      &lt;option value="Amsterdam"&gt;Amsterdam&lt;/option&gt;
                      &lt;option value="Washington"&gt;Washington&lt;/option&gt;
                      &lt;option value="Sydney"&gt;Sydney&lt;/option&gt;
                      &lt;option value="Beijing"&gt;Beijing&lt;/option&gt;
                      &lt;option value="Cairo"&gt;Cairo&lt;/option&gt;
                       &lt;/select&gt;
                   </code></pre>
                </div>
              </div>
            </div>
          </div>
           <table class="table table-bordered table-condensed">
            <thead>
              <tr>
                <th>statement</th>
                <th>returns</th></tr>
               </thead>
               <tbody>
                <tr>
                  <td>
                  <code>$("select").val()</code></td>
                  <td><pre class="val"><code data-language="javascript"></code></pre></td>
                </tr>
                <tr>
                  <td><code>$("select").tagsinput('items')</code></td>
                  <td><pre class="items"><code data-language="javascript"></code></pre></td></tr>
                </tbody>
              </table>
        </div>

     <script type="text/javascript">
      var val= $('select').val();
      alert(val);

     </script>



        


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
    <script src="{{asset('bootstrap-tagsinput-latest')}}/dist/bootstrap-tagsinput.min.js"></script>
    <script src="{{asset('bootstrap-tagsinput-latest')}}/dist/bootstrap-tagsinput-angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
    <script src="{{asset('bootstrap-tagsinput-latest/examples')}}/assets/app.js"></script>
    <script src="{{asset('bootstrap-tagsinput-latest/examples')}}/assets/app_bs3.js"></script>
  </body>
</html>

