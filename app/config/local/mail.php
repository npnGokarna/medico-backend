<?php

return array(
 
    'driver' => 'smtp',
 
    'host' => 'smtp.gmail.com',
 
    'port' => 587,
 
	'from' => array('address' => 'noreply@medico.com', 'name' => "Medico support"),
 
    'encryption' => 'tls',
 
    'username' => 'achyut.pdl@gmail.com',
 
    'password' => 'tuyhca.27409!@#',
 
    'sendmail' => '/usr/sbin/sendmail -bs',
 
    'pretend' => false,
 
);