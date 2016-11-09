<?php
	$cssAnsScriptFilesModule = array(
		
		'/assets/css/sig/leaflet/leaflet.css',
		'/assets/css/sig/leaflet/leaflet.draw.css',
		'/assets/css/sig/leaflet/leaflet.draw.ie.css',
		'/assets/css/sig/leaflet/MarkerCluster.css',
		'/assets/css/sig/leaflet/MarkerCluster.Default.css',
		'/assets/css/sig/leaflet/leaflet.awesome-markers.css',
		'/assets/css/sig/sig.css',
	);
	HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFilesModule, Yii::app()->theme->baseUrl);

	if(Yii::app()->params["forceMapboxActive"]==false && 
		Yii::app()->params["mapboxActive"]==false) 
		$leaflet = array('/js/sig/leaflet/leaflet.js');

	$cssAndScriptFiles = array(
		//'/js/sig/leaflet/leaflet.js',
		'/js/sig/leaflet/leaflet.draw-src.js',
		'/js/sig/leaflet/leaflet.draw.js',
		'/js/sig/leaflet/leaflet.markercluster-src.js',
		'/js/sig/leaflet/leaflet.awesome-markers.min.js',
		'/js/sig/leaflet/leaflet.bouncemarker.js',

		'/js/sig/map.js' , 
		'/js/sig/map_initializer.js' ,
		'/js/sig/map_panel.js' ,
		'/js/sig/map_popupContent.js' ,
		'/js/sig/map_rightList.js' ,
		'/js/sig/map_findPlace.js' ,
		'/js/sig/map_findPlace.js' ,
		'/js/sig/map_charts.js',
	);

	if(@$leaflet) array_merge($leaflet, $cssAndScriptFiles);

	if(isset($sigParams) && isset($sigParams["useChartsMarkers"])){
		if($sigParams["useChartsMarkers"] == true){ 

			$cssAndScriptFilesCharts = array(
				'/css/sig/dvf.css',
				'/js/sig/dvf/leaflet.dvf.chartmarkers.js',
				'/js/sig/dvf/leaflet.dvf.controls.js',
				'/js/sig/dvf/leaflet.dvf.datalayer.js',
				'/js/sig/dvf/leaflet.dvf.linearfunctions.js',
				'/js/sig/dvf/leaflet.dvf.lines.js',
				'/js/sig/dvf/leaflet.dvf.markers.js',
				'/js/sig/dvf/leaflet.dvf.palettes.js',
				'/js/sig/dvf/leaflet.dvf.regularpolygon.js',
				'/js/sig/dvf/leaflet.dvf.utils.js'
			);

			$cssAndScriptFiles = array_merge($cssAndScriptFiles, $cssAndScriptFilesCharts);
		}
	}

	HtmlHelper::registerCssAndScriptsFiles($cssAndScriptFiles, $this->module->assetsUrl);
?>

