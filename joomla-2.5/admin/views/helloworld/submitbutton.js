/**
 *	Helloworld : Submit Button Override
 *	Filename : submitbutton.js
 *
 *	Author : Caleb Nance
 *	Component : Hello World
 *
 *	Copyright : Copyright (C) 2013. All Rights Reserved
 *	License : GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
 *
 */
Joomla.submitbutton = function(task)
{
	if (task == '')
	{
		return false;
	}
	else
	{
		var isValid=true;
		var action = task.split('.');
		if (action[1] != 'cancel' && action[1] != 'close')
		{
			var forms = $$('form.form-validate');
			for (var i=0;i<forms.length;i++)
			{
				if (!document.formvalidator.isValid(forms[i]))
				{
					isValid = false;
					break;
				}
			}
		}
		if (isValid)
		{
			Joomla.submitform(task);
			return true;
		}
		else
		{
			alert(Joomla.JText._('helloworld, some values are not acceptable.','Some values are unacceptable'));
			return false;
		}
	}
}