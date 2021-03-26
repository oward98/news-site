<?php

//can import components easily
require 'functionsHelpers/getComponentPath.php';

//initialisation
require 'functionsHelpers/deregister_jQuery.php';
require 'functionsHelpers/enqueue_styles.php';
require 'functionsHelpers/widgets_init.php';
require 'functionsHelpers/set_menus.php';
require 'functionsHelpers/declareSupport.php';

//meta tags set up
require 'metaSetup/neighbourhoods.php';
require 'metaSetup/importance.php';

//format jetpack subscribe input
require 'functionsHelpers/formatInput.php';
