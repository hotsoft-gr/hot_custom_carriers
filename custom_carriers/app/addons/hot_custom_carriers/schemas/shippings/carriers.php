<?php 
$schema['speedex'] = array(
    'name'=>'speedex',
    'tracking_url_template' => 'http://www.speedex.gr/speedex/NewTrackAndTrace.aspx?number=[tracking_number]'    
);
$schema['acs'] = array(
    'name'=>'acs',
    'tracking_url_template' => 'https://a.acssp.gr/track/?k=etr:[tracking_number]'    
);
$schema['gt'] = array(
    'name'=>'gt',
    'tracking_url_template' => 'https://www.taxydromiki.com/track/[tracking_number]'    
);
$schema['elta'] = array(
    'name'=>'elta',
    'tracking_url_template' => 'https://www.elta-courier.gr/search?br=[tracking_number]'    
);
return $schema;