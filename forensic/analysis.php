<?php

if(strpos($analysis,'ner')!==false){
	$checkedNer = 'checked';
}
if(strpos($analysis,'dict')!==false){
	$checkedDict = 'checked';
}
if(strpos($analysis,'el')!==false){
	$checkedEl = 'checked';
}
if(strpos($analysis,'timex')!==false){
	$checkedTimex = 'checked';
}
if(strpos($analysis,'sent')!==false){
	$checkedSent = 'checked';
}

?>
                                                <div class="form-group">
                                                    <label>NLP Modules</label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="ner" type="checkbox" value="ner" <?= $checkedNer;?>>NER
                                                        </label>
                                                        <label>
                                                            <input name="dict" type="checkbox" value="dict" <?= $checkedDict;?>>Dictionary-based NER
                                                            <select class="form-control" name="dictionaries[]" multiple>
<?php
        $data = array(
//                'language' => 'en',
//                'user' => 'jmschnei'
        );
	$result = CallAPI2("GET", "http://dev.digitale-kuratierung.de/api/e-parrot/listmodels", $data);
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

	}
?>
                                                            </select>
                                                        </label>
                                                        <label>
                                                            <input name="el" type="checkbox" value="el" <?= $checkedEl;?>>Entity Linking
                                                        </label>
                                                        <label>
                                                            <input name="timex" type="checkbox" value="timex" <?= $checkedTimex;?>>TIMEX
                                                        </label>
                                                        <label>
                                                            <input name="sent" type="checkbox" value="sent" <?= $checkedSent;?>>Sentiment
                                                        </label>
<!--                                                        <label>
                                                            <input name="sesame" type="checkbox" value="sesame" <?= $checkedSesame;?>>Sesame
                                                        </label>
i-->
                                                        <label>
                                                            <input name="translate" type="checkbox" value="translate" <?= $checkedTranslate;?>>Translation
                                                            <select class="form-control" name="translateValues[]" multiple>
                                                            	<option value="translateENDE">English --&gt; German</option>
                                                            	<option value="translateENES">English --&gt; Spanish</option>
                                                            </select>
                                                        </label>
	                                                <a href="newdictionary.php" class="btn btn-info pull-right">Generate new Dictionary Model</a>
                                                    </div>
                                                </div>
