<?php
    header("Content-type: text/css; charset: UTF-8");
?>

@font-face {
  font-family: 'Droid';
  font-style: normal;
  font-weight: normal;
  src: url('dompdf/lib/fonts/DroidSansFallback.ttf') format('truetype');
}

* {
	margin: 0;
	box-sizing: border-box;
}

.test{
    color:pink;
}

html {
	padding-top: 10px;
	background: #e6e6e6;
	text-align: center;
}

body {
	width: 730px;
	font-family: 'Droid', 'Helvetica';
	font-size: 14px;
	padding: 30px 40px;
	text-align: left;
	margin: 0 auto;
	background-color: #FFF;
}

.page_break { page-break-before: always; }

h2 {
	margin-top: 8px;
	margin-bottom: 15px;
}

table {
	border-collapse: collapse;
	margin: 8px 0;
}

table th, td {
	padding: 8px 14px 8px 14px;
	border: 1px solid #333;
}

.text-center {
	text-align: center;
}

img {
	max-width: 100%;
}