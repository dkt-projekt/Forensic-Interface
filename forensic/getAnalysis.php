<?php
	require_once('lib2.php');

	$ner = getForm('ner','');
	$el = getForm('el','');
	$dict = getForm('dict','');
	$timex = getForm('timex','');
	$sent = getForm('sent','');
	$sesame = getForm('sesame','');
        $translate = getForm('translate','');

	$analysis = '';
        if($ner!='' && $el!=''){
                $analysis = $analysis.',ner_PER_ORG_LOC_en_all';
        }
        else if($ner=='' && $el==''){
	}
        else if($el==''){
                $analysis = $analysis.',ner_PER_ORG_LOC_en_spot';
        }
        else if($ner==''){
                $analysis = $analysis.',ner_PER_ORG_LOC_en_link';
        }
        if($dict!=''){
		$dicts = getForm('dictionaries','');
		foreach ($dicts as $d){
                	$analysis = $analysis.','.$d;
		}
        }
        if($timex!=''){
                $analysis = $analysis.',temp_en';
        }
        if($sent!=''){
                $analysis = $analysis.',sent_en_corenlp';
        }
        /*if($sesame!=''){
                $analysis = $analysis.',sesame';
        }*/
        if($translate!=''){
		$trans = getForm('translateValues','');
		foreach ($trans as $d){
                	$analysis = $analysis.','.$d;
		}
        }

?>
