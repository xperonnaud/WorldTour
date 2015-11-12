<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        {{ stylesheet_link('css/foundation.css') }}
        {{ stylesheet_link('css/global.css') }}
        
        {% block header %}{% endblock %}
        
        {{ javascript_include("js/vendor/modernizr.js") }}
        
        <title>{{ title }}</title>
    </head>
    
    <body>
        <div id="appContent">
            <div id="mainContainer" class="row">
                <div class="medium-2 columns">
                    
                </div>

                <div id="boardPanel" class="medium-8 columns panel">
                    {% block content %}{% endblock %}
                </div>

                <div class="medium-2 columns">
                    
                </div>
            </div>
        </div>
        {{ javascript_include("js/vendor/jquery.js") }}
        {{ javascript_include("js/foundation.min.js") }}
        <script>
          Foundation.global.namespace = '';
          $(document).foundation();
        </script>
        
        <footer align="center" class="container-fluid">
                <div id="footer-container" class="row-fluid">

                </div>
        </footer>
        </body>
</html>