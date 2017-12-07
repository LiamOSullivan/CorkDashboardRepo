#bin/bash

wget -O ./public_html/nra/weather$(date +%s).xml "http://data.tii.ie/Datasets/Its/DatexII/WeatherData/Content.xml"
rm Content*

wget -O ./public_html/nra_static/weatherSites$(date +%s).xml "http://data.tii.ie/Datasets/Its/DatexII/WeatherSites/Content.xml"
rm Content*




                            

                            
                            
                            