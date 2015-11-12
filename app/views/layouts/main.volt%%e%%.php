a:5:{i:0;s:337:"<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <?php echo $this->tag->stylesheetLink('css/foundation.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/global.css'); ?>
        
        ";s:6:"header";N;i:1;s:446:"
        
        <?php echo $this->tag->javascriptInclude('js/vendor/modernizr.js'); ?>
        
        <title><?php echo $title; ?></title>
    </head>
    
    <body>
        <div id="appContent">
            <div id="mainContainer" class="row">
                <div class="medium-2 columns">
                    
                </div>

                <div id="boardPanel" class="medium-8 columns panel">
                    ";s:7:"content";N;i:2;s:631:"
                </div>

                <div class="medium-2 columns">
                    
                </div>
            </div>
        </div>
        <?php echo $this->tag->javascriptInclude('js/vendor/jquery.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/foundation.min.js'); ?>
        <script>
          Foundation.global.namespace = '';
          $(document).foundation();
        </script>
        
        <footer align="center" class="container-fluid">
                <div id="footer-container" class="row-fluid">

                </div>
        </footer>
        </body>
</html>";}