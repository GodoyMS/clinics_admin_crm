/*
odontogram.js ver 1.0.0.0

Copy Right (c)2021
author	: Abu Dzunnuraini
email	: almprokdr@gmail.com

-----------------

Format data
[status]
	1. Sisa Akar
	2. Gigi Hilang
	3. Jembatan
	4. Gigi Tiruan Lepas
	
[fill]
	1. Tambalan Logam
	2. Tambalan Non Logam
	3. Mahkota Logam
	4. Mahkota Non Logam

[exts]
	1. Belum Erupsi (UNE)
	2. Erupsi Sebagian (PRE)
	3. Anomali Bentuk (ANO)
	4. Karies (CAR)
	5. Non Vital (NVT)	
*/



var odontogram2=(function(opt){
	"use strict";
	const

		_AUTO_NONE_=50,
		
		_WIDTH_=1053, 
		_HEIGHT_=480,
        messagesSimbolos=[
           





		
		
	

        ],
		messagesFill=[
		
		],

        //CMD-EVERYTHING

		

        _CMD_NONE_  =0,
		_CMD_1_=1,
		_CMD_2_=2,
        _CMD_AUS_    =3,
        _CMD_ERUPCION1_  =4,
        _CMD_EDENTULO_   =5,
        _CMD_SUPERNUMERARIA_ =6,
        _CMD_EXTRUIDA_      =7,
        _CMD_INTRUIDA_  =8,
        _CMD_GIROVERSION_ =9,
		_CMD_CLAVIJA_=10,
        _CMD_GEMINACION=  11,
        _CMD_CORONA1_ = 12,
        _CMD_CORONABUENA_ =13,
        _CMD_CORONAMALA_ =14,
        _CMD_ESPIGO_BUEN_ =15,
		_CMD_ESPIGO_MAL_ =16,
		_CMD_AZUL_TEST_ =17,
		_CMD_ROJO_TEST_ =18,
		_CMD_DIAST_INICIO_=19,
		_CMD_DIAST_FINAL_=20,
		_CMD_FUSION_INICIO_=21,
		_CMD_FUSION_FINAL_=22,
		_CMD_ORTOFIJO_AZUL_INICIO_=23,
		_CMD_ORTOFIJO_AZUL_MEDIO_=24,
		_CMD_ORTOFIJO_AZUL_FINAL_=25,
		_CMD_ORTOFIJO_ROJO_INICIO_=26,
		_CMD_ORTOFIJO_ROJO_MEDIO_=27,
		_CMD_ORTOFIJO_ROJO_FINAL_=28,
		_CMD_ORTOREMOVIBLE_AZUL_=29,
		_CMD_ORTOREMOBIBLE_ROJO_=30,
		_CMD_PROTESIFIJA_AZUL_INICIO_=31,
		_CMD_PROTESIFIJA_AZUL_MEDIO_=32,
		_CMD_PROTESIFIJA_AZUL_FINAL_=33,
		_CMD_PROTESIFIJA_ROJO_INICIO_=34,
		_CMD_PROTESIFIJA_ROJO_MEDIO_=35,
		_CMD_PROTESIFIJA_ROJO_FINAL_=36,
		_CMD_PROTESISREMOVIBLE_AZUL_=37,
		_CMD_PROTESISREMOVIBLE_ROJO_=38,
		_CMD_PROTESISTOTAL_AZUL_=39,
		_CMD_PROTESISTOTAL_ROJO_=40,
		_CMD_TRANSPOSICION_INICIO_=41,
		_CMD_TRANSPOSICION_FINAL_=42,







        _CMD_NONE_FILL_  =0,
		_CMD_AZUL_=1,
		_CMD_ROJO_=2,

        _NONE_  =0,
		_STS_1_=1,
		_STS_2_=2,
        _STS_AUS_    =3,
        _STS_ERUPCION1_  =4,
        _STS_EDENTULO_   =5,
        _STS_SUPERNUMERARIA_ =6,
        _STS_EXTRUIDA_      =7,
        _STS_INTRUIDA_  =8,
        _STS_GIROVERSION_ =9,
		_STS_CLAVIJA_=10,
        _STS_GEMINACION_=  11,
        _STS_CORONA1_ = 12,
        _STS_CORONABUENA_ =13,
        _STS_CORONAMALA_ =14,
        _STS_ESPIGO_BUEN_ =15,
		_STS_ESPIGO_MAL_=16,
		_STS_AZUL_TEST_ =17,
		_STS_ROJO_TEST_ =18,

		_STS_DIAST_INICIO_=19,
		_STS_DIAST_FINAL_=20,
		_STS_FUSION_INICIO_=21,
		_STS_FUSION_FINAL_=22,
		_STS_ORTOFIJO_AZUL_INICIO_=23,
		_STS_ORTOFIJO_AZUL_MEDIO_=24,
		_STS_ORTOFIJO_AZUL_FINAL_=25,
		_STS_ORTOFIJO_ROJO_INICIO_=26,
		_STS_ORTOFIJO_ROJO_MEDIO_=27,
		_STS_ORTOFIJO_ROJO_FINAL_=28,
		_STS_ORTOREMOVIBLE_AZUL_=29,
		_STS_ORTOREMOBIBLE_ROJO_=30,
		_STS_PROTESIFIJA_AZUL_INICIO_=31,
		_STS_PROTESIFIJA_AZUL_MEDIO_=32,
		_STS_PROTESIFIJA_AZUL_FINAL_=33,
		_STS_PROTESIFIJA_ROJO_INICIO_=34,
		_STS_PROTESIFIJA_ROJO_MEDIO_=35,
		_STS_PROTESIFIJA_ROJO_FINAL_=36,
		_STS_PROTESISREMOVIBLE_AZUL_=37,
		_STS_PROTESISREMOVIBLE_ROJO_=38,
		_STS_PROTESISTOTAL_AZUL_=39,
		_STS_PROTESISTOTAL_ROJO_=40,
		_STS_TRANSPOSICION_INICIO_=41,
		_STS_TRANSPOSICION_FINAL_=42,





        _NONE_FILL_  =0,

		_STS_AZUL_=100,
		_STS_ROJO_=101,

		//FILL



        
		// message=[
		// 	'',
		// 	'Ausente',
        //     'Erupcion',
		// 	'Erupsi Sebagian (PRE)',
		// 	'Anomali Bentuk (ANO)',
		// 	'Caries dental', //KARIES (CAR)
        //     'Corona',
		// 	'Non Vital (NVT)',
		// 	'Tambalan Logam',
		// 	'Tambalan Non Logam',
		// 	'Mahkota Logam',
		// 	'Mahkota Non Logam',
		// 	'Sisa Akar',
		// 	'Gigi Hilang',
		// 	'Jembatan',
		// 	'Gigi Tiruan Lepas',
		// ],
        //
		_CMD_NONE1_		= 0,
		_CMD_AUSENTE_   = 1,
        _CMD_ERUPCION_   = 2,

		_CMD_PRE_		= 3,
		_CMD_ANO_		= 4,
		_CMD_CARIES_	= 5,
        _CMD_CORONA_    = 6,
		_CMD_NONVITAL_	= 7,
		_CMD_TBLOGAM_	= 8,
		_CMD_TBNON_		= 9,
		_CMD_MKLOGAM_	= 10,
		_CMD_MKNON_		= 11,
		_CMD_SISA_AKAR_	= 12,
		_CMD_HILANG_	= 13,
		_CMD_JEMBATAN_	= 14,
		_CMD_TR_LEPAS_	= 15,
        
		//--------------
        //SIMBOLOS
		_ANONE_			= 0,
		_STS_AKAR_		= 1,
		_STS_HILANG_	= 2,
		_STS_JEMBATAN_	= 3,
		_STS_TIRUAN_	= 4,
		_STS_CARIES_	= 5,
        _STS_CORONA_    =6,
        _STS_ERUPCION_ = 7,

		//--------------
		_STS_TBLOGAM_	= 1,
		_STS_TBNON_		= 2,
		_STS_MKLOGAM_	= 3,
		_STS_MKNON_		= 4,
		//CORONA
		_STS_AUSENTE_		= 1,
		_STS_PRE_		= 2,
		_STS_ANO_		= 3,
		//_STS_CARIES_	= 4,
		_STS_NONVITAL_	= 5,
		//--------------
		tmp=`
<g class="{id}-grp">


<path datasimb="{ids}" class="tdg {id}-base" d="{ps}" />

<path datasimb="{ids}" class="tdg {id}-center" d="{pc}" />
<path datasimb="{ids}" class="tdg {id}-left" d="{pl}" />
<path datasimb="{ids}" class="tdg {id}-right" d="{pr}" />
<path datasimb="{ids}" class="tdg {id}-bottom" d="{pb}" />
<path datasimb="{ids}" class="tdg {id}-top" d="{pt}" />



<path datasimb="{ids}" class="{id}-status" d="{ps}" fill="none"/>
<path datasimb="{ids}" class="{id}-simb" d="{st}" fill="none" />


<text y="{cy}" x="{cx}"><tspan class="tdg-cap">{ids}</tspan></text>
<text y="{ty}" x="{tx}"><tspan class="tdg-ext {id}-ext"></tspan></text>
</g>




`,
		tmpdefs=`
<defs>
<style type="text/css">
.tdg-svg{zoom:{zoom}%;-moz-transform: scale({scale});-moz-transform-origin: 0 0;}
.tdg{fill:white;stroke:black;stroke-width:1;stroke-linecap:butt;stroke-linejoin:miter;stroke-dasharray:none}
.tdg-cap{font-size:18px;font-family:Arial;font-weight: bold}
.tdg-ext{font-size:18px;font-family:Arial;font-weight: normal}
.tdg-sign{stroke:grey;stroke-width:6}
.tdg-img{fill:url(cancel.png)}
.tdg-cmd{margin:0 10px 10px; font-size:16px;font-family:Arial;font-weight: normal;}
.tdg-none{fill:white}
.tdg-azul{fill:rgba(0,128,255,0.8)}
.tdg-rojo{fill:rgba(255,0,0,0.8)}

.tdg-corona{fill:rgba(255,0,0,0.6)}

.tdg-tblogam{fill:rgba(255,0,255,0.6)}
.tdg-tbnon{fill:rgba(0,128,255,0.6)}
.tdg-mklogam{fill:rgba(255,0,0,0.6)}
.tdg-mknon{fill:rgba(0,240,240,0.8)}
</style>
<pattern id="img-numeraria" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 0 12 A 1 1 0 0 0 18 12 A 1 1 0 0 0 0 12 M 1 12 A 1 1 0 0 0 17 12 A 1 1 0 0 0 1 12 M 12.481 7.245 L 10.788 6.317 L 9.095 6.317 L 6.693 6.535 L 4.728 7.846 L 4.455 9.156 L 4.345 10.084 L 4.564 11.122 L 5.11 11.668 L 5.601 12.05 L 6.42 12.159 L 7.621 12.323 L 9.15 12.432 L 10.46 12.65 L 11.389 13.033 L 12.153 14.07 L 11.989 14.889 L 11.006 15.817 L 9.751 16.254 L 8.822 16.308 L 7.021 16.199 L 7.021 16.199 L 6.093 15.653 L 5.383 15.217 L 5.164 14.507 L 4.127 14.78 L 4.236 15.599 L 4.837 16.363 L 5.929 17.346 L 7.021 17.455 L 7.785 17.455 L 8.44 17.51 L 8.986 17.51 L 10.351 17.291 L 11.607 16.8 L 12.371 16.254 L 13.081 15.162 L 13.3 14.398 L 13.081 13.142 L 12.371 12.104 L 10.46 11.504 L 8.331 11.176 L 6.202 10.958 L 5.547 9.484 L 6.038 8.446 L 7.294 7.682 L 9.805 7.354 L 11.771 8.719 L 12.863 9.484 L 13.791 8.665 L 13.354 8.173 L 12.535 7.3" />
</pattern>
<pattern id="img-extruida" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 30.064 25.271 L 40.144 25.001 L 40.054 9.881 L 50.134 9.971 L 35.284 0.001 L 20.074 9.791 L 29.884 9.701 L 30.154 25.091" />
</pattern>
<pattern id="img-intruida" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 29.974 1.151 L 39.784 1.151 L 39.784 14.651 L 50.134 14.831 L 35.284 25.001 L 20.614 15.101 L 29.974 15.011 L 30.154 1.241" />
</pattern>

<pattern id="img-giroversion" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 17.195 9.562 L 17.08 9.792 C 21.692 4.258 38.066 -4.39 48.674 8.87 L 52.941 3.912 L 53.863 17.633 L 40.833 17.172 L 45.561 13.367 M 16.965 10.023 L 19.271 13.482 C 24.921 7.602 35.645 -0.701 46.022 13.252" />
</pattern>
<pattern id="img-clavija" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 34.901 1.66 L 23.037 20.534 L 45.686 20.445 L 34.991 1.75 M 34.991 5.705 L 26.902 18.288 L 41.282 18.288 L 34.811 5.705" />
</pattern>

<pattern id="img-geminacion" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 25.251 11.996 A 1 1 0 0 0 44.754 12.086 A 1 1 0 0 0 25.251 11.906 M 27.228 11.906 A 1 1 0 0 0 42.597 12.176 A 1 1 0 0 0 27.318 11.547" />
</pattern>

<pattern id="img-corona-temp" width="50" height="50">
<path style="fill:grey;fill-opacity:0.2" d="m 0,0 0,51.0236 51.0236,0 L 51.0236,0 0,0 Z" />

<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:red;fill-rule:evenodd" d="M 0.047 0.387 L 49.643 0.267 L 50.001 49.982 L 0.286 50.221 L 0.167 0.745 M 46.535 3.255 L 46.774 47.114 L 3.035 47.233 L 3.035 3.255 L 46.655 3.255" />
</pattern>

<pattern id="img-corona-buen" width="50" height="50">
<path style="fill:grey;fill-opacity:0.2" d="m 0,0 0,51.0236 51.0236,0 L 51.0236,0 0,0 Z" />

<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 0.047 0.387 L 49.643 0.267 L 50.001 49.982 L 0.286 50.221 L 0.167 0.745 M 46.535 3.255 L 46.774 47.114 L 3.035 47.233 L 3.035 3.255 L 46.655 3.255" />
</pattern>

<pattern id="img-espigo-buen" width="50" height="50">
<path style="fill:grey;fill-opacity:0.2" d="m 0,0 0,51.0236 51.0236,0 L 51.0236,0 0,0 Z" />

<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 11.103 10.251 L 40.497 10.323 L 40.355 40.073 L 11.174 39.859 L 11.032 10.18 M 37.081 15.447 L 37.152 35.233 L 14.092 35.162 L 14.234 15.447 L 37.081 15.376 M 22.348 40.073 L 22.348 50.037 L 27.9 50.179 L 27.828 40.002 M 22.419 35.233 L 22.491 29.255 L 28.184 29.326 L 28.042 35.162" />
</pattern>

<pattern id="img-espigo-mal" width="50" height="50">
<path style="fill:grey;fill-opacity:0.2" d="m 0,0 0,51.0236 51.0236,0 L 51.0236,0 0,0 Z" />

<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(255,0,0,.8);fill-rule:evenodd" d="M 11.103 10.251 L 40.497 10.323 L 40.355 40.073 L 11.174 39.859 L 11.032 10.18 M 37.081 15.447 L 37.152 35.233 L 14.092 35.162 L 14.234 15.447 L 37.081 15.376 M 22.348 40.073 L 22.348 50.037 L 27.9 50.179 L 27.828 40.002 M 22.419 35.233 L 22.491 29.255 L 28.184 29.326 L 28.042 35.162" />
</pattern>

<pattern id="img-diast-inicio" width="50" height="50">
 <path style="fill:grey;fill-opacity:0.2" d="m 0,0 0,51.0236 51.0236,0 L 51.0236,0 0,0 Z" />
 <path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 51.0236,51.0236" />
 <path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 29.967 0.474 L 35.584 0.474 C 55.283 13.022 53.849 33.457 34.728 49.591 L 29.967 50.069 M 30.086 49.949 C 51.717 29.155 48.968 12.305 29.847 0.235" />
</pattern>
<pattern id="img-diast-final" width="50" height="50">
 <path style="fill:grey;fill-opacity:0.2" d="m 0,0 0,51.0236 51.0236,0 L 51.0236,0 0,0 Z" />
 <path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 51.0236,51.0236" />
 <path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 14.488 0.117 C -2.892 14.947 -2.623 34.989 15.567 50.268 M 14.578 0.207 L 21.229 0.387 C 10.949 6.499 -8.105 23.485 20.689 49.999 L 15.746 50.089" />
</pattern>


<pattern id="img-fusion-inicio" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 50.251 11.996 A 1 1 0 0 0 69.754 12.086 A 1 1 0 0 0 50.251 11.906 M 52.228 11.906 A 1 1 0 0 0 67.597 12.176 A 1 1 0 0 0 52.318 11.547" />
</pattern>

<pattern id="img-fusion-final" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 0.251 11.996 A 1 1 0 0 0 19.754 12.086 A 1 1 0 0 0 0.251 11.906 M 2.228 11.906 A 1 1 0 0 0 17.597 12.176 A 1 1 0 0 0 2.318 11.547" />
</pattern>

<pattern id="img-ortofijo-azul-inicio" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,1);fill-rule:evenodd" d="M 35.118 21.218 H 25.238 V 0.536 H 44.734 V 21.086 H 35.249 M 34.986 2.381 H 27.609 V 19.242 H 42.779 V 2.381 H 35.118 M 34.854 4.883 H 36.855 V 9.36 H 40.648 V 11.845 H 36.789 V 16.554 H 34.173 V 11.976 H 30.052 V 9.621 H 34.173 V 4.919 H 34.836 M 44.802 12.152 H 74.868 V 7.973 H 44.955" />
</pattern>
<pattern id="img-ortofijo-azul-medio" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,1);fill-rule:evenodd" d="M 0.032 7.963 V 12.095 H 70.053 V 8.007 H -0.094" />
</pattern>
<pattern id="img-ortofijo-azul-final" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,1);fill-rule:evenodd" d="M 35.118 21.218 H 25.238 V 0.536 H 44.734 V 21.086 H 35.249 M 34.986 2.381 H 27.609 V 19.242 H 42.779 V 2.381 H 35.118 M 34.854 4.883 H 36.855 V 9.36 H 40.648 V 11.845 H 36.789 V 16.554 H 34.173 V 11.976 H 30.052 V 9.621 H 34.173 V 4.919 H 34.836 M 25.205 12.04 H 0.188 V 7.973 H 25.146" />
</pattern>


<pattern id="img-ortofijo-rojo-inicio" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(255,0,0,1);fill-rule:evenodd" d="M 35.118 21.218 H 25.238 V 0.536 H 44.734 V 21.086 H 35.249 M 34.986 2.381 H 27.609 V 19.242 H 42.779 V 2.381 H 35.118 M 34.854 4.883 H 36.855 V 9.36 H 40.648 V 11.845 H 36.789 V 16.554 H 34.173 V 11.976 H 30.052 V 9.621 H 34.173 V 4.919 H 34.836 M 44.802 12.152 H 74.868 V 7.973 H 44.955" />
</pattern>
<pattern id="img-ortofijo-rojo-medio" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(255,0,0,1);fill-rule:evenodd" d="M 0.032 7.963 V 12.095 H 70.053 V 8.007 H -0.094" />
</pattern>
<pattern id="img-ortofijo-rojo-final" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(255,0,0,1);fill-rule:evenodd" d="M 35.118 21.218 H 25.238 V 0.536 H 44.734 V 21.086 H 35.249 M 34.986 2.381 H 27.609 V 19.242 H 42.779 V 2.381 H 35.118 M 34.854 4.883 H 36.855 V 9.36 H 40.648 V 11.845 H 36.789 V 16.554 H 34.173 V 11.976 H 30.052 V 9.621 H 34.173 V 4.919 H 34.836 M 25.205 12.04 H 0.188 V 7.973 H 25.146" />
</pattern>

<pattern id="img-ortoremovible-azul" width="70" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,1);fill-rule:evenodd" d="M 0.186 17.76 L 9.511 6.662 L 19.915 21.918 L 30.243 6.966 L 40.031 22.072 L 50.05 7.043 L 60.069 22.072 L 69.856 9.899 L 70.01 6.2 M 0.032 18.222 L 0.109 14.446 L 9.819 2.889 L 19.915 17.918 L 30.243 2.966 L 40.031 18.072 L 50.05 3.043 L 60.069 18.072 L 69.933 6.2" />
/>
</pattern>

<pattern id="img-ortoremovible-rojo" width="70" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(255,0,0,1);fill-rule:evenodd" d="M 0.186 17.76 L 9.511 6.662 L 19.915 21.918 L 30.243 6.966 L 40.031 22.072 L 50.05 7.043 L 60.069 22.072 L 69.856 9.899 L 70.01 6.2 M 0.032 18.222 L 0.109 14.446 L 9.819 2.889 L 19.915 17.918 L 30.243 2.966 L 40.031 18.072 L 50.05 3.043 L 60.069 18.072 L 69.933 6.2" />
/>
</pattern>


<pattern id="img-protesisfija-azul-inicio" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,1);fill-rule:evenodd" d="M 33 23 H 37 H 38 V 12 H 70 V 7 H 33 V 23" />
</pattern>
<pattern id="img-protesisfija-azul-medio" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,1);fill-rule:evenodd" d="M 0.033 8.223 V 12 H 70 V 7 H 0.033 V 8.411" />
</pattern>
<pattern id="img-protesisfija-azul-final" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,1);fill-rule:evenodd" d="M 33 23 H 37 H 38 V 7 H 0 V 12 H 33 V 23" />
</pattern>

<pattern id="img-protesisfija-rojo-inicio" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(255,0,0,1);fill-rule:evenodd" d="M 33 23 H 37 H 38 V 12 H 70 V 7 H 33 V 23" />
</pattern>
<pattern id="img-protesisfija-rojo-medio" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(255,0,0,1);fill-rule:evenodd" d="M 0.033 8.223 V 12 H 70 V 7 H 0.033 V 8.411" />
</pattern>
<pattern id="img-protesisfija-rojo-final" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(255,0,0,1);fill-rule:evenodd" d="M 33 23 H 37 H 38 V 7 H 0 V 12 H 33 V 23" />
</pattern>

<pattern id="img-protesisremovible-azul" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,1);fill-rule:evenodd" d="M 33 19 H 70 V 15 H 0 V 19 H 33 V 19 M 33 12 H 70 V 8 H 0 V 12 H 33 V 12" />
</pattern>

<pattern id="img-protesisremovible-rojo" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(255,0,0,1);fill-rule:evenodd" d="M 33 19 H 70 V 15 H 0 V 19 H 33 V 19 M 33 12 H 70 V 8 H 0 V 12 H 33 V 12" />
</pattern>

<pattern id="img-transposicion-inicio" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,1);fill-rule:evenodd" d="M 72 17 L 72 12 L 70 13 C 63 2 53 1 41 10 L 41 13 C 56 -1 65 11 68 14 L 66 15 L 72 17" />
</pattern>
<pattern id="img-transposicion-final" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,1);fill-rule:evenodd" d="M -0.675 20.712 L 0.772 13.598 L 2.46 14.804 C 11.554 1.298 25.421 0.937 32.777 8.051 L 32.897 12.271 C 30.727 6.604 12.88 1.901 3.907 15.889 L 6.319 17.336 L -0.675 20.954" />
</pattern>










case _STS_PROTESISREMOVIBLE_AZUL_ :$(trg+'-status').attr('fill','url(#img-protesisremovible-azul)'); break;  //sisa akar

case _STS_PROTESISREMOVIBLE_ROJO_ :$(trg+'-status').attr('fill','url(#img-protesisremovible-rojo)'); break;  //sisa akar
case _STS_TRANSPOSICION_INICIO_ :$(trg+'-status').attr('fill','url(#img-transposicion-inicio)'); break;  //sisa akar
case _STS_TRANSPOSICION_FINAL_ :$(trg+'-status').attr('fill','url(#img-transposicion-final)'); break;  //sisa akar





<pattern id="img-ausente" width="50" height="50">
 <path style="fill:grey;fill-opacity:0.2" d="m 0,0 0,51.0236 51.0236,0 L 51.0236,0 0,0 Z" />
 <path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 51.0236,51.0236" />
 <path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="m 0.747,4.3544 c -0.996,-0.996 -0.996,-2.6114 0,-3.6074 0.996,-0.996 2.6114,-0.996 3.6074,0 L 25.5118,21.9044 46.6692,0.747 c 0.996,-0.996 2.6114,-0.996 3.6074,0 0.996,0.996 0.996,2.6114 0,3.6074 L 29.1193,25.5118 50.2766,46.6692 c 0.996,0.996 0.996,2.6114 0,3.6074 -0.996,0.996 -2.6114,0.996 -3.6074,0 L 25.5118,29.1193 4.3544,50.2766 c -0.996,0.996 -2.6114,0.996 -3.6074,0 -0.996,-0.996 -0.996,-2.6114 0,-3.6074 L 21.9044,25.5118 0.747,4.3544 Z" />
</pattern>

<pattern id="img-erupcionx" width="50" height="50">
<path style="fill:rgba(0,128,255,0.6);fill-rule:evenodd" d="M 0,0 0.0236,51.0236" />
<path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 37 0 L 37 3 L 33 5 L 38 7 L 32 12 L 40 14 L 35 17 L 35 19 L 41 19 L 34 25 L 26 19 L 32 19 L 32 17 L 36 15 L 28 13 L 34 8 L 28 6 L 28 6 L 33 3 L 33 0 L 35 0 L 35 0" />
</pattern>

<pattern id="img-edentulo" width="50" height="50">
<path style="fill:grey;fill-opacity:0.2" d="m 0,0 0,51.0236 51.0236,0 L 51.0236,0 0,0 Z" />
 <path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 0,0 51.0236,51.0236" />
 <path style="fill:rgba(0,128,255,0.8);fill-rule:evenodd" d="M 0 25 L 0 21 L 50 21 L 50 29 L 0 29 L 0 25 L 0 26" />
</pattern>





<pattern id="img-hilang" width="1000" height="1000">
 <path style="fill:grey;fill-opacity:0.8" d="m 0,0 0,51.0236 51.0236,0 L 51.0236,0 0,0 Z" />
 <path style="fill:red;fill-rule:evenodd" d="M 0,0 51.0236,51.0236" />
 <path style="fill:red;fill-rule:evenodd" d="m 0.747,4.3544 c -0.996,-0.996 -0.996,-2.6114 0,-3.6074 0.996,-0.996 2.6114,-0.996 3.6074,0 L 25.5118,21.9044 46.6692,0.747 c 0.996,-0.996 2.6114,-0.996 3.6074,0 0.996,0.996 0.996,2.6114 0,3.6074 L 29.1193,25.5118 50.2766,46.6692 c 0.996,0.996 0.996,2.6114 0,3.6074 -0.996,0.996 -2.6114,0.996 -3.6074,0 L 25.5118,29.1193 4.3544,50.2766 c -0.996,0.996 -2.6114,0.996 -3.6074,0 -0.996,-0.996 -0.996,-2.6114 0,-3.6074 L 21.9044,25.5118 0.747,4.3544 Z" />
 <path style="fill:red;fill-rule:evenodd" d="M 51.0236,0 0,51.0236" /   >
</pattern>
<pattern id="img-akar" width="10" height="10">
 <path style="fill:blue;fill-opacity:0.7" d="M 0,0 V 30.0236 H 60.0236 V 0 Z" />
 <path style="fill:#1b1918;fill-rule:evenodd" d="M 25 23 L 17 32 L 3 47 l -1 4 l 5 -5 l 19 -20 h 1 L 45 50 L 45 46 L 28 23 L 50 0 h -3 L 27 21 L 26 21 L 5 0 H 3 H 2 Z" />
</pattern>
<pattern id="img-jembatan" width="50" height="50">
 <path style="fill:white;fill-opacity:0.8;fill-rule:evenodd" d="M 0,0 V 51.0236 H 51.0236 V 0 Z" />
 <path style="fill:brown;fill-rule:evenodd" d="M 0,20.0597 V 30.964 H 51.0236 V 20.0597 Z" />
</pattern>
<pattern id="img-tiruan" width="50" height="50">
 <path style="fill:white;fill-opacity:0.8;fill-rule:evenodd" d="M 0,0 V 51.0236 H 51.0236 V 0 Z" />
 <path style="fill:yellow;fill-rule:evenodd" d="M 0,20.0597 V 30.964 H 51.0236 V 20.0597 Z" />
</pattern>
<pattern id="img-erupcion" width="50" height="50">
 <path style="fill:white;fill-opacity:0.8;fill-rule:evenodd" d="M 0,0 V 51.0236 H 51.0236 V 0 Z" />
 <path style="fill:yellow;fill-rule:evenodd" d="M 0,20.0597 V 30.964 H 51.0236 V 20.0597 Z" />
</pattern>
</defs>
`,
		odt=[{"id":"18","path":{"z":"M 11.1343 9.8341 V 35.857699999999994 H 81.157950 V 9.8341 Z","s":"M 21.1343,34.8341 V 85.8577 H 72.1579 V 34.8341 Z","c":"M 32.3595,46.0593 V 74.6325 H 60.9327 V 46.0593 Z","l":"M 21.1343,74.6325 V 85.8577 L 32.3595,74.6325 V 46.0593 L 21.1343,34.8341 v 11.2252 z","r":"M 72.1579,74.6325 V 85.8577 L 60.9327,74.6325 V 46.0593 L 72.1579,34.8341 v 11.2252 z","b":"M 60.9327,85.8577 H 72.1579 L 60.9327,74.6325 H 32.3595 L 21.1343,85.8577 h 11.2252 z","t":"M 60.9327,34.8341 H 72.1579 L 60.9327,46.0593 H 32.3595 L 21.1343,34.8341 h 11.2252 z"},"cap":{"x":"29.1712","y":"105.2181"},"top":{"x":"46.101799","y":"30.7647"}},{"id":"48","path":{"z":"m 11.1343 349.9916 v 26.0236 h 71.0236 v -26.0236 z", "s":"m 21.1343,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"M 32.3595,386.2168 V 414.79 h 28.5732 v -28.5732 z","l":"m 21.1343,414.79 v 11.2252 L 32.3595,414.79 V 386.2168 L 21.1343,374.9916 v 11.2252 z","r":"m 72.1579,414.79 v 11.2252 L 60.9327,414.79 v -28.5732 l 11.2252,-11.2252 v 11.2252 z","b":"M 60.9327,426.0152 H 72.1579 L 60.9327,414.79 H 32.3595 l -11.2252,11.2252 h 11.2252 z","t":"M 60.9327,374.9916 H 72.1579 L 60.9327,386.2168 H 32.3595 L 21.1343,374.9916 h 11.2252 z"},"cap":{"x":"26.579201","y":"445.37561"},"top":{"x":"46.101799","y":"370.92221"}},{"id":"24","path":{"z":"M 719.7957 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 729.7957,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 741.0209,46.0593 v 28.5732 h 28.5732 V 46.0593 Z","l":"M 729.7957,74.6325 V 85.8577 L 741.0209,74.6325 V 46.0593 L 729.7957,34.8341 v 11.2252 z","r":"M 780.8193,74.6325 V 85.8577 L 769.5941,74.6325 V 46.0593 l 11.2252,-11.2252 v 11.2252 z","b":"m 769.5941,85.8577 h 11.2252 L 769.5941,74.6325 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 769.5941,34.8341 h 11.2252 L 769.5941,46.0593 H 741.0209 L 729.7957,34.8341 h 11.2252 z"},"cap":{"x":"735.71753","y":"105.0021"},"top":{"x":"754.76318","y":"30.7647"}},{"id":"34","path":{"z":"m 719.7957 349.9916 v 26.023600000000002 h 71.023620 v -26.0236 Z","s":"m 729.7957,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"M 741.0209,386.2168 V 414.79 h 28.5732 v -28.5732 z","l":"m 729.7957,414.79 v 11.2252 L 741.0209,414.79 v -28.5732 l -11.2252,-11.2252 v 11.2252 z","r":"m 780.8193,414.79 v 11.2252 L 769.5941,414.79 v -28.5732 l 11.2252,-11.2252 v 11.2252 z","b":"m 769.5941,426.0152 h 11.2252 L 769.5941,414.79 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 769.5941,374.9916 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"736.08661","y":"445.37561"},"top":{"x":"754.76318","y":"370.92221"}},{"id":"64","path":{"z":"m 719.7957 123.2199 v 26.023699999999998 h 71.023620 v -26.02369999999999 z","s":"m 729.7957,148.2199 v 51.0237 h 51.0236 v -51.0237 z","c":"m 741.0209,159.4451 v 28.5733 h 28.5732 v -28.5733 z","l":"m 729.7957,188.0184 v 11.2252 l 11.2252,-11.2252 v -28.5733 l -11.2252,-11.2252 v 11.2252 z","r":"m 780.8193,188.0184 v 11.2252 l -11.2252,-11.2252 v -28.5733 l 11.2252,-11.2252 v 11.2252 z","b":"m 769.5941,199.2436 h 11.2252 l -11.2252,-11.2252 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 769.5941,148.2199 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"735.97858","y":"218.6039"},"top":{"x":"754.76318","y":"144.1505"}},{"id":"74","path":{"z":"m 719.7957 236.6058 v 26.023600000000002 h 71.023620 v -26.0236 z","s":"m 729.7957,261.6058 v 51.0236 h 51.0236 v -51.0236 z","c":"m 741.0209,272.831 v 28.5732 h 28.5732 V 272.831 Z","l":"m 729.7957,301.4042 v 11.2252 l 11.2252,-11.2252 V 272.831 l -11.2252,-11.2252 v 11.2252 z","r":"m 780.8193,301.4042 v 11.2252 L 769.5941,301.4042 V 272.831 l 11.2252,-11.2252 v 11.2252 z","b":"m 769.5941,312.6294 h 11.2252 l -11.2252,-11.2252 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 769.5941,261.6058 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"736.2218","y":"331.77371"},"top":{"x":"754.76318","y":"257.53629"}},{"id":"17","path":{"z":"m 73.4965 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 83.4965,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 94.7217,46.0593 v 28.5732 h 28.5732 V 46.0593 Z","l":"M 83.4965,74.6325 V 85.8577 L 94.7217,74.6325 V 46.0593 L 83.4965,34.8341 v 11.2252 z","r":"M 134.5201,74.6325 V 85.8577 L 123.2949,74.6325 V 46.0593 l 11.2252,-11.2252 v 11.2252 z","b":"m 123.2949,85.8577 h 11.2252 L 123.2949,74.6325 H 94.7217 L 83.4965,85.8577 h 11.2252 z","t":"m 123.2949,34.8341 h 11.2252 L 123.2949,46.0593 H 94.7217 L 83.4965,34.8341 h 11.2252 z"},"cap":{"x":"91.551399","y":"105.0021"},"top":{"x":"108.464","y":"30.7647"}},{"id":"47","path":{"z":"m 73.4965 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 83.4965,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"M 94.7217,386.2168 V 414.79 h 28.5732 v -28.5732 z","l":"m 83.4965,414.79 v 11.2252 L 94.7217,414.79 V 386.2168 L 83.4965,374.9916 v 11.2252 z","r":"m 134.5201,414.79 v 11.2252 L 123.2949,414.79 v -28.5732 l 11.2252,-11.2252 v 11.2252 z","b":"m 123.2949,426.0152 h 11.2252 L 123.2949,414.79 H 94.7217 l -11.2252,11.2252 h 11.2252 z","t":"m 123.2949,374.9916 h 11.2252 l -11.2252,11.2252 H 94.7217 L 83.4965,374.9916 h 11.2252 z"},"cap":{"x":"88.959396","y":"445.15961"},"top":{"x":"108.464","y":"370.92221"}},{"id":"25","path":{"z":"m 782.1579 9.8341 v 26.0236 h 71.0236 v -26.0236 z","s":"m 792.1579,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 803.3831,46.0593 v 28.5732 h 28.5732 V 46.0593 Z","l":"M 792.1579,74.6325 V 85.8577 L 803.3831,74.6325 V 46.0593 L 792.1579,34.8341 v 11.2252 z","r":"M 843.1815,74.6325 V 85.8577 L 831.9563,74.6325 V 46.0593 l 11.2252,-11.2252 v 11.2252 z","b":"m 831.9563,85.8577 h 11.2252 L 831.9563,74.6325 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 831.9563,34.8341 h 11.2252 L 831.9563,46.0593 H 803.3831 L 792.1579,34.8341 h 11.2252 z"},"cap":{"x":"798.00769","y":"105.2181"},"top":{"x":"817.12543","y":"30.7647"}},{"id":"35","path":{"z":"m 782.1579 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 792.1579,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"M 803.3831,386.2168 V 414.79 h 28.5732 v -28.5732 z","l":"m 792.1579,414.79 v 11.2252 L 803.3831,414.79 v -28.5732 l -11.2252,-11.2252 v 11.2252 z","r":"m 843.1815,414.79 v 11.2252 L 831.9563,414.79 v -28.5732 l 11.2252,-11.2252 v 11.2252 z","b":"m 831.9563,426.0152 h 11.2252 L 831.9563,414.79 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 831.9563,374.9916 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"798.37677","y":"445.37561"},"top":{"x":"817.12543","y":"370.92221"}},{"id":"65","path":{"z":"m 782.1579 123.2199 v 26.0237 h 71.0236 v -26.0237 z","s":"m 792.1579,148.2199 v 51.0237 h 51.0236 v -51.0237 z","c":"m 803.3831,159.4451 v 28.5733 h 28.5732 v -28.5733 z","l":"m 792.1579,188.0184 v 11.2252 l 11.2252,-11.2252 v -28.5733 l -11.2252,-11.2252 v 11.2252 z","r":"m 843.1815,188.0184 v 11.2252 l -11.2252,-11.2252 v -28.5733 l 11.2252,-11.2252 v 11.2252 z","b":"m 831.9563,199.2436 h 11.2252 l -11.2252,-11.2252 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 831.9563,148.2199 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"798.2688","y":"218.6039"},"top":{"x":"817.12543","y":"144.1505"}},{"id":"75","path":{"z":"m 782.1579 236.6058 v 26.0236 h 71.0236 v -26.0236 z","s":"m 792.1579,261.6058 v 51.0236 h 51.0236 v -51.0236 z","c":"m 803.3831,272.831 v 28.5732 h 28.5732 V 272.831 Z","l":"m 792.1579,301.4042 v 11.2252 l 11.2252,-11.2252 V 272.831 l -11.2252,-11.2252 v 11.2252 z","r":"m 843.1815,301.4042 v 11.2252 L 831.9563,301.4042 V 272.831 l 11.2252,-11.2252 v 11.2252 z","b":"m 831.9563,312.6294 h 11.2252 l -11.2252,-11.2252 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 831.9563,261.6058 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"798.51202","y":"331.98969"},"top":{"x":"817.12543","y":"257.53629"}},{"id":"16","path":{"z":"m 135.8587 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 145.8587,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 157.0839,46.0593 v 28.5732 h 28.5732 V 46.0593 Z","l":"M 145.8587,74.6325 V 85.8577 L 157.0839,74.6325 V 46.0593 L 145.8587,34.8341 v 11.2252 z","r":"M 196.8823,74.6325 V 85.8577 L 185.6571,74.6325 V 46.0593 l 11.2252,-11.2252 v 11.2252 z","b":"m 185.6571,85.8577 h 11.2252 L 185.6571,74.6325 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 185.6571,34.8341 h 11.2252 L 185.6571,46.0593 H 157.0839 L 145.8587,34.8341 h 11.2252 z"},"cap":{"x":"153.9045","y":"105.2181"},"top":{"x":"170.8262","y":"30.7647"}},{"id":"46","path":{"z":"m 135.8587 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 145.8587,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"M 157.0839,386.2168 V 414.79 h 28.5732 v -28.5732 z","l":"m 145.8587,414.79 v 11.2252 L 157.0839,414.79 v -28.5732 l -11.2252,-11.2252 v 11.2252 z","r":"m 196.8823,414.79 v 11.2252 L 185.6571,414.79 v -28.5732 l 11.2252,-11.2252 v 11.2252 z","b":"m 185.6571,426.0152 h 11.2252 L 185.6571,414.79 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 185.6571,374.9916 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"151.3125","y":"445.37561"},"top":{"x":"170.8262","y":"370.92221"}},{"id":"26","path":{"z":"m 844.5201 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 854.5201,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 865.7453,46.0593 v 28.5732 h 28.5732 V 46.0593 Z","l":"M 854.5201,74.6325 V 85.8577 L 865.7453,74.6325 V 46.0593 L 854.5201,34.8341 v 11.2252 z","r":"M 905.5437,74.6325 V 85.8577 L 894.3185,74.6325 V 46.0593 l 11.2252,-11.2252 v 11.2252 z","b":"m 894.3185,85.8577 h 11.2252 L 894.3185,74.6325 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 894.3185,34.8341 h 11.2252 L 894.3185,46.0593 H 865.7453 L 854.5201,34.8341 h 11.2252 z"},"cap":{"x":"860.41492","y":"105.2181"},"top":{"x":"879.48767","y":"30.7647"}},{"id":"36","path":{"z":"m 844.5201 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 854.5201,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"M 865.7453,386.2168 V 414.79 h 28.5732 v -28.5732 z","l":"m 854.5201,414.79 v 11.2252 L 865.7453,414.79 v -28.5732 l -11.2252,-11.2252 v 11.2252 z","r":"m 905.5437,414.79 v 11.2252 L 894.3185,414.79 v -28.5732 l 11.2252,-11.2252 v 11.2252 z","b":"m 894.3185,426.0152 h 11.2252 L 894.3185,414.79 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 894.3185,374.9916 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"860.784","y":"445.37561"},"top":{"x":"879.48767","y":"370.92221"}},{"id":"15","path":{"z":"m 198.2209 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 208.2209,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 219.4461,46.0593 v 28.5732 h 28.5732 V 46.0593 Z","l":"M 208.2209,74.6325 V 85.8577 L 219.4461,74.6325 V 46.0593 L 208.2209,34.8341 v 11.2252 z","r":"M 259.2445,74.6325 V 85.8577 L 248.0193,74.6325 V 46.0593 l 11.2252,-11.2252 v 11.2252 z","b":"m 248.0193,85.8577 h 11.2252 L 248.0193,74.6325 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 248.0193,34.8341 h 11.2252 L 248.0193,46.0593 H 219.4461 L 208.2209,34.8341 h 11.2252 z"},"cap":{"x":"216.2218","y":"105.2181"},"top":{"x":"233.1884","y":"30.7647"}},{"id":"45","path":{"z":"m 198.2209 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 208.2209,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"M 219.4461,386.2168 V 414.79 h 28.5732 v -28.5732 z","l":"m 208.2209,414.79 v 11.2252 L 219.4461,414.79 v -28.5732 l -11.2252,-11.2252 v 11.2252 z","r":"m 259.2445,414.79 v 11.2252 L 248.0193,414.79 v -28.5732 l 11.2252,-11.2252 v 11.2252 z","b":"m 248.0193,426.0152 h 11.2252 L 248.0193,414.79 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 248.0193,374.9916 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"213.62981","y":"445.37561"},"top":{"x":"233.1884","y":"370.92221"}},{"id":"55","path":{"z":"m 198.2209 123.2199 v 26.0237 h 71.0236 v -26.0237 z","s":"m 208.2209,148.2199 v 51.0237 h 51.0236 v -51.0237 z","c":"m 219.4461,159.4451 v 28.5733 h 28.5732 v -28.5733 z","l":"m 208.2209,188.0184 v 11.2252 l 11.2252,-11.2252 v -28.5733 l -11.2252,-11.2252 v 11.2252 z","r":"m 259.2445,188.0184 v 11.2252 l -11.2252,-11.2252 v -28.5733 l 11.2252,-11.2252 v 11.2252 z","b":"m 248.0193,199.2436 h 11.2252 l -11.2252,-11.2252 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 248.0193,148.2199 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"214.4398","y":"218.6039"},"top":{"x":"233.1884","y":"144.1505"}},{"id":"85","path":{"z":"m 198.2209 236.6058 v 26.0236 h 71.0236 v -26.0236 z","s":"m 208.2209,261.6058 v 51.0236 h 51.0236 v -51.0236 z","c":"m 219.4461,272.831 v 28.5732 h 28.5732 V 272.831 Z","l":"m 208.2209,301.4042 v 11.2252 l 11.2252,-11.2252 V 272.831 l -11.2252,-11.2252 v 11.2252 z","r":"m 259.2445,301.4042 v 11.2252 L 248.0193,301.4042 V 272.831 l 11.2252,-11.2252 v 11.2252 z","b":"m 248.0193,312.6294 h 11.2252 l -11.2252,-11.2252 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 248.0193,261.6058 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"214.41299","y":"331.98969"},"top":{"x":"233.1884","y":"257.53629"}},{"id":"27","path":{"z":"m 906.8823 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 916.8823,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 928.1075,46.0593 v 28.5732 h 28.5732 V 46.0593 Z","l":"M 916.8823,74.6325 V 85.8577 L 928.1075,74.6325 V 46.0593 L 916.8823,34.8341 v 11.2252 z","r":"M 967.9059,74.6325 V 85.8577 L 956.6807,74.6325 V 46.0593 l 11.2252,-11.2252 v 11.2252 z","b":"m 956.6807,85.8577 h 11.2252 L 956.6807,74.6325 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 956.6807,34.8341 h 11.2252 L 956.6807,46.0593 H 928.1075 L 916.8823,34.8341 h 11.2252 z"},"cap":{"x":"922.78619","y":"105.0021"},"top":{"x":"941.84991","y":"30.7647"}},{"id":"37","path":{"z":"m 906.8823 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 916.8823,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"M 928.1075,386.2168 V 414.79 h 28.5732 v -28.5732 z","l":"m 916.8823,414.79 v 11.2252 L 928.1075,414.79 v -28.5732 l -11.2252,-11.2252 v 11.2252 z","r":"m 967.9059,414.79 v 11.2252 L 956.6807,414.79 v -28.5732 l 11.2252,-11.2252 v 11.2252 z","b":"m 956.6807,426.0152 h 11.2252 L 956.6807,414.79 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 956.6807,374.9916 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"923.15521","y":"445.37561"},"top":{"x":"941.84991","y":"370.92221"}},{"id":"14","path":{"z":"m 260.5831 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 270.5831,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 281.8083,46.0593 v 28.5732 h 28.5732 V 46.0593 Z","l":"M 270.5831,74.6325 V 85.8577 L 281.8083,74.6325 V 46.0593 L 270.5831,34.8341 v 11.2252 z","r":"M 321.6067,74.6325 V 85.8577 L 310.3815,74.6325 V 46.0593 l 11.2252,-11.2252 v 11.2252 z","b":"m 310.3815,85.8577 h 11.2252 L 310.3815,74.6325 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 310.3815,34.8341 h 11.2252 L 310.3815,46.0593 H 281.8083 L 270.5831,34.8341 h 11.2252 z"},"cap":{"x":"278.65601","y":"105.0021"},"top":{"x":"295.5506","y":"30.7647"}},{"id":"44","path":{"z":"m 260.5831 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 270.5831,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"M 281.8083,386.2168 V 414.79 h 28.5732 v -28.5732 z","l":"m 270.5831,414.79 v 11.2252 L 281.8083,414.79 v -28.5732 l -11.2252,-11.2252 v 11.2252 z","r":"m 321.6067,414.79 v 11.2252 L 310.3815,414.79 v -28.5732 l 11.2252,-11.2252 v 11.2252 z","b":"m 310.3815,426.0152 h 11.2252 L 310.3815,414.79 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 310.3815,374.9916 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"276.064","y":"445.15961"},"top":{"x":"295.5506","y":"370.92221"}},{"id":"54","path":{"z":"m 260.5831 123.2199 v 25.0237 h 71.0236 v -25.0237 z","s":"m 270.5831,148.2199 v 51.0237 h 51.0236 v -51.0237 z","c":"m 281.8083,159.4451 v 28.5733 h 28.5732 v -28.5733 z","l":"m 270.5831,188.0184 v 11.2252 l 11.2252,-11.2252 v -28.5733 l -11.2252,-11.2252 v 11.2252 z","r":"m 321.6067,188.0184 v 11.2252 l -11.2252,-11.2252 v -28.5733 l 11.2252,-11.2252 v 11.2252 z","b":"m 310.3815,199.2436 h 11.2252 l -11.2252,-11.2252 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 310.3815,148.2199 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"276.87399","y":"218.6039"},"top":{"x":"295.5506","y":"144.1505"}},{"id":"84","path":{"z":"m 260.5831 236.6058 v 26.0236 h 71.0236 v -26.0236 z","s":"m 270.5831,261.6058 v 51.0236 h 51.0236 v -51.0236 z","c":"m 281.8083,272.831 v 28.5732 h 28.5732 V 272.831 Z","l":"m 270.5831,301.4042 v 11.2252 l 11.2252,-11.2252 V 272.831 l -11.2252,-11.2252 v 11.2252 z","r":"m 321.6067,301.4042 v 11.2252 L 310.3815,301.4042 V 272.831 l 11.2252,-11.2252 v 11.2252 z","b":"m 310.3815,312.6294 h 11.2252 l -11.2252,-11.2252 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 310.3815,261.6058 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"276.8472","y":"331.98969"},"top":{"x":"295.5506","y":"257.53629"}},{"id":"28","path":{"z":"m 969.2445 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 979.2445,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 990.4697,46.0593 v 28.5732 h 28.5732 V 46.0593 Z","l":"M 979.2445,74.6325 V 85.8577 L 990.4697,74.6325 V 46.0593 L 979.2445,34.8341 v 11.2252 z","r":"M 1030.2681,74.6325 V 85.8577 L 1019.0429,74.6325 V 46.0593 l 11.2252,-11.2252 v 11.2252 z","b":"m 1019.0429,85.8577 h 11.2252 l -11.2252,-11.2252 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 1019.0429,34.8341 h 11.2252 l -11.2252,11.2252 H 990.4697 L 979.2445,34.8341 h 11.2252 z"},"cap":{"x":"985.13037","y":"105.2181"},"top":{"x":"1004.2121","y":"30.7647"}},{"id":"38","path":{"z":"m 969.2445 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 979.2445,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"M 990.4697,386.2168 V 414.79 h 28.5732 v -28.5732 z","l":"m 979.2445,414.79 v 11.2252 L 990.4697,414.79 v -28.5732 l -11.2252,-11.2252 v 11.2252 z","r":"m 1030.2681,414.79 v 11.2252 L 1019.0429,414.79 v -28.5732 l 11.2252,-11.2252 v 11.2252 z","b":"m 1019.0429,426.0152 h 11.2252 L 1019.0429,414.79 h -28.5732 l -11.2252,11.2252 h 11.2252 z","t":"m 1019.0429,374.9916 h 11.2252 l -11.2252,11.2252 h -28.5732 l -11.2252,-11.2252 h 11.2252 z"},"cap":{"x":"985.49939","y":"445.37561"},"top":{"x":"1004.2121","y":"370.92221"}},{"id":"13","path":{"z":"m 322.9453 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 332.9453,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 344.1705,60.2042 v 0.2835 h 28.5732 v -0.2835 z","l":"m 332.9453,74.6325 v 11.2252 l 11.2252,-25.6534 v 0 L 332.9453,34.8341 v 11.2252 z","r":"M 383.9689,74.6325 V 85.8577 L 372.7437,60.4876 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 372.7437,85.8577 h 11.2252 L 372.7437,60.4876 h -28.5732 l -11.2252,25.3701 h 11.2252 z","t":"m 372.7437,34.8341 h 11.2252 L 372.7437,60.2043 H 344.1705 L 332.9453,34.8341 h 11.2252 z"},"cap":{"x":"340.99109","y":"105.2181"},"top":{"x":"357.9129","y":"30.7647"}},{"id":"43","path":{"z":"m 322.9453 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 332.9453,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"m 344.1705,400.3617 v 0.2834 h 28.5732 v -0.2834 z","l":"m 332.9453,414.79 v 11.2252 l 11.2252,-25.6534 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 383.9689,414.79 v 11.2252 L 372.7437,400.645 v -0.2832 l 11.2252,-25.3702 v 11.2252 z","b":"m 372.7437,426.0152 h 11.2252 L 372.7437,400.645 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 372.7437,374.9916 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"338.39911","y":"445.37561"},"top":{"x":"357.9129","y":"370.92221"}},{"id":"53","path":{"z":"m 322.9453 123.2199 v 26.0237 h 71.0236 v -26.0237 z","s":"m 332.9453,148.2199 v 51.0237 h 51.0236 v -51.0237 z","c":"m 344.1705,173.59 v 0.2835 h 28.5732 V 173.59 Z","l":"m 332.9453,188.0184 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 383.9689,188.0184 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 372.7437,199.2436 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 372.7437,148.2199 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"339.20911","y":"218.6039"},"top":{"x":"357.9129","y":"144.1505"}},{"id":"83","path":{"z":"m 322.9453 236.6058 v 26.0236 h 71.0236 v -26.0236 z","s":"m 332.9453,261.6058 v 51.0236 h 51.0236 v -51.0236 z","c":"m 344.1705,286.9758 v 0.2835 h 28.5732 v -0.2835 z","l":"m 332.9453,301.4042 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3701 v 11.2252 z","r":"m 383.9689,301.4042 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3701 v 11.2252 z","b":"m 372.7437,312.6294 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 372.7437,261.6058 h 11.2252 l -11.2252,25.3701 h -28.5732 l -11.2252,-25.3701 h 11.2252 z"},"cap":{"x":"339.1824","y":"331.98969"},"top":{"x":"357.9129","y":"257.53629"}},{"id":"21","path":{"z":"m 532.7091 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 542.7091,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 553.9343,60.2042 v 0.2835 h 28.5732 v -0.2835 z","l":"m 542.7091,74.6325 v 11.2252 l 11.2252,-25.6534 v 0 L 542.7091,34.8341 v 11.2252 z","r":"M 593.7327,74.6325 V 85.8577 L 582.5075,60.4876 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 582.5075,85.8577 h 11.2252 L 582.5075,60.4876 h -28.5732 l -11.2252,25.3701 h 11.2252 z","t":"m 582.5075,34.8341 h 11.2252 L 582.5075,60.2043 H 553.9343 L 542.7091,34.8341 h 11.2252 z"},"cap":{"x":"549.85492","y":"105.0021"},"top":{"x":"567.67657","y":"30.7647"}},{"id":"31","path":{"z":"m 532.7091 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 542.7091,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"m 553.9343,400.3617 v 0.2834 h 28.5732 v -0.2834 z","l":"m 542.7091,414.79 v 11.2252 l 11.2252,-25.6534 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 593.7327,414.79 v 11.2252 L 582.5075,400.645 v -0.2832 l 11.2252,-25.3702 v 11.2252 z","b":"m 582.5075,426.0152 h 11.2252 L 582.5075,400.645 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 582.5075,374.9916 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"550.224","y":"445.37561"},"top":{"x":"567.67657","y":"370.92221"}},{"id":"61","path":{"z":"m 532.7091 123.2199 v 26.0237 h 71.0236 v -26.0237 z","s":"m 542.7091,148.2199 v 51.0237 h 51.0236 v -51.0237 z","c":"m 553.9343,173.59 v 0.2835 h 28.5732 V 173.59 Z","l":"m 542.7091,188.0184 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 593.7327,188.0184 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 582.5075,199.2436 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 582.5075,148.2199 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"550.11603","y":"218.6039"},"top":{"x":"567.67657","y":"144.1505"}},{"id":"71","path":{"z":"m 532.7091 236.6058 v 26.0236 h 71.0236 v -26.0236 z","s":"m 542.7091,261.6058 v 51.0236 h 51.0236 v -51.0236 z","c":"m 553.9343,286.9758 v 0.2835 h 28.5732 v -0.2835 z","l":"m 542.7091,301.4042 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3701 v 11.2252 z","r":"m 593.7327,301.4042 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3701 v 11.2252 z","b":"m 582.5075,312.6294 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 582.5075,261.6058 h 11.2252 l -11.2252,25.3701 h -28.5732 l -11.2252,-25.3701 h 11.2252 z"},"cap":{"x":"550.35919","y":"331.77371"},"top":{"x":"567.67657","y":"257.53629"}},{"id":"12","path":{"z":"m 385.3075 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 395.3075,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 406.5327,60.2042 v 0.2835 h 28.5732 v -0.2835 z","l":"m 395.3075,74.6325 v 11.2252 l 11.2252,-25.6534 v 0 L 395.3075,34.8341 v 11.2252 z","r":"M 446.3311,74.6325 V 85.8577 L 435.1059,60.4876 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 435.1059,85.8577 h 11.2252 L 435.1059,60.4876 h -28.5732 l -11.2252,25.3701 h 11.2252 z","t":"m 435.1059,34.8341 h 11.2252 L 435.1059,60.2043 H 406.5327 L 395.3075,34.8341 h 11.2252 z"},"cap":{"x":"403.42542","y":"105.0021"},"top":{"x":"420.27509","y":"30.7647"}},{"id":"42","path":{"z":"m 385.3075 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 395.3075,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"m 406.5327,400.3617 v 0.2834 h 28.5732 v -0.2834 z","l":"m 395.3075,414.79 v 11.2252 l 11.2252,-25.6534 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 446.3311,414.79 v 11.2252 L 435.1059,400.645 v -0.2832 l 11.2252,-25.3702 v 11.2252 z","b":"m 435.1059,426.0152 h 11.2252 L 435.1059,400.645 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 435.1059,374.9916 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"400.8334","y":"445.15961"},"top":{"x":"420.27509","y":"370.92221"}},{"id":"52","path":{"z":"m 385.3075 123.2199 v 26.0237 h 71.0236 v -26.0237 z","s":"m 395.3075,148.2199 v 51.0237 h 51.0236 v -51.0237 z","c":"m 406.5327,173.59 v 0.2835 h 28.5732 V 173.59 Z","l":"m 395.3075,188.0184 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 446.3311,188.0184 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 435.1059,199.2436 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 435.1059,148.2199 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"401.6434","y":"218.6039"},"top":{"x":"420.27509","y":"144.1505"}},{"id":"82","path":{"z":"m 385.3075 236.6058 v 26.0236 h 71.0236 v -26.0236 z","s":"m 395.3075,261.6058 v 51.0236 h 51.0236 v -51.0236 z","c":"m 406.5327,286.9758 v 0.2835 h 28.5732 v -0.2835 z","l":"m 395.3075,301.4042 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3701 v 11.2252 z","r":"m 446.3311,301.4042 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3701 v 11.2252 z","b":"m 435.1059,312.6294 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 435.1059,261.6058 h 11.2252 l -11.2252,25.3701 h -28.5732 l -11.2252,-25.3701 h 11.2252 z"},"cap":{"x":"401.61661","y":"331.98969"},"top":{"x":"420.27509","y":"257.53629"}},{"id":"22","path":{"z":"m 595.0713 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 605.0713,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 616.2965,60.2042 v 0.2835 h 28.5732 v -0.2835 z","l":"m 605.0713,74.6325 v 11.2252 l 11.2252,-25.6534 v 0 L 605.0713,34.8341 v 11.2252 z","r":"M 656.0949,74.6325 V 85.8577 L 644.8697,60.4876 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 644.8697,85.8577 h 11.2252 L 644.8697,60.4876 h -28.5732 l -11.2252,25.3701 h 11.2252 z","t":"m 644.8697,34.8341 h 11.2252 L 644.8697,60.2043 H 616.2965 L 605.0713,34.8341 h 11.2252 z"},"cap":{"x":"611.03809","y":"105.0021"},"top":{"x":"630.03882","y":"30.7647"}},{"id":"32","path":{"z":"m 595.0713 349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 605.0713,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"m 616.2965,400.3617 v 0.2834 h 28.5732 v -0.2834 z","l":"m 605.0713,414.79 v 11.2252 l 11.2252,-25.6534 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 656.0949,414.79 v 11.2252 L 644.8697,400.645 v -0.2832 l 11.2252,-25.3702 v 11.2252 z","b":"m 644.8697,426.0152 h 11.2252 L 644.8697,400.645 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 644.8697,374.9916 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"611.4071","y":"445.37561"},"top":{"x":"630.03882","y":"370.92221"}},{"id":"62","path":{"z":"m 595.0713 123.2199 v 26.0237 h 71.0236 v -26.0237 z","s":"m 605.0713,148.2199 v 51.0237 h 51.0236 v -51.0237 z","c":"m 616.2965,173.59 v 0.2835 h 28.5732 V 173.59 Z","l":"m 605.0713,188.0184 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 656.0949,188.0184 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 644.8697,199.2436 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 644.8697,148.2199 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"611.29907","y":"218.6039"},"top":{"x":"630.03882","y":"144.1505"}},{"id":"72","path":{"z":"m 595.0713 236.6058 v 26.0236 h 71.0236 v -26.0236 z","s":"m 605.0713,261.6058 v 51.0236 h 51.0236 v -51.0236 z","c":"m 616.2965,286.9758 v 0.2835 h 28.5732 v -0.2835 z","l":"m 605.0713,301.4042 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3701 v 11.2252 z","r":"m 656.0949,301.4042 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3701 v 11.2252 z","b":"m 644.8697,312.6294 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 644.8697,261.6058 h 11.2252 l -11.2252,25.3701 h -28.5732 l -11.2252,-25.3701 h 11.2252 z"},"cap":{"x":"611.5423","y":"331.77371"},"top":{"x":"630.03882","y":"257.53629"}},{"id":"11","path":{"z":"m 447.6697,9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 457.6697,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 468.8949,60.2042 v 0.2835 h 28.5732 v -0.2835 z","l":"m 457.6697,74.6325 v 11.2252 l 11.2252,-25.6534 v 0 L 457.6697,34.8341 v 11.2252 z","r":"M 508.6933,74.6325 V 85.8577 L 497.4681,60.4876 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 497.4681,85.8577 h 11.2252 L 497.4681,60.4876 h -28.5732 l -11.2252,25.3701 h 11.2252 z","t":"m 497.4681,34.8341 h 11.2252 L 497.4681,60.2043 H 468.8949 L 457.6697,34.8341 h 11.2252 z"},"cap":{"x":"468.3017","y":"105.0021"},"top":{"x":"482.6373","y":"30.7647"}},{"id":"41","path":{"z":"m 447.6697,349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 457.6697,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"m 468.8949,400.3617 v 0.2834 h 28.5732 v -0.2834 z","l":"m 457.6697,414.79 v 11.2252 l 11.2252,-25.6534 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 508.6933,414.79 v 11.2252 L 497.4681,400.645 v -0.2832 l 11.2252,-25.3702 v 11.2252 z","b":"m 497.4681,426.0152 h 11.2252 L 497.4681,400.645 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 497.4681,374.9916 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"464.3746","y":"445.15961"},"top":{"x":"482.6373","y":"370.92221"}},{"id":"51","path":{"z":"m 447.6697,123.2199 v 26.0237 h 71.0236 v -26.0237 z","s":"m 457.6697,148.2199 v 51.0237 h 51.0236 v -51.0237 z","c":"m 468.8949,173.59 v 0.2835 h 28.5732 V 173.59 Z","l":"m 457.6697,188.0184 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 508.6933,188.0184 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 497.4681,199.2436 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 497.4681,148.2199 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"465.1846","y":"218.6039"},"top":{"x":"482.6373","y":"144.1505"}},{"id":"81","path":{"z":"m 447.6697 236.6058 v 26.0236 h 71.0236 v -26.0236 z","s":"m 457.6697,261.6058 v 51.0236 h 51.0236 v -51.0236 z","c":"m 468.8949,286.9758 v 0.2835 h 28.5732 v -0.2835 z","l":"m 457.6697,301.4042 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3701 v 11.2252 z","r":"m 508.6933,301.4042 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3701 v 11.2252 z","b":"m 497.4681,312.6294 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 497.4681,261.6058 h 11.2252 l -11.2252,25.3701 h -28.5732 l -11.2252,-25.3701 h 11.2252 z"},"cap":{"x":"465.15781","y":"331.98969"},"top":{"x":"482.6373","y":"257.53629"}},{"id":"23","path":{"z":"m 657.4335 9.8341 v 26.0236 h 71.0236 V 9.8341 Z","s":"m 667.4335,34.8341 v 51.0236 h 51.0236 V 34.8341 Z","c":"m 678.6587,60.2042 v 0.2835 h 28.5732 v -0.2835 z","l":"m 667.4335,74.6325 v 11.2252 l 11.2252,-25.6534 v 0 L 667.4335,34.8341 v 11.2252 z","r":"M 718.4571,74.6325 V 85.8577 L 707.2319,60.4876 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 707.2319,85.8577 h 11.2252 L 707.2319,60.4876 h -28.5732 l -11.2252,25.3701 h 11.2252 z","t":"m 707.2319,34.8341 h 11.2252 L 707.2319,60.2043 H 678.6587 L 667.4335,34.8341 h 11.2252 z"},"cap":{"x":"673.32831","y":"105.2181"},"top":{"x":"692.401","y":"30.7647"}},{"id":"33","path":{"z":"m 657.4335,349.9916 v 26.0236 h 71.0236 v -26.0236 z","s":"m 667.4335,374.9916 v 51.0236 h 51.0236 v -51.0236 z","c":"m 678.6587,400.3617 v 0.2834 h 28.5732 v -0.2834 z","l":"m 667.4335,414.79 v 11.2252 l 11.2252,-25.6534 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 718.4571,414.79 v 11.2252 L 707.2319,400.645 v -0.2832 l 11.2252,-25.3702 v 11.2252 z","b":"m 707.2319,426.0152 h 11.2252 L 707.2319,400.645 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 707.2319,374.9916 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"673.69733","y":"445.37561"},"top":{"x":"692.401","y":"370.92221"}},{"id":"63","path":{"z":"m 657.4335,123.2199 v 26.0237 h 71.0236 v -26.0237 z","s":"m 667.4335,148.2199 v 51.0237 h 51.0236 v -51.0237 z","c":"m 678.6587,173.59 v 0.2835 h 28.5732 V 173.59 Z","l":"m 667.4335,188.0184 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3702 v 11.2252 z","r":"m 718.4571,188.0184 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3702 v 11.2252 z","b":"m 707.2319,199.2436 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 707.2319,148.2199 h 11.2252 l -11.2252,25.3702 h -28.5732 l -11.2252,-25.3702 h 11.2252 z"},"cap":{"x":"673.58929","y":"218.6039"},"top":{"x":"692.401","y":"144.1505"}},{"id":"73","path":{"z":"m 657.4335 236.6058 v 26.0236 h 71.0236 v -26.0236 z","s":"m 667.4335,261.6058 v 51.0236 h 51.0236 v -51.0236 z","c":"m 678.6587,286.9758 v 0.2835 h 28.5732 v -0.2835 z","l":"m 667.4335,301.4042 v 11.2252 l 11.2252,-25.6535 v 0 l -11.2252,-25.3701 v 11.2252 z","r":"m 718.4571,301.4042 v 11.2252 l -11.2252,-25.3702 v -0.2833 l 11.2252,-25.3701 v 11.2252 z","b":"m 707.2319,312.6294 h 11.2252 l -11.2252,-25.3702 h -28.5732 l -11.2252,25.3702 h 11.2252 z","t":"m 707.2319,261.6058 h 11.2252 l -11.2252,25.3701 h -28.5732 l -11.2252,-25.3701 h 11.2252 z"},"cap":{"x":"673.83258","y":"331.98969"},"top":{"x":"692.401","y":"257.53629"}}];

        
	var pub={width:_WIDTH_,height:_HEIGHT_,messagesSimbolos:false,messagesFill:false}, _pv={}, cmd=false, auto=0, data=[],datafill=[], zoom, history;
	pub.init = () => { 
		$.extend(pub,opt); 
		zoom=typeof(opt.zoom)=='undefined'?100:opt.zoom;
		_pv.render();
		_pv.initComponent();
		_pv.initComponentfill();
		_pv.autoNone();
		pub.new();
	}
	_pv.autoNone = () => {
		auto++;
		if(auto==_AUTO_NONE_){_pv.setcommand(_CMD_NONE_);_pv.setcommand_fill(_CMD_NONE_FILL_);} ;
		setTimeout(() => { _pv.autoNone()},100)
	}

	_pv.clear = () => {
		data=[]; odt.map((v) => { data.push({id:parseInt(v.id),sts:0,fill:{base:0,top:0,bottom:0,left:0,right:0,center:0},ext:0})})
		datafill=[]; odt.map((v) => { datafill.push({id:parseInt(v.id),sts:0,fill:{base:0,top:0,bottom:0,left:0,right:0,center:0},ext:0})})

	}
	_pv.checkFill = (f) => { for (let k in f) { if(f[k]>_NONE_FILL_) return f[k] }; return _NONE_FILL_ }
	_pv.setFill = (f,v) => { for (let k in f) f[k]=v}
	_pv.fillColor = (v) => {
		switch(v){
            //fill
			case _NONE_FILL_: return 'tdg-none';
			case _STS_AZUL_: return  'tdg-azul';
			case _STS_ROJO_: return  'tdg-rojo';
			case _STS_AZUL_TEST_: return  'tdg-azul';
			case _STS_ROJO_TEST_: return  'tdg-rojo';
		
		}
	}
	_pv.refreshFill = (trg,obj,v) => { let t=$(trg+'-'+obj), a=t.attr('class'), b=a.split(' '); t.attr('class',b[0]+' '+b[1]+' '+_pv.fillColor(v))}
	_pv.refreshExt = (trg,v) => { 
		let t=$(trg+'-base'), a=t.attr('class'), b=a.split(' '); 
		if(v==_NONE_) t.attr('class',b[0]+' '+b[1]); else t.attr('class',a+' tdg-sign'); 
	}
	_pv.refresh = () => {
		data.map((v) => {
			let trg='.'+pub.pid+'-'+pub.obj+'-'+v.id;
            //simbolos
			switch(v.sts){

                case _NONE_ : $(trg+'-status').attr('fill','none'); $(trg+'-simb').attr('fill','none');break;
				case _STS_1_ :$(trg+'-status').attr('fill','url()'); break;  //sisa akar
                case _STS_2_ :$(trg+'-simb').attr('fill','url()'); break;  //sisa akar
                case _STS_AUS_ :$(trg+'-status').attr('fill','url(#img-ausente)'); break;  //sisa akar
                case _STS_ERUPCION1_ :$(trg+'-simb').attr('fill','url(#img-erupcionx)'); break;  //sisa akar
                case _STS_EDENTULO_  :$(trg+'-status').attr('fill','url(#img-edentulo)'); break;  //sisa akar
                case _STS_SUPERNUMERARIA_:$(trg+'-simb').attr('fill','url(#img-numeraria)'); break;  //sisa akar
                case _STS_EXTRUIDA_  :$(trg+'-simb').attr('fill','url(#img-extruida)'); break;  //sisa akar
                case _STS_INTRUIDA_  :$(trg+'-simb').attr('fill','url(#img-intruida)'); break;  //sisa akar
                case _STS_GIROVERSION_ :$(trg+'-simb').attr('fill','url(#img-giroversion)'); break;  //sisa akar
				case _STS_CLAVIJA_ :$(trg+'-simb').attr('fill','url(#img-clavija)'); break;  //sisa akar

                case _STS_GEMINACION_  :$(trg+'-simb').attr('fill','url(#img-geminacion)'); break;  //sisa akar
                case _STS_CORONA1_ :$(trg+'-status').attr('fill','url(#img-corona-temp)'); break;  //sisa akar
                case _STS_CORONABUENA_ :$(trg+'-status').attr('fill','url(#img-corona-buen)'); break;  //sisa akar
                case _STS_CORONAMALA_ :$(trg+'-status').attr('fill','url(#img-corona-temp)'); break;  //sisa akar
                case _STS_ESPIGO_BUEN_ :$(trg+'-status').attr('fill','url(#img-espigo-buen)'); break;  //sisa akar
				case _STS_ESPIGO_MAL_ :$(trg+'-status').attr('fill','url(#img-espigo-mal)'); break;  //sisa akar

				case _STS_DIAST_INICIO_ :$(trg+'-status').attr('fill','url(#img-diast-inicio)'); break;  //sisa akar
				case _STS_DIAST_FINAL_ :$(trg+'-status').attr('fill','url(#img-diast-final)'); break;  //sisa akar
				case _STS_FUSION_INICIO_ :$(trg+'-simb').attr('fill','url(#img-fusion-inicio)'); break;  //sisa akar
				case _STS_FUSION_FINAL_ :$(trg+'-simb').attr('fill','url(#img-fusion-final)'); break;  //sisa akar
				case _STS_ORTOFIJO_AZUL_INICIO_ :$(trg+'-simb').attr('fill','url(#img-ortofijo-azul-inicio)'); break;  //sisa akar
				case _STS_ORTOFIJO_AZUL_MEDIO_ :$(trg+'-simb').attr('fill','url(#img-ortofijo-azul-medio)'); break;  //sisa akar
				case _STS_ORTOFIJO_AZUL_FINAL_ :$(trg+'-simb').attr('fill','url(#img-ortofijo-azul-final)'); break;  //sisa akar
				case _STS_ORTOFIJO_ROJO_INICIO_ :$(trg+'-simb').attr('fill','url(#img-ortofijo-rojo-inicio)'); break;  //sisa akar
				case _STS_ORTOFIJO_ROJO_MEDIO_ :$(trg+'-simb').attr('fill','url(#img-ortofijo-rojo-medio)'); break;  //sisa akar
				case _STS_ORTOFIJO_ROJO_FINAL_ :$(trg+'-simb').attr('fill','url(#img-ortofijo-rojo-final)'); break;  //sisa akar
				case _STS_ORTOREMOVIBLE_AZUL_ :$(trg+'-simb').attr('fill','url(#img-ortoremovible-azul)'); break;  //sisa akar
				case _STS_ORTOREMOBIBLE_ROJO_ :$(trg+'-simb').attr('fill','url(#img-ortoremovible-rojo)'); break;  //sisa akar
				case _STS_PROTESIFIJA_AZUL_INICIO_ :$(trg+'-simb').attr('fill','url(#img-protesisfija-azul-inicio)'); break;  //sisa akar
				case _STS_PROTESIFIJA_AZUL_MEDIO_ :$(trg+'-simb').attr('fill','url(#img-protesisfija-azul-medio)'); break;  //sisa akar
				case _STS_PROTESIFIJA_AZUL_FINAL_ :$(trg+'-simb').attr('fill','url(#img-protesisfija-azul-final)'); break;  //sisa akar
				
				case _STS_PROTESIFIJA_ROJO_INICIO_ :$(trg+'-simb').attr('fill','url(#img-protesisfija-rojo-inicio)'); break;  //sisa akar
				case _STS_PROTESIFIJA_ROJO_MEDIO_ :$(trg+'-simb').attr('fill','url(#img-protesisfija-rojo-medio)'); break;  //sisa akar
				case _STS_PROTESIFIJA_ROJO_FINAL_ :$(trg+'-simb').attr('fill','url(#img-protesisfija-rojo-final)'); break;  //sisa akar
				case _STS_PROTESISREMOVIBLE_AZUL_ :$(trg+'-simb').attr('fill','url(#img-protesisremovible-azul)'); break;  //sisa akar
				case _STS_PROTESISREMOVIBLE_ROJO_ :$(trg+'-simb').attr('fill','url(#img-protesisremovible-rojo)'); break;  //sisa akar

				case _STS_PROTESISTOTAL_AZUL_ :$(trg+'-simb').attr('fill','url(#img-protesisremovible-azul)'); break;  //sisa akar
				case _STS_PROTESISTOTAL_ROJO_ :$(trg+'-simb').attr('fill','url(#img-protesisremovible-rojo)'); break;  //sisa akar

				case _STS_TRANSPOSICION_INICIO_ :$(trg+'-simb').attr('fill','url(#img-transposicion-inicio)'); break;  //sisa akar
				case _STS_TRANSPOSICION_FINAL_ :$(trg+'-simb').attr('fill','url(#img-transposicion-final)'); break;  //sisa akar
				
				


				
			



	
			}
			for (let k in v.fill) _pv.refreshFill(trg,k,v.fill[k]);
			switch(v.ext){
                //coronas
				case _NONE_: $(trg+'-ext').text(''); _pv.refreshExt(trg,v.ext); break;
				case _STS_AUSENTE_: $(trg+'-ext').text('AU'); _pv.refreshExt(trg,v.ext); break;
				case _STS_PRE_: $(trg+'-ext').text('PRE'); _pv.refreshExt(trg,v.ext); break;
				case _STS_ANO_: $(trg+'-ext').text('ANO'); _pv.refreshExt(trg,v.ext); break;
				//case _STS_CARIES_: $(trg+'-ext').text('CAR'); _pv.refreshExt(trg,v.ext); break;
				case _STS_NONVITAL_: $(trg+'-ext').text('NVT'); _pv.refreshExt(trg,v.ext); break;
			}
		})
	}
	_pv.render = () => {
		let svg='', trg='.'+pub.pid+'-'+pub.obj, scale=zoom/100, h=pub.height, w=pub.width;
		svg+='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="'+h+'" width="'+w+'" class="tdg-svg" version="1.1">';
		svg+=tmpdefs
			.replace(/{zoom}/g, zoom)
			.replace(/{scale}/g, scale);
		svg+='<g>';
		odt.map((v) => {
			svg+=tmp
				.replace(/{id}/g, pub.pid+'-'+pub.obj+'-'+v.id)
				.replace(/{ids}/g, v.id)
                .replace(/{st}/g, v.path.z)
				.replace(/{ps}/g, v.path.s)
				.replace(/{pc}/g, v.path.c)
				.replace(/{pl}/g, v.path.l)
				.replace(/{pr}/g, v.path.r)
				.replace(/{pb}/g, v.path.b)
				.replace(/{pt}/g, v.path.t)
				.replace(/{cx}/g, parseFloat(v.cap.x)+8)
				.replace(/{cy}/g, parseFloat(v.cap.y)+2)
				.replace(/{tx}/g, parseFloat(v.top.x)-20)
				.replace(/{ty}/g, parseFloat(v.top.y)-2)
		});
		svg+='</g>';
		svg+='</svg>';
		$(trg).html(svg);
		$('body').append('<div id="tdg-tmp-svg"></div>')
	}
	//=============
	_pv.in_array = (n, h) => { for(let i in h) if(h[i] == n) return true; return false }
	_pv.getIndex = (id) => { for(let k=0;k<data.length;k++) if(data[k].id==id) return k}
	_pv.getIndexFill = (id) => { for(let k=0;k<datafill.length;k++) if(datafill[k].id==id) return k}

	_pv.onclick = (t,pos,e) => {
		let id=$(t).attr('datasimb'), i=_pv.getIndex(id), d=data[i]; auto=0; //console.log(t,$(t),d); return;
        console.log(cmd)
		switch(cmd){

            //everything





            case _CMD_NONE_ : return;
			case _CMD_1_ : if(d.sts!=_STS_1_){ d.sts=_STS_1_;console.log(_STS_1_); d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_2_ : if(d.sts!=_STS_2_){ d.sts=_STS_2_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_; break;
            case _CMD_AUS_ : if(d.sts!=_STS_AUS_){ d.sts=_STS_AUS_;console.log(_STS_AUS_); d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_ERUPCION1_ : if(d.sts!=_STS_ERUPCION1_){ d.sts=_STS_ERUPCION1_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_; break;
            case _CMD_EDENTULO_ : if(d.sts!=_STS_EDENTULO_){ d.sts=_STS_EDENTULO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_SUPERNUMERARIA_: if(d.sts!=_STS_SUPERNUMERARIA_){ d.sts=_STS_SUPERNUMERARIA_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_EXTRUIDA_ : if(d.sts!=_STS_EXTRUIDA_){ d.sts=_STS_EXTRUIDA_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_INTRUIDA_ : if(d.sts!=_STS_INTRUIDA_){ d.sts=_STS_INTRUIDA_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_GIROVERSION_ : if(d.sts!=_STS_GIROVERSION_){ d.sts=_STS_GIROVERSION_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			case _CMD_CLAVIJA_ : if(d.sts!=_STS_CLAVIJA_){ d.sts=_STS_CLAVIJA_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;

            case _CMD_GEMINACION  : if(d.sts!=_STS_GEMINACION_){ d.sts=_STS_GEMINACION_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_CORONA1_ : if(d.sts!=_STS_CORONA1_){ d.sts=_STS_CORONA1_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_CORONABUENA_: if(d.sts!=_STS_CORONABUENA_){ d.sts=_STS_CORONABUENA_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_CORONAMALA_ : if(d.sts!=_STS_CORONAMALA_){ d.sts=_STS_CORONAMALA_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_ESPIGO_BUEN_ : if(d.sts!=_STS_ESPIGO_BUEN_){ d.sts=_STS_ESPIGO_BUEN_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			case _CMD_ESPIGO_MAL_ : if(d.sts!=_STS_ESPIGO_MAL_){ d.sts=_STS_ESPIGO_MAL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;



			//FILL


			case _CMD_AZUL_TEST_:console.log(_CMD_AZUL_);if(d.fill[pos]!=_STS_AZUL_TEST_) d.fill[pos]=_STS_AZUL_TEST_; else d.fill[pos]=_NONE_FILL_;  break;
            case _CMD_ROJO_TEST_: if(d.fill[pos]!=_STS_ROJO_TEST_) d.fill[pos]=_STS_ROJO_TEST_; else d.fill[pos]=_NONE_FILL_;  break;


			case _CMD_DIAST_INICIO_  : if(d.sts!=_STS_DIAST_INICIO_){ d.sts=_STS_DIAST_INICIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_DIAST_FINAL_ : if(d.sts!=_STS_DIAST_FINAL_){ d.sts=_STS_DIAST_FINAL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_FUSION_INICIO_: if(d.sts!=_STS_FUSION_INICIO_){ d.sts=_STS_FUSION_INICIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_FUSION_FINAL_ : if(d.sts!=_STS_FUSION_FINAL_){ d.sts=_STS_FUSION_FINAL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_ORTOFIJO_AZUL_INICIO_ : if(d.sts!=_STS_ORTOFIJO_AZUL_INICIO_){ d.sts=_STS_ORTOFIJO_AZUL_INICIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			case _CMD_ORTOFIJO_AZUL_MEDIO_ : if(d.sts!=_STS_ORTOFIJO_AZUL_MEDIO_){ d.sts=_STS_ORTOFIJO_AZUL_MEDIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			case _CMD_ORTOFIJO_AZUL_FINAL_  : if(d.sts!=_STS_ORTOFIJO_AZUL_FINAL_){ d.sts=_STS_ORTOFIJO_AZUL_FINAL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_ORTOFIJO_ROJO_INICIO_ : if(d.sts!=_STS_ORTOFIJO_ROJO_INICIO_){ d.sts=_STS_ORTOFIJO_ROJO_INICIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_ORTOFIJO_ROJO_MEDIO_: if(d.sts!=_STS_ORTOFIJO_ROJO_MEDIO_){ d.sts=_STS_ORTOFIJO_ROJO_MEDIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_ORTOFIJO_ROJO_FINAL_ : if(d.sts!=_STS_ORTOFIJO_ROJO_FINAL_){ d.sts=_STS_ORTOFIJO_ROJO_FINAL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_ORTOREMOVIBLE_AZUL_ : if(d.sts!=_STS_ORTOREMOVIBLE_AZUL_){ d.sts=_STS_ORTOREMOVIBLE_AZUL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			case _CMD_ORTOREMOBIBLE_ROJO_ : if(d.sts!=_STS_ORTOREMOBIBLE_ROJO_){ d.sts=_STS_ORTOREMOBIBLE_ROJO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;


			case _CMD_PROTESIFIJA_AZUL_INICIO_: if(d.sts!=_STS_PROTESIFIJA_AZUL_INICIO_){ d.sts=_STS_PROTESIFIJA_AZUL_INICIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_PROTESIFIJA_AZUL_MEDIO_ : if(d.sts!=_STS_PROTESIFIJA_AZUL_MEDIO_){ d.sts=_STS_PROTESIFIJA_AZUL_MEDIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_PROTESIFIJA_AZUL_FINAL_ : if(d.sts!=_STS_PROTESIFIJA_AZUL_FINAL_){ d.sts=_STS_PROTESIFIJA_AZUL_FINAL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			case _CMD_PROTESIFIJA_ROJO_INICIO_ : if(d.sts!=_STS_PROTESIFIJA_ROJO_INICIO_){ d.sts=_STS_PROTESIFIJA_ROJO_INICIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			case _CMD_PROTESIFIJA_ROJO_MEDIO_: if(d.sts!=_STS_PROTESIFIJA_ROJO_MEDIO_){ d.sts=_STS_PROTESIFIJA_ROJO_MEDIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_PROTESIFIJA_ROJO_FINAL_ : if(d.sts!=_STS_PROTESIFIJA_ROJO_FINAL_){ d.sts=_STS_PROTESIFIJA_ROJO_FINAL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
            case _CMD_PROTESISREMOVIBLE_AZUL_ : if(d.sts!=_STS_PROTESISREMOVIBLE_AZUL_){ d.sts=_STS_PROTESISREMOVIBLE_AZUL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			case _CMD_PROTESISREMOVIBLE_ROJO_ : if(d.sts!=_STS_PROTESISREMOVIBLE_ROJO_){ d.sts=_STS_PROTESISREMOVIBLE_ROJO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			
			case _CMD_PROTESISTOTAL_AZUL_ : if(d.sts!=_STS_PROTESISTOTAL_AZUL_){ d.sts=_STS_PROTESISTOTAL_AZUL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			case _CMD_PROTESISTOTAL_ROJO_ : if(d.sts!=_STS_PROTESISTOTAL_ROJO_){ d.sts=_STS_PROTESISTOTAL_ROJO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;

			case _CMD_TRANSPOSICION_INICIO_ : if(d.sts!=_STS_TRANSPOSICION_INICIO_){ d.sts=_STS_TRANSPOSICION_INICIO_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			case _CMD_TRANSPOSICION_FINAL_ : if(d.sts!=_STS_TRANSPOSICION_FINAL_){ d.sts=_STS_TRANSPOSICION_FINAL_; d.fill={base:0,top:0,bottom:0,left:0,right:0,center:0} }else d.sts=_NONE_ ; break;
			


	
	

















            
		}
		
		_pv.historyPut();
		_pv.refresh()
	}


	_pv.onclickfill = (t,pos,e) => {
		let id=$(t).attr('datasimb'), i=_pv.getIndex(id), dfill=data[i]; auto=0; //console.log(t,$(t),d); return;
        console.log('HELLO');
		console.log(cmd);

		switch(cmd){

            //everything
			

			//FILL
			case _CMD_NONE_FILL_ : return;

			case _CMD_AZUL_:console.log(_CMD_AZUL_);if(dfill.fill[pos]!=_STS_AZUL_) dfill.fill[pos]=_STS_AZUL_; else dfill.fill[pos]=_NONE_FILL_;  break;

            case _CMD_ROJO_: if(dfill.fill[pos]!=_STS_ROJO_) dfill.fill[pos]=_STS_ROJO_; else dfill.fill[pos]=_NONE_FILL_;  break;


            
		}
		
		_pv.historyPut();
		_pv.refresh()
	}



	//-------------
	_pv.initComponent = () => {
		let trg='.'+pub.pid+'-'+pub.obj;
		odt.map((v) => { 
			$(trg+'-'+v.id+'-center').on('click',function(e){ _pv.onclick(this,'center',e)})
			$(trg+'-'+v.id+'-simb').on('click',function(e){ _pv.onclick(this,'center',e)})
            $(trg+'-'+v.id+'-status').on('click',function(e){ _pv.onclick(this,'center',e)})
		})
		odt.map((v) => { 
			$(trg+'-'+v.id+'-top').on('click',function(e){ _pv.onclick(this,'top',e)})
			$(trg+'-'+v.id+'-simb').on('click',function(e){ _pv.onclick(this,'top',e)})
            $(trg+'-'+v.id+'-status').on('click',function(e){ _pv.onclick(this,'top',e)})
		})
		odt.map((v) => { 
			$(trg+'-'+v.id+'-bottom').on('click',function(e){ _pv.onclick(this,'bottom',e)})
			$(trg+'-'+v.id+'-simb').on('click',function(e){ _pv.onclick(this,'bottom',e)})
            $(trg+'-'+v.id+'-status').on('click',function(e){ _pv.onclick(this,'bottom',e)})
		})
		odt.map((v) => { 
			$(trg+'-'+v.id+'-left').on('click',function(e){ _pv.onclick(this,'left',e)})
			$(trg+'-'+v.id+'-simb').on('click',function(e){ _pv.onclick(this,'left',e)})
            $(trg+'-'+v.id+'-status').on('click',function(e){ _pv.onclick(this,'left',e)})
		})
		odt.map((v) => { 
			$(trg+'-'+v.id+'-right').on('click',function(e){ _pv.onclick(this,'right',e)})
			$(trg+'-'+v.id+'-simb').on('click',function(e){ _pv.onclick(this,'right',e)})
            $(trg+'-'+v.id+'-status').on('click',function(e){ _pv.onclick(this,'right',e)})
		})
		
		
		
	}
	_pv.initComponentfill = () => {
		let trg='.'+pub.pid+'-'+pub.obj;
		odt.map((v) => { 
			$(trg+'-'+v.id+'-center').on('click',function(e){ _pv.onclickfill(this,'center',e)})
			$(trg+'-'+v.id+'-left').on('click',function(e){ _pv.onclickfill(this,'left',e)})
			$(trg+'-'+v.id+'-right').on('click',function(e){ _pv.onclickfill(this,'right',e)})
			$(trg+'-'+v.id+'-bottom').on('click',function(e){ _pv.onclickfill(this,'bottom',e)})
			$(trg+'-'+v.id+'-top').on('click',function(e){ _pv.onclickfill(this,'top',e)})

			


		})
	}
	_pv.setcommand = (cmds) => { cmd=cmds; auto=cmd==_CMD_NONE_?_AUTO_NONE_:0; if(pub.messagesSimbolos) $('.'+pub.messagesSimbolos).html(messagesSimbolos[cmd])}
	_pv.setcommand_fill=(cmds2) => { cmd=cmds2; auto=cmd==_CMD_NONE_FILL_?_AUTO_NONE_:0; if(pub.messagesFill) $('.'+pub.messagesFill).html(messagesFill[cmd])}
	//-------------
	// Undo - Redo
	//=============
	_pv.historyClear = () => { history={i:0,rows:[]}}
	_pv.historyPut = () => { if(history.rows.length>history.i) history.rows.splice(history.i,history.rows.length-history.i); history.i++; history.rows.push(JSON.stringify(data));history.rows.push(JSON.stringify(datafill))}
	_pv.undo = () => { if(history.i>1){ history.i--; data=JSON.parse(history.rows[history.i-1]);datafill=JSON.parse(history.rows[history.i-1]); _pv.refresh()}}
	_pv.redo = () => { if((history.rows.length>history.i)){ data=JSON.parse(history.rows[history.i]);datafill=JSON.parse(history.rows[history.i]); history.i++; _pv.refresh()}}
	//-------------
	// Image png
	//=============
	_pv.svgToPng = (svg, callback) => {
		const url = _pv.getSvgUrl(svg);
		_pv.svgUrlToPng(url, (imgData) => {
			callback(imgData);
			URL.revokeObjectURL(url);
		});
	}
	_pv.getSvgUrl = (svg) => { return  URL.createObjectURL(new Blob([svg], { type: 'image/svg+xml' }))}
	_pv.svgUrlToPng = (svgUrl, callback) => {
		const svgImage = document.createElement('img'), svgimg = document.getElementById('tdg-tmp-svg'); svgimg.appendChild(svgImage);
		svgImage.onload = () =>  {
			const canvas = document.createElement('canvas');
			canvas.width = svgImage.clientWidth;
			canvas.height = svgImage.clientHeight;
			const canvasCtx = canvas.getContext('2d');
			canvasCtx.drawImage(svgImage, 0, 0);
			const imgData = canvas.toDataURL('image/png');
			callback(imgData);
			svgimg.innerHTML=''
		};
		svgImage.src = svgUrl;
	 }
	//=============
	// Public
	//=============
	pub.refresh = () => { return _pv.refresh()}
	pub.getIndex = (id) => { return _pv.getIndex(id)}
	pub.getIndexFill = (id) => { return _pv.getIndexFill(id)}
	//~~~~~~~~~~~~~
	pub.getIds = () => { let a=[]; odt.map((v) => { a.push(parseInt(v.id))}); return a}
	pub.loadData = (d) => { data = typeof(d)=='object' ? d : JSON.parse(d); return _pv.refresh()}
	pub.getData = () => { return data}
	pub.getCommand = () => { return messagesSimbolos}
	pub.getCommand_fill = () => { return messagesFill}

	pub.setcommand = (cmds) => { return _pv.setcommand(parseInt(cmds))}
	pub.setcommand_fill = (cmds) => { return _pv.setcommand_fill(parseInt(cmds))}

	//-------------
	pub.undo = () => { _pv.undo()}
	pub.redo = () => { _pv.redo()}
	pub.new = () => { _pv.historyClear(); pub.clear()}
	pub.clear = () => { _pv.clear(); _pv.historyPut(); _pv.refresh()}
	//-------------
	pub.getSvg = () => { return $('.'+pub.pid+'-'+pub.obj).html()}
	pub.getPng = (res) => { _pv.svgToPng(pub.getSvg(), res)}
	//-------------
	pub.init();
	return pub;
})
