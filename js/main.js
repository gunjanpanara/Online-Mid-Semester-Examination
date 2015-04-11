/*------------------------------------------------------------------
Project:    Online Mid-Semester Examination System 
Author:     Gunjan Panara
Version:    1.0
Created:    February 2015
-------------------------------------------------------------------*/
//intitialize tooltips
$("[data-toggle='tooltip']").tooltip();

//end exam confirmation
$("#endExamBtn").click(function(e) {
	var end_confirm = confirm("Are you sure you want to end Examination? \nOnce you will end examination, you won't be able to change any of your answers.");
	if (end_confirm == false) 
	{
		e.preventDefault();
	}
});
