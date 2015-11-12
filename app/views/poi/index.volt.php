<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <?php echo $this->tag->stylesheetLink('css/foundation.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/global.css'); ?>
        
        


        
        <?php echo $this->tag->javascriptInclude('js/vendor/modernizr.js'); ?>
        
        <title><?php echo $title; ?></title>
    </head>
    
    <body>
        <div id="appContent">
            <div id="mainContainer" class="row">
                <div class="medium-2 columns">
                    
                </div>

                <div id="boardPanel" class="medium-8 columns panel">
                    
<ul class="tabs" data-tab role="tablist">
  <li class="tab-title active" role="presentation"><a href="#panel2-1" role="tab" tabindex="0" aria-selected="true" aria-controls="panel2-1">Show</a></li>
  <li class="tab-title" role="presentation"><a href="#panel2-2" role="tab" tabindex="0" aria-selected="false" aria-controls="panel2-2">Add</a></li></ul>
<div class="tabs-content">
    <section role="tabpanel" aria-hidden="false" class="content active" id="panel2-1">
        <div class="row">
            <div id="searchPanel" class="medium-4 columns panel">
                <?php echo $this->tag->form(array('poi/index', 'method' => 'post')); ?>
                    <label for="poiNameSearch">Search:</label>
                    <?php echo $this->tag->textField(array('poiNameSearch', 'size' => 20, 'class' => 'glow-input')); ?>

                    <?php echo $this->tag->submitButton(array('Search', 'class' => 'small button')); ?>

                <?php echo $this->tag->endForm(); ?>
            </div>
            <div id="searchPanel" class="medium-8 columns panel">
                Number of POIs: <b><?php echo $nbPois; ?></b>
            </div>
        </div>

        <div class="row">
            <div id="poiPanel" class="medium-12 columns panel">
                <ul class="accordion" data-accordion>
                <?php foreach ($pois as $poi) { ?>
                    <li class="accordion-navigation">
                        <a href="#panel1a<?php echo $poi->id; ?>" class="accordionTitle"><?php echo $poi->poiName; ?>
                            <?php if ($poi->enTranslation != '') { ?>
                                / <?php echo $poi->enTranslation; ?>
                            <?php } ?>
                            </a>

                        <div id="panel1a<?php echo $poi->id; ?>" class="content accordionContent">
                        <?php echo $this->tag->form(array('poi/edit', 'method' => 'post')); ?>
                            <input type="hidden" id="poiId" name="poiId" value="<?php echo $poi->id; ?>"/>

                            <label for="poiNameField<?php echo $poi->id; ?>">Name</label>
                            <input type="text" id="poiNameField<?php echo $poi->id; ?>" name="poiName" value="<?php echo $poi->poiName; ?>" class="glow-input" size="20"/>

                            <label for="poiCityField<?php echo $poi->id; ?>">City</label>
                            <input type="text" id="poiCityField<?php echo $poi->id; ?>" name="poiCity" value="<?php echo $poi->poiCity; ?>" class="glow-input" size="20"/>

                            <label for="poiRatingField<?php echo $poi->id; ?>">Rating / 5</label>
                            <input type="text" id="poiRatingField<?php echo $poi->id; ?>" name="poiRating" value="<?php echo $poi->poiRating; ?>" class="glow-input" size="20"/>
                            <?php echo $this->tag->submitButton(array('Edit', 'class' => 'small button')); ?>
                        <?php echo $this->tag->endForm(); ?>     

                        <p>Number of reviews: <?php echo $poi->nbReviews; ?></p>

                        <?php echo $this->tag->form(array('poi/delete', 'method' => 'post')); ?>
                             <input type="hidden" id="poiId" name="poiId" value="<?php echo $poi->id; ?>"/>
                            <?php echo $this->tag->submitButton(array('Delete POI', 'class' => 'small button')); ?>
                        <?php echo $this->tag->endForm(); ?>   
                        </div>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="navigationPanel" class="medium-12 columns panel">
                <ul class="pagination">
                    <li class="arrow unavailable"><a href="">&laquo;</a></li>
                    <li class="current"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li class="unavailable"><a href="">&hellip;</a></li>
                    <li><a href="">12</a></li>
                    <li><a href="">13</a></li>
                    <li class="arrow"><a href="">&raquo;</a></li>
               </ul>
            </div>
        </div>
    </section>
    <section role="tabpanel" aria-hidden="true" class="content" id="panel2-2">
        <div class="row">
            <div id="addPoiPanel" class="medium-12 columns panel">
                <?php echo $this->tag->form(array('poi/add', 'method' => 'post')); ?>
                    <label for="poiNameField">Name</label>
                    <input type="text" id="poiNameField" name="poiName" class="glow-input" size="20"/>

                    <label for="poiCityField">City</label>
                    <input type="text" id="poiCityField" name="poiCity" class="glow-input" size="20"/>

                    <label for="poiAddressField">Address</label>
                    <input type="text" id="poiAddressField" name="poiAddress" class="glow-input" size="20"/>

                    <label for="poiLongitudeField">Longitude</label>
                    <input type="text" id="poiLongitudeField" name="poiLongitude" class="glow-input" size="20"/>

                    <label for="poiLatitudeField">Latitude</label>
                    <input type="text" id="poiLatitudeField" name="poiLatitude" class="glow-input" size="20"/>

                    <label for="poiPhoneField">Phone</label>
                    <input type="text" id="poiPhoneField" name="poiPhone" class="glow-input" size="20"/>

                    <label for="poiUrlField">Url</label>
                    <input type="text" id="poiUrlField" name="poiUrl" class="glow-input" size="20"/>

                    <label for="poiRatingField">Rating / 5</label>
                    <input type="text" id="poiRatingField" name="poiRating" class="glow-input" size="20"/>
                    <?php echo $this->tag->submitButton(array('Add POI', 'class' => 'small button')); ?>
                <?php echo $this->tag->endForm(); ?>    
            </div>
        </div>
    </section>
</div>
    

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
</html>