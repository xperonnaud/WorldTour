{% extends "layouts/main.volt" %}

{% block header %}

{% endblock %}

{% block content %}
<ul class="tabs" data-tab role="tablist">
  <li class="tab-title active" role="presentation"><a href="#panel2-1" role="tab" tabindex="0" aria-selected="true" aria-controls="panel2-1">Show</a></li>
  <li class="tab-title" role="presentation"><a href="#panel2-2" role="tab" tabindex="0" aria-selected="false" aria-controls="panel2-2">Add</a></li></ul>
<div class="tabs-content">
    <section role="tabpanel" aria-hidden="false" class="content active" id="panel2-1">
        <div class="row">
            <div id="searchPanel" class="medium-4 columns panel">
                {{ form('poi/index', 'method': 'post') }}
                    <label for="poiNameSearch">Search:</label>
                    {{ text_field("poiNameSearch", "size": 20, "class":"glow-input") }}

                    {{ submit_button('Search', 'class': 'small button') }}

                {{ end_form() }}
            </div>
            <div id="searchPanel" class="medium-8 columns panel">
                Number of POIs: <b>{{ nbPois }}</b>
            </div>
        </div>

        <div class="row">
            <div id="poiPanel" class="medium-12 columns panel">
                <ul class="accordion" data-accordion>
                {% for poi in pois %}
                    <li class="accordion-navigation">
                        <a href="#panel1a{{ poi.id }}" class="accordionTitle">{{ poi.poiName }}
                            {% if poi.enTranslation != "" %}
                                / {{ poi.enTranslation }}
                            {% endif %}
                            </a>

                        <div id="panel1a{{ poi.id }}" class="content accordionContent">
                        {{ form('poi/edit', 'method': 'post') }}
                            <input type="hidden" id="poiId" name="poiId" value="{{ poi.id }}"/>

                            <label for="poiNameField{{ poi.id }}">Name</label>
                            <input type="text" id="poiNameField{{ poi.id }}" name="poiName" value="{{ poi.poiName }}" class="glow-input" size="20"/>

                            <label for="poiCityField{{ poi.id }}">City</label>
                            <input type="text" id="poiCityField{{ poi.id }}" name="poiCity" value="{{ poi.poiCity }}" class="glow-input" size="20"/>

                            <label for="poiRatingField{{ poi.id }}">Rating / 5</label>
                            <input type="text" id="poiRatingField{{ poi.id }}" name="poiRating" value="{{ poi.poiRating }}" class="glow-input" size="20"/>
                            {{ submit_button('Edit', 'class': 'small button') }}
                        {{ end_form() }}     

                        <p>Number of reviews: {{ poi.nbReviews }}</p>

                        {{ form('poi/delete', 'method': 'post') }}
                             <input type="hidden" id="poiId" name="poiId" value="{{ poi.id }}"/>
                            {{ submit_button('Delete POI', 'class': 'small button') }}
                        {{ end_form() }}   
                        </div>
                    </li>
                {% endfor %}
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
                {{ form('poi/add', 'method': 'post') }}
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
                    {{ submit_button('Add POI', 'class': 'small button') }}
                {{ end_form() }}    
            </div>
        </div>
    </section>
</div>
    
{% endblock %}