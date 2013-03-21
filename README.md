# EToastr #
toastrjs for Yii framework flash messages
[https://github.com/CodeSeven/toastr](https://github.com/CodeSeven/toastr)


## Usage ##

Unpack to protected/extensions/widgets
    
    [php]
    <?php
    $this->widget('ext.widgets.etoastr.EToastr',array(
    	'flashMessagesOnly'=>true, //default to false
		'message'=>'will be ignored', //because flashOnlyMessages is true
    	'options'=>array(
    		'positionClass'=>'toast-top-right',
    		'fadeOut'	=>	1000,
    		'timeOut'	=>	10000,
    		'fadeIn'	=>	1000
    		)
    	));
    ?>

for other options please visit [http://codeseven.github.com/toastr/](http://codeseven.github.com/toastr/)