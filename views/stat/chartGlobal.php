<?php
    $cs = Yii::app()->getClientScript();

    Menu::statistics();
    $this->renderPartial('../default/panels/toolbar'); 
?>

<?php
	$cs = Yii::app()->getClientScript();
	// if(!Yii::app()->request->isAjaxRequest)
	// {
	  	$cssAnsScriptFilesModule = array(
	  		'/assets/plugins/d3/d3.v3.min.js',
        '/assets/plugins/d3/c3.min.js',
        '/assets/plugins/d3/c3.min.css',
	  	);
	  	HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFilesModule);
  	// }

?>

<!-- ***** CITOYENS ***** -->
<h4>Evolution du nombre de communecté</h4>
<div id="chartCitoyens"></div>
<script>

var chartCitoyens = c3.generate({
    bindto: '#chartCitoyens',
    data: {
        x : 'x',
        xFormat: '%d/%m/%Y',
        columns: [],
        type: 'line',
        names: {'citoyens' : 'Citoyens'}
    },
    axis: {
        x: {
            type: 'timeseries', // this needed to load string x value
            tick: {
                format: '%d/%m/%Y'
            }
        }
    }
});



</script>

<!-- LINKS -->
<h4>Evolution du nombre de liens entre entités</h4>
<div id="chartLinks"></div>
<script>

var chartLinks = c3.generate({
    bindto: '#chartLinks',
    data: {
        x : 'x',
        xFormat: '%d/%m/%Y',
        columns: [],
        type: 'bar',
        groups: [
            <?php echo json_encode(array_keys($groups['linkTypes'])); ?>
        ],
        names:  <?php echo json_encode($groups['linkTypes']); ?>
    },
    axis: {
        x: {
            type: 'timeseries', // this needed to load string x value
            tick: {
                format: '%d/%m/%Y'
            }
        }
    }
});



</script>

<!-- ORGANIZATIONS -->
<h4>Evolution du nombre d'organisations</h4>
<div id="chartOrganizations"></div>
<script>

var chartOrganizations = c3.generate({
    bindto: '#chartOrganizations',
    data: {
        x : 'x',
        xFormat: '%d/%m/%Y',
        columns: [],
        type: 'bar',
        groups: [
            <?php echo json_encode(array_keys($groups['organisationTypes'])); ?>
        ],
        names:  <?php echo json_encode($groups['organisationTypes']); ?>
    },
    axis: {
        x: {
            type: 'timeseries', // this needed to load string x value
            tick: {
                format: '%d/%m/%Y'
            }
        }
    }
});



</script>

<!-- EVENTS -->
<h4>Evolution du nombre d'événements</h4>
<div id="chartEvents"></div>
<script>

var chartEvents = c3.generate({
    bindto: '#chartEvents',
    data: {
        x : 'x',
        xFormat: '%d/%m/%Y',
        columns: [],
        type: 'bar',
        groups: [
            <?php echo json_encode(array_keys($groups['eventTypes'])); ?>
        ],
        names:  <?php echo json_encode($groups['eventTypes']); ?>
    },
    axis: {
        x: {
            type: 'timeseries', // this needed to load string x value
            tick: {
                format: '%d/%m/%Y'
            }
        }
    }
});


</script>

<!-- PROJECTS -->
<h4>Evolution du nombre de projets</h4>
<div id="chartProjects"></div>
<script>

var chartProjects = c3.generate({
    bindto: '#chartProjects',
    data: {
        x : 'x',
        xFormat: '%d/%m/%Y',
        columns: [],
        type: 'line',
        groups: [
            []
        ],
        names: {'projects' : 'Projets'}
    },
    axis: {
        x: {
            type: 'timeseries', // this needed to load string x value
            tick: {
                format: '%d/%m/%Y'
            }
        }
    }
});


</script>

<!-- ORGANIZATIONS -->
<h4>Evolution du nombre de salles de vote</h4>
<div id="chartActionRooms"></div>
<script>

var chartActionRooms = c3.generate({
    bindto: '#chartActionRooms',
    data: {
        x : 'x',
        xFormat: '%d/%m/%Y',
        columns: [],
        type: 'bar',
        groups: [
            <?php echo json_encode(array_keys($groups['listRoomTypes'])); ?>
        ],
        names:  <?php echo json_encode($groups['listRoomTypes']); ?>
    },
    axis: {
        x: {
            type: 'timeseries', // this needed to load string x value
            tick: {
                format: '%d/%m/%Y'
            }
        }
    }
});
</script>

<!-- ***** CITOYENS ***** -->
<h4>Evolution du nombre de salle de vote</h4>
<div id="chartSurveys"></div>
<script>

var chartSurveys = c3.generate({
    bindto: '#chartSurveys',
    data: {
        x : 'x',
        xFormat: '%d/%m/%Y',
        columns: [],
        type: 'line',
        names: {'survey' : 'Salle de vote'}
    },
    axis: {
        x: {
            type: 'timeseries', // this needed to load string x value
            tick: {
                format: '%d/%m/%Y'
            }
        }
    }
});


</script>

<script>
    //Title
    jQuery(document).ready(function() {
        $(".moduleLabel").html("<i class='fa fa-cog'></i> Espace administrateur : Statistiques");

        chartCitoyens.load({
          url: baseUrl+"/"+moduleId+"/stat/getstatjson/sector/citoyens/chart/global",
          mimeType: 'json'
        });

        chartLinks.load({
          url: baseUrl+"/"+moduleId+"/stat/getstatjson/sector/links/chart/global",
          mimeType: 'json'
        });

        chartOrganizations.load({
          url: baseUrl+"/"+moduleId+"/stat/getstatjson/sector/organizations/chart/global",
          mimeType: 'json'
        });


        chartEvents.load({
          url: baseUrl+"/"+moduleId+"/stat/getstatjson/sector/events/chart/global",
          mimeType: 'json'
        });

        chartProjects.load({
          url: baseUrl+"/"+moduleId+"/stat/getstatjson/sector/projects/chart/global",
          mimeType: 'json'
        });


        chartActionRooms.load({
          url: baseUrl+"/"+moduleId+"/stat/getstatjson/sector/actionRooms/chart/global",
          mimeType: 'json'
        });


        chartSurveys.load({
          url: baseUrl+"/"+moduleId+"/stat/getstatjson/sector/survey/chart/global",
          mimeType: 'json'
        });

    });

</script>