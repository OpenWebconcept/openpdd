# README #

## Gemeente Buren PDC project ##

### REST API Endpoints ###

#### Endpoint voor lijst van PDC items \ PDC item ####
* https://pdc.buren.nl/wp-json/wp/v2/pdc-item
* https://pdc.buren.nl/wp-json/wp/v2/pdc-item/11

Lijst is filterbaar op sorteer volgorde, sorteer type, aantal resultaten en zoek criteria op de volgende wijze:

* https://pdc.buren.nl/wp-json/wp/v2/pdc-item?filter[order]=ASC&filter[orderby]=title
* https://pdc.buren.nl/wp-json/wp/v2/pdc-item?filter[posts_per_page]=2
* https://pdc.buren.nl/wp-json/wp/v2/pdc-item?filter[s]=hond

Lijst filter op subthema

* https://pdc.buren.nl/wp-json/wp/v2/pdc-item?filter[subthema_id]=61

Lijst filter op pdc-items die betrekking hebben op het doen van meldingen.

* https://pdc.buren.nl/wp-json/wp/v2/pdc-item?filter[has_report]=1

Lijst filter op pdc-items die betrekking hebben op het maken van een afspraak.
* https://pdc.buren.nl/wp-json/wp/v2/pdc-item?filter[has_appointment]=1

#### Endpoint voor lijst van PDC themas \ PDC thema ####

* https://pdc.buren.nl/wp-json/wp/v2/pdc-thema
* https://pdc.buren.nl/wp-json/wp/v2/pdc-thema/852

#### Endpoint voor lijst van PDC subthemas \ PDC subthema ####

* https://pdc.buren.nl/wp-json/wp/v2/pdc-subthema
* https://pdc.buren.nl/wp-json/wp/v2/pdc-subthema\602

Lijst is filterbaar op sorteer volgorde, sorteer type, aantal resultaten

* https://pdc.buren.nl/wp-json/wp/v2/pdc-subthema?filter[order]=ASC&filter[orderby]=title
* https://pdc.buren.nl/wp-json/wp/v2/pdc-subthema?filter[posts_per_page]=2




#### Endpoint voor enkelvoudig PDC subthema ####

* https://pdc.buren.nl/wp-json/wp/v2/pdc-subthema/138






### Referenties ###
* Reference on filter options; https://github.com/WP-API/WP-API/blob/master/docs/routes/routes.md#retrieve-posts