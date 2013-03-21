# EToastr #
toastrjs for Yii framework flash messages
[https://github.com/CodeSeven/toastr](https://github.com/CodeSeven/toastr)


## Usage ##

Unpack to protected/extensions/widgets

in your theme or the view where you want to use the flash messages put this:
    
    <?php
    $this->widget('ext.widgets.etoastr.EToastr',array(
    	'flashMessagesOnly'=>true, //default to false
		'message'=>'will be ignored', //because flashOnlyMessages is true
		//the options passed to the plugin
    	'options'=>array(
    		'positionClass'=>'toast-top-right',
    		'fadeOut'	=>	1000,
    		'timeOut'	=>	10000,
    		'fadeIn'	=>	1000
    		)
    	));
    ?>

The controller must send flash messages for example after successful save:
    
    Yii::app()->user->setFlash('success', 'The model was saved with success');
    
as you can see the first parameter for setFlash function (in this case 'success') is here to define the type of the notification, the type can be:

- success
- error
- warning
- info

for other options please visit [http://codeseven.github.com/toastr/](http://codeseven.github.com/toastr/)