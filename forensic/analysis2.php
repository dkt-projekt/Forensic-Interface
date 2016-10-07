<?php
?>
                                                <div class="form-group">
                                                    <label>NLP Pipelines</label>
							<select name="pipeline" id="pipeline" class="form-control" >
								<option value="1" selected>German NER</option>
								<option value="2">English-German Translation</option>
								<option value="3">English Complete [NER-Linking-Timex-TranslateENDE]</option>
							</select> 
<?php
/*        $data = array(
        );
	$result = CallAPI2("GET", "http://dev.digitale-kuratierung.de/api/e-pipelining", $data);
        $json = json_decode($result);

//var_dump($json);

        $timelinig = $json->timelining;
        $geolocalization = $json->geolocalization;
        $entitylinking = $json->entitylinking;
        $clustering = $json->clustering;
        $documents = $json->documents;
	foreach($json->models as $obj){
		if($obj->modelType=='dict'){
        		echo '<option value="'.$obj->modelName.'">'.$obj->modelName.'</option>';
		}

	}*/
?>
                                                </div>
