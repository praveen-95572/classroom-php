<?php
$config=[
		'addcourse_rules'=>[[
							'field'=>'name',
							'label'=>'course name',
							'rules'=>'required'],
						   [
							'field'=>'description',
							'label'=>'description',
							'rules'=>'required|min_length[150]']]
		,'addsubcourse_rules'=>[[
							'field'=>'name',
							'label'=>'course name',
							'rules'=>'required'],
						    [
							'field'=>'description',
							'label'=>'description',
							'rules'=>'required|min_length[150]'],
							[
							'field'=>'link',
							'label'=>'youtube link',
							'rules'=>'required|']]
		];

?>