@extends('app')
@section('content')

<!doctype html>
<html lang="en">
  <head>
  	<title>My Calendar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


	<!-- main.js -->
	<script>
		(function($) {
			"use strict";

			document.addEventListener('DOMContentLoaded', function(){
			var today = new Date(),
				year = today.getFullYear(),
				month = today.getMonth(),
				monthTag =["January","February","March","April","May","June","July","August","September","October","November","December"],
				day = today.getDate(),
				days = document.getElementsByTagName('td'),
				selectedDay,
				setDate,
				daysLen = days.length;
			// options should like '2014-01-01'
			function Calendar(selector, options) {
				this.options = options;
				this.draw();
			}

			Calendar.prototype.draw  = function() {
				this.getCookie('selected_day');
				this.getOptions();
				this.drawDays();
				var that = this,
					reset = document.getElementById('reset'),
					pre = document.getElementsByClassName('pre-button'),
					next = document.getElementsByClassName('next-button');
					
					pre[0].addEventListener('click', function(){that.preMonth(); });
					next[0].addEventListener('click', function(){that.nextMonth(); });
					reset.addEventListener('click', function(){that.reset(); });
				while(daysLen--) {
					days[daysLen].addEventListener('click', function(){that.clickDay(this); });
				}
			};

			Calendar.prototype.drawHeader = function(e) {
				var headDay = document.getElementsByClassName('head-day'),
					headMonth = document.getElementsByClassName('head-month');

					e?headDay[0].innerHTML = e : headDay[0].innerHTML = day;
					headMonth[0].innerHTML = monthTag[month] +" - " + year;        
			};

			Calendar.prototype.drawDays = function() {
				var startDay = new Date(year, month, 1).getDay(),
			//      下面表示这个月总共有几天
					nDays = new Date(year, month + 1, 0).getDate(),

					n = startDay;
			//      清除原来的样式和日期
				for(var k = 0; k <42; k++) {
					days[k].innerHTML = '';
					days[k].id = '';
					days[k].className = '';
				}

				for(var i  = 1; i <= nDays ; i++) {
					days[n].innerHTML = i; 
					n++;
				}
				
				for(var j = 0; j < 42; j++) {
					if(days[j].innerHTML === ""){
						
						days[j].id = "disabled";
						
					}else if(j === day + startDay - 1){
						if((this.options && (month === setDate.getMonth()) && (year === setDate.getFullYear())) || (!this.options && (month === today.getMonth())&&(year===today.getFullYear()))){
							this.drawHeader(day);
							days[j].id = "today";
						}
					}
					if(selectedDay){
						if((j === selectedDay.getDate() + startDay - 1)&&(month === selectedDay.getMonth())&&(year === selectedDay.getFullYear())){
						days[j].className = "selected";
						this.drawHeader(selectedDay.getDate());
						}
					}
				}
			};

			Calendar.prototype.clickDay = function(o) {
				var selected = document.getElementsByClassName("selected"),
					len = selected.length;
				if(len !== 0){
					selected[0].className = "";
				}
				o.className = "selected";
				selectedDay = new Date(year, month, o.innerHTML);
				this.drawHeader(o.innerHTML);
				this.setCookie('selected_day', 1);
				
			};

			Calendar.prototype.preMonth = function() {
				if(month < 1){ 
					month = 11;
					year = year - 1; 
				}else{
					month = month - 1;
				}
				this.drawHeader(1);
				this.drawDays();
			};

			Calendar.prototype.nextMonth = function() {
				if(month >= 11){
					month = 0;
					year =  year + 1; 
				}else{
					month = month + 1;
				}
				this.drawHeader(1);
				this.drawDays();
			};

			Calendar.prototype.getOptions = function() {
				if(this.options){
					var sets = this.options.split('-');
						setDate = new Date(sets[0], sets[1]-1, sets[2]);
						day = setDate.getDate();
						year = setDate.getFullYear();
						month = setDate.getMonth();
				}
			};

			Calendar.prototype.reset = function() {
				month = today.getMonth();
				year = today.getFullYear();
				day = today.getDate();
				this.options = undefined;
				this.drawDays();
			};

			Calendar.prototype.setCookie = function(name, expiredays){
				if(expiredays) {
					var date = new Date();
					date.setTime(date.getTime() + (expiredays*24*60*60*1000));
					var expires = "; expires=" +date.toGMTString();
				}else{
					var expires = "";
				}
				document.cookie = name + "=" + selectedDay + expires + "; path=/";
			};

			Calendar.prototype.getCookie = function(name) {
				if(document.cookie.length){
					var arrCookie  = document.cookie.split(';'),
						nameEQ = name + "=";
					for(var i = 0, cLen = arrCookie.length; i < cLen; i++) {
						var c = arrCookie[i];
						while (c.charAt(0)==' ') {
							c = c.substring(1,c.length);
							
						}
						if (c.indexOf(nameEQ) === 0) {
							selectedDay =  new Date(c.substring(nameEQ.length, c.length));
						}
					}
				}
			};
			var calendar = new Calendar();

				
			}, false);

			})(jQuery);

	</script>

</head>

<style>

	table {
		border-collapse: collapse;
	}

	.d-flex {
		display: -webkit-box !important;
		display: -ms-flexbox !important;
		display: flex !important;
	}

	@media (min-width: 768px) {
		.d-md-flex {
			display: -webkit-box !important;
			display: -ms-flexbox !important;
			display: flex !important;
		}
	}

	
	.flex-wrap {
		-ms-flex-wrap: wrap !important;
		flex-wrap: wrap !important;
	}

	.align-items-center {
		-webkit-box-align: center !important;
		-ms-flex-align: center !important;
		align-items: center !important;
	}


	.text-monospace {
		font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace !important;
	}

	body {
		font-family: "Lato", Arial, sans-serif;
		font-size: 16px;
		line-height: 1.8;
		font-weight: normal;
		background: #f8f9fd;
		color: gray;
	}

	.img {
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center;
	}

	.elegant-calencar {
		max-width: 600px;
		text-align: center;
		position: relative;
		margin: 0 auto;
		overflow: hidden;
		border-radius: 5px;
		-webkit-box-shadow: 0px 19px 27px -20px rgba(0, 0, 0, 0.16);
		-moz-box-shadow: 0px 19px 27px -20px rgba(0, 0, 0, 0.16);
		box-shadow: 0px 19px 27px -20px rgba(0, 0, 0, 0.16);
	}

	.wrap-header {
		position: relative;
		width: 35%;
		z-index: 0;
	}

	.wrap-header:after {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		content: '';
		background: #000;
		opacity: .5;
		z-index: -1;
	}

	@media (max-width: 767.98px) {
		.wrap-header {
			width: 100%;
			padding: 20px 0;
		}
	}

	#header {
		width: 100%;
		position: relative;
	}

	#header .pre-button,
	#header .next-button {
		cursor: pointer;
		width: 1em;
		height: 1em;
		line-height: 1em;
		border-radius: 50%;
		position: absolute;
		top: 50%;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
		font-size: 18px;
	}

	#header .pre-button i,
	#header .next-button i {
		color: #fff;
	}

	.pre-button {
		left: 5px;
	}

	.next-button {
		right: 5px;
	}

	.button-wrap {
		position: relative;
		padding: 10px 0;
	}

	.button-wrap .pre-button,
	.button-wrap .next-button {
		cursor: pointer;
		width: 1em;
		height: 1em;
		line-height: 1em;
		border-radius: 50%;
		position: absolute;
		top: 0;
		font-size: 18px;
	}

	.button-wrap .pre-button i,
	.button-wrap .next-button i {
		color: #cccccc;
	}

	.button-wrap .pre-button {
		left: 20px;
	}

	.button-wrap .next-button {
		right: 20px;
	}

	.head-day {
		font-size: 9em;
		line-height: 1;
		color: #fff;
	}

	.head-month {
		font-size: 2em;
		line-height: 1;
		color: #fff;
		font-size: 16px;
		text-transform: uppercase;
		font-weight: 300;
	}

	.calendar-wrap {
		width: 65%;
		background: #fff;
		padding: 40px 20px 20px 20px;
	}

	@media (max-width: 767.98px) {
		.calendar-wrap {
			width: 100%;
		}
	}

	#calendar {
		width: 100%;
	}

	#calendar tr {
		height: 3em;
	}

	thead tr {
		color: #000;
		font-weight: 700;
	}

	tbody tr {
		color: #000;
	}

	tbody td {
		width: 14%;
		border-radius: 50%;
		cursor: pointer;
		-webkit-transition: all 0.2s ease-in;
		-o-transition: all 0.2s ease-in;
		transition: all 0.2s ease-in;
		position: relative;
		z-index: 0;
	}

	tbody td:after {
		position: absolute;
		top: 50%;
		left: 0;
		right: 0;
		bottom: 0;
		content: '';
		width: 44px;
		height: 44px;
		margin: 0 auto;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
		border-radius: 50%;
		-webkit-transition: 0.3s;
		-o-transition: 0.3s;
		transition: 0.3s;
		z-index: -1;
	}

	@media (prefers-reduced-motion: reduce) {
		tbody td:after {
			-webkit-transition: none;
			-o-transition: none;
			transition: none;
		}
	}

	tbody td:hover,
	.selected {
		color: #fff;
		border: none;
	}

	tbody td:hover:after,
	.selected:after {
		background: #2a3246;
	}

	tbody td:active {
		-webkit-transform: scale(0.7);
		-ms-transform: scale(0.7);
		transform: scale(0.7);
	}

	#today {
		color: #fff;
	}

	#today:after {
		background: #e13a9d;
	}
</style>


<body>

<div class="col-md-12">
	<div class="elegant-calencar d-md-flex">
		<div class="wrap-header d-flex align-items-center img" style="background-image: url(images/bg.jpg);">
			<div id="header" class="p-0">
				<div class="head-info">
					<div class="head-month"></div>
					<div class="head-day"></div>
				</div>
			</div>
		</div>
		<div class="calendar-wrap">
			<div class="w-100 button-wrap">
				<div class="pre-button d-flex align-items-center justify-content-center"><i
						class="fa fa-chevron-left"></i></div>
				<div class="next-button d-flex align-items-center justify-content-center"><i
						class="fa fa-chevron-right"></i></div>
			</div>
			<table id="calendar">
				<thead>
					<tr>
						<th>Sun</th>
						<th>Mon</th>
						<th>Tue</th>
						<th>Wed</th>
						<th>Thu</th>
						<th>Fri</th>
						<th>Sat</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>

@endsection

