<?php
$languages_allowed = ['en', 'dk'];
$language = $_GET['language'] ?? 'en';
if( ! in_array($language, $languages_allowed) ){
  $language = 'en';
};

$flag_dictionary = [
    'dk_flag'=>'&#127465&#127472',
    'en_flag'=>'🇬🇧',
];

$dictionary=[
    'en_welcome_title'=>'Welcome! Find a flexible flight for you next trip',
    'dk_welcome_title'=>'Velkommen! Find et fleksiblet fly til din næste rejse',
    'en_search'=>'Search',
    'dk_search'=>'Søg',
    'en_from_placeholder'=>'From?',
    'en_to_placeholder'=>'To?',
    'dk_from_placeholder'=>'Fra?',
    'dk_to_placeholder'=>'Til?',
    'en_cars'=>'cars',
    'dk_cars'=>'biler',
    'en_flights'=>'flights',
    'dk_flights'=>'fly',
    'en_rooms'=>'rooms',
    'dk_rooms'=>'rum',
    'en_ferries'=>'ferries',
    'dk_ferries'=>'færger',
    'en_image'=>'image',
    'dk_image'=>'billede',
    'en_offers_title'=>'The best traveling offers',
    'dk_offers_title'=>'De bedste rejse tilbud',
    'en_offers_content'=>'Find the best offers on more than 900 different traveling sites',
    'dk_offers_content'=>'Find de bedste tilbud fra mere end 900 forskellige rejse sider',
    'en_flexability_title'=>'Order with flexability',
    'dk_flexability_title'=>'Bestil med fleksabilitet',
    'en_flexability_content'=>'Find a flight easy without changing fees',
    'dk_flexability_content'=>'Find nemt fly uden ændringsgebyrer.',
    'en_co2_title'=>'Travel with less co2',
    'dk_co2_title'=>'Rejs med mindre co2',
    'en_co2_content'=>'See the travelling options environmental effect',
    'dk_co2_content'=>'Se rejsemulighedernes miljømæssige påvirkning ',
    'en_experts_title'=>'Recommended by experts',
    'dk_experts_title'=>'Anbefales af eksperter',
    'en_experts_content'=>'The momondo app is Editors Choice in App Store',
    'dk_experts_content'=>'momondo-appen er Editors Choice i App Store',
    'en_sign_in'=>'Sign in',
    'dk_sign_in'=>'Log ind',
    'en_sign_out'=>'Sign out',
    'dk_sign_out'=>'Log ud',
    'en_trips'=>'Trips',
    'dk_trips'=>'Ture',
];
?>